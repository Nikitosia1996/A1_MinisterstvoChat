<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Response\JsonResponse;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\MVC\Controller\FormController;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Filesystem\Folder;
use Joomla\CMS\Layout\FileLayout;

//no direct access
defined('_JEXEC') or die('Restricted access');

JLoader::register('SppagebuilderHelperImage', JPATH_ROOT . '/components/com_sppagebuilder/helpers/image.php');

class SppagebuilderControllerAi_content extends FormController
{
    public function getModel($name = 'Media', $prefix = '', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }

    public function __construct($config = [])
    {
        parent::__construct($config);

        // check have access
        $user = Factory::getUser();
        $authorised = $user->authorise('core.admin', 'com_sppagebuilder') || $user->authorise('core.manage', 'com_sppagebuilder');

        if (!$authorised) {
            $response = [
                'status' => false,
                'message' => Text::_('JERROR_ALERTNOAUTHOR')
            ];

            echo json_encode($response);
            die();
        }
    }

    /**
     * Get Url To Base64 Image
     * 
     * @return void
     * @version 5.0.8
     */
    public function getUrlToBase64Image()
    {
        $input = Factory::getApplication()->input;
        $imageUrl = $input->json->get('image_uri', '', 'STRING');

        if (!isset($imageUrl) || empty($imageUrl)) {
            $this->sendResponse([
                'status' => false,
                'message' => 'Image URL is missing.'
            ], 400);
        }

        $base64Image = $this->imageUrlToBase64($imageUrl);

        $this->sendResponse([
            'status' => true,
            'dataUrl' => $base64Image
        ], 200);
    }

    /**
     * Get AI generated Content
     * 
     * @return void
     * @version 5.0.8
     */
    public function getAiGeneratedContent()
    {
        $cParams = ComponentHelper::getParams('com_sppagebuilder');
        $input = Factory::getApplication()->input;
        $prompt = $input->json->get('prompt', '', 'STRING');
        $type = $input->json->get('type', 'text', 'STRING');
        $imageUri = $input->json->get('image_uri', '', 'STRING');
        $numberOfImages = $input->json->get('number_of_images', 4, 'NUMBER');
        $imageSize = $input->json->get('image_size', '512x512', 'STRING');
        $maxTokens = (int) $input->json->get('max_tokens', '250', 'STRING');

        // Set your OpenAI API key here
        $apiKey = $cParams->get('openai_api_key', '');
        $model = "gpt-3.5-turbo";

        if (!isset($apiKey) || empty($apiKey)) {
            $this->sendResponse([
                'status' => false,
                'message' => Text::_('COM_SPPAGEBUILDER_AI_API_KEY_MISSING_MESSAGE')
            ], 400);
        }

        $endpoint = 'https://api.openai.com/v1/chat/completions';

        // Request data
        $data = [
            "model" => $model,
            'max_tokens' => $maxTokens,
            "messages" => [
                [
                  "role" => "user",
                  "content" => $prompt
                ],
              ]
        ];


        if ($type === 'image') {
            $endpoint = 'https://api.openai.com/v1/images/generations';

            $data = [
                'prompt' => $prompt,
                'size' => $imageSize,
                'n' => (int) $numberOfImages,
                'user' => 'username'
            ];
        }

        // Create JSON payload
        $payload = json_encode($data);

        if ($type === 'variation') {
            if (empty($imageUri)) {
                $this->sendResponse([
                    'status' => false,
                    'message' => 'Image url is Required.'
                ], 400);
            }

            $endpoint = 'https://api.openai.com/v1/images/variations';

            if (str_starts_with($imageUri, 'http')) {
                $base64Image = $this->imageUrlToBase64($imageUri);
                $finalImageFile = $this->dataUrlToCurlFile($base64Image);
            } else {
                $finalImageFile = $this->processImageForOpenAi($imageUri);
            }

            $data = [
                'image' => $finalImageFile,
                'size' => $imageSize,
                'n' => (int) $numberOfImages,
                'user' => 'username'
            ];

            $payload = $data;
        }

        if ($type === 'generative_fill') {
            if (empty($imageUri) || empty($prompt)) {
                $this->sendResponse([
                    'status' => false,
                    'message' => 'Image or Prompt is missing.'
                ], 400);
            }

            $endpoint = 'https://api.openai.com/v1/images/edits';

            $finalMaskImage = $this->dataUrlToCurlFile($imageUri);

            $data = [
                'prompt' => $prompt,
                'image' => $finalMaskImage,
                'size' => '512x512',
                'n' => 4,
                'user' => 'username'
            ];

            $payload = $data;
        }

        // Initialize cURL session
        $ch = curl_init();

        $httpHeader = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        ];

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $type === 'text' || $type === 'image' ? $httpHeader : ['Authorization: Bearer ' . $apiKey]);

        // Execute cURL session and get the response
        $response = curl_exec($ch);
        $error = null;

        if ($response === false) {
            $error = curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        if ($error !== null) {
            $this->sendResponse([
                'status' => false,
                'message' => $error
            ], 500);
        }

        // Decode and print the response
        $responseArray = json_decode($response, true);

        if (($type !== 'text') && $responseArray && isset($responseArray['data'])) {
            $this->sendResponse($responseArray);
        }

        if ($type === 'text' && $responseArray && isset($responseArray['choices'][0]['message']['content'])) {
            $this->sendResponse($responseArray);
        }

        if ($responseArray && isset($responseArray['error']) && isset($responseArray['error']['message'])) {
            $message = $responseArray['error']['message'];

            if(strpos($message, 'maximum context length')) {
                $message = Text::_('COM_SPPAGEBUILDER_AI_MAXIMUM_CHARACTER_LIMIT_EXCEEDED_MESSAGE');
            }

            $this->sendResponse([
                'status' => false,
                'message' =>  $message,
            ], 400);
        }

        $this->sendResponse([
            'status' => false,
            'message' => Text::_("COM_SPPAGEBUILDER_GLOBAL_SOMETHING_WENT_WRONG")
        ], 500);
    }

    private function processImageForOpenAi($image_uri)
    {
        $imagePath = Path::clean(JPATH_ROOT . '/' . $image_uri);

        // Create a temporary directory
        $formattedTempSquareImagePath = tempnam(sys_get_temp_dir(), time());
        // $tempFile = fopen($formattedTempSquareImagePath, 'wb');

        $imageMimeType = mime_content_type($imagePath);

        if ($imageMimeType !== 'image/png') {
            $isConvertSuccess = BuilderMediaHelper::changeAspectRatio('1:1', $imagePath, $formattedTempSquareImagePath, 'png');

            if (!$isConvertSuccess) {
                $this->sendResponse([
                    'status' => false,
                    'message' => 'Image conversion failed. Please try again.'
                ], 500);
            }

            $finalImageFile = $this->makeCurlFile($formattedTempSquareImagePath);
        } else {
            $finalImageFile = $this->makeCurlFile($imagePath);
        }


        return $finalImageFile;
    }

    private function makeCurlFile($file)
    {
        $mime = mime_content_type($file);
        $info = pathinfo($file);
        $name = $info['basename'];
        $output = new CURLFile($file, $mime, $name);
        return $output;
    }

    private function imageUrlToBase64($imageUrl)
    {
        // Fetch the image from the URL
        $imageData = @file_get_contents($imageUrl);

        if ($imageData === false) {
            $this->sendResponse([
                'status' => false,
                'message' => 'Unable to fetch the image. Please try again.'
            ], 500); // Unable to fetch the image
        }

        // Encode the image data as Base64
        $base64Data = base64_encode($imageData);

        if ($base64Data === false) {
            $this->sendResponse([
                'status' => false,
                'message' => 'Failed to encode as Base64. Please try again.'
            ], 500); // Failed to encode as Base64
        }

        // Create a data URL with the Base64-encoded image data
        $dataUrl = 'data:image/png;base64,' . $base64Data;

        return $dataUrl;
    }

    private function dataUrlToCurlFile($dataUrlImage)
    {
        $mimeRegex = '/^data:([^;]+);base64,([a-zA-Z0-9\/+]+=*)$/';

        if (!preg_match($mimeRegex, $dataUrlImage, $matches)) {
            $this->sendResponse(['message' => "Invalid data URL format."], 400);
        }

        $base64Data = $matches[2];

        $decodedData = base64_decode($base64Data);

        // Create a temporary file
        $tempFileName = tempnam(sys_get_temp_dir(), 'maskimage');
        $tempFile = fopen($tempFileName, 'wb');
        fwrite($tempFile, $decodedData);
        fclose($tempFile);

        $tempSquareImageDest = tempnam(sys_get_temp_dir(), 'square');

        $isConvertSuccess = BuilderMediaHelper::changeAspectRatio('1:1', $tempFileName, $tempSquareImageDest, 'png');

        if (!$isConvertSuccess) {
            $this->sendResponse([
                'status' => false,
                'message' => 'Image conversion failed. Please try again.'
            ], 500);
        }

        $finalImageFile = $this->makeCurlFile($tempSquareImageDest);

        return $finalImageFile;
    }

    /**
     * Send JSON Response to the client.
     *
     * @param	array	$response	The response array or data.
     * @param	int		$statusCode	The status code of the HTTP response.
     *
     * @return	void
     * @since	5.0.0
     */
    public function sendResponse($response, int $statusCode = 200): void
    {
        $app = Factory::getApplication();
        $app->setHeader('status', $statusCode, true);
        $app->sendHeaders();
        echo new JsonResponse($response);
        $app->close();
    }

    /**
     * Upload image from url
     * 
     * @return void
     * @version 5.0.8
     */
    public function uploadAiGeneratedImageFromUrl()
    {
        $model  = $this->getModel('Media');
        $user     = Factory::getUser();
        $input = Factory::getApplication()->input;

        $imageUrl =  $input->json->get('url', '', 'STRING');
        $aspectRatio =  $input->json->get('aspect_ratio', '', 'STRING');

        $report = [];
        $canCreate = $user->authorise('core.create', 'com_sppagebuilder');

        if (!$canCreate) {
            $report['status'] = false;
            $report['message'] = Text::_('JERROR_ALERTNOAUTHOR');
            $this->sendResponse($report, 403);
        }

        // Validate the URL
        if (!filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            $report['status'] = false;
            $report['message'] = Text::_('Invalid url');
            $this->sendResponse($report, 400);
        }

        // Generate a unique filename
        $extension = 'webp';
        $base_name = uniqid('ai_img_', true);
        $filename = $base_name . '.' . $extension;

        // Save the image to the server
        $mediaParams = ComponentHelper::getParams('com_media');
        $folder_root = $mediaParams->get('file_path', 'images') . '/';
        $date = Factory::getDate();
        $folder = $folder_root . HTMLHelper::_('date', $date, 'Y') . '/' . HTMLHelper::_('date', $date, 'm') . '/' . HTMLHelper::_('date', $date, 'd');

        if (!Folder::exists(JPATH_ROOT . '/' . $folder)) {
            Folder::create(JPATH_ROOT . '/' . $folder, 0755);
        }

        if (!Folder::exists(JPATH_ROOT . '/' . $folder . '/_spmedia_thumbs')) {
            Folder::create(JPATH_ROOT . '/' . $folder . '/_spmedia_thumbs', 0755);
        }

        $src = Path::clean($folder . '/' . $filename);
        $dest = Path::clean(JPATH_ROOT . '/' . $src);

        $isImageSaved = !empty($aspectRatio) ? $this->changeAspectRatio($aspectRatio, $imageUrl, $dest) : $this->convertImageToWebp($imageUrl, $dest);
        if (!$isImageSaved) {
            $report['status'] = false;
            $report['message'] = Text::_('COM_SPPAGEBUILDER_MEDIA_MANAGER_UPLOAD_FAILED');
            $this->sendResponse($report, 400);
        }

        $media_attr = [];
        $thumb = '';

        $image = new SppagebuilderHelperImage($dest);
        $media_attr['full'] = ['height' => $image->height, 'width' => $image->width];

        if (($image->width > 300) || ($image->height > 225)) {
            $thumbDestPath = dirname($dest) . '/_spmedia_thumbs';
            $created = $image->createThumb(array('300', '300'), $thumbDestPath, $base_name, $extension);

            if ($created == false) {
                $report['status'] = false;
                $report['message'] = Text::_('COM_SPPAGEBUILDER_MEDIA_MANAGER_FILE_NOT_SUPPORTED');
            }

            $report['src'] = Uri::root(true) . '/' . $folder . '/_spmedia_thumbs/' . $base_name . '.' . $extension;
            $thumb = $folder . '/_spmedia_thumbs/'  . $base_name . '.' . $extension;
            $thumb_dest = Path::clean($thumbDestPath . '/' . $base_name . '.' . $extension);
            list($width, $height) = getimagesize($thumb_dest);
            $media_attr['thumbnail'] = ['height' => $height, 'width' => $width];
            $report['thumb'] = $thumb;
        } else {
            $report['src'] = Uri::root(true) . '/' . $src;
            $report['thumb'] = $src;
        }

        // Create placeholder for lazy load
        $this->createAiGeneratedMediaPlaceholder($dest, $base_name, $extension);

        $insert_id = $model->insertMedia($base_name, $src, json_encode($media_attr), $thumb, 'image');
        $report['media_attr'] = $media_attr;
        $report['status'] = true;
        $report['title'] = $base_name;
        $report['id'] = $insert_id;
        $report['path'] = $src;

        $layout_path = JPATH_ROOT . '/administrator/components/com_sppagebuilder/layouts';
        $format_layout = new FileLayout('media.format', $layout_path);
        $report['message'] = $format_layout->render(array('media' => $model->getMediaByID($insert_id), 'innerHTML' => true));

        $this->sendResponse($report, 200);
    }

    /**
     * @since 2020
     * Create light weight image placeholder for lazy load feature
     */
    private function createAiGeneratedMediaPlaceholder($dest, $base_name, $ext)
    {
        $placeholder_folder_path = JPATH_ROOT . '/media/com_sppagebuilder/placeholder';

        if (!Folder::exists($placeholder_folder_path)) {
            Folder::create($placeholder_folder_path, 0755);
        }

        $image = new SppagebuilderHelperImage($dest);
        list($srcWidth, $srcHeight) = $image->getDimension();
        $width = 60;
        $height = $width / ($srcWidth / $srcHeight);
        $image->createThumb(array('60', $height), $placeholder_folder_path, $base_name, $ext, 20);
    }

    private function getImageSource($image_path)
    {
        $image_properties   = @getimagesize($image_path);
        $image_type         = $image_properties[2];
        $imageSource         = false;

        switch ($image_type) {
            case 1:
                $imageSource  = @imagecreatefromgif($image_path);
                break;
            case 2:
                $imageSource  = @imagecreatefromjpeg($image_path);
                break;
            case 3:
                $imageSource  = @imagecreatefrompng($image_path);
                break;
        }

        return $imageSource;
    }

    private function convertImageToWebp($image_path, $destination)
    {
        $image = $this->getImageSource($image_path);

		if(!$image)
		{
			return false;
		}

		// get dimensions of image
		$width = imagesx($image);
		$height = imagesy($image);

		// create a canvas
		$canvas = imagecreatetruecolor ($width, $height);
		imageAlphaBlending($canvas, false);
		imageSaveAlpha($canvas, true);

		// By default, the canvas is black, so make it transparent
		$transparent = imagecolorallocatealpha($canvas, 0, 0, 0, 127);
		imagefilledrectangle($canvas, 0, 0, $width - 1, $height - 1, $transparent);

		// copy image to canvas
		imagecopy($canvas, $image, 0, 0, 0, 0, $width, $height);

		// save canvas as a webp
		$is_image_saved = imagewebp($canvas, $destination, 80); // 80 is the quality parameter (0-100)

		// clean up memory
		imagedestroy($canvas);

		return $is_image_saved;
    }

    private function changeAspectRatio($aspect_ratio, $image_path, $destination)
    {
        $sourceImage = $this->getImageSource($image_path);
		if(!$sourceImage)
		{
			return false;
		}

		// Calculate the new dimensions while maintaining the aspect ratio
		$sourceWidth = imagesx($sourceImage);
		$sourceHeight = imagesy($sourceImage);

		$parts = explode(':', $aspect_ratio);
		$aspectRatio = $parts[0] / $parts[1];

		// Calculate the target width and height based on the aspect ratio
		if ($sourceWidth / $sourceHeight > $aspectRatio) {
			$newWidth = round($sourceHeight * $aspectRatio);
			$newHeight = $sourceHeight;
		} else {
			$newWidth = $sourceWidth;
			$newHeight = round($sourceWidth / $aspectRatio);
		}

		// Create a new image with the desired dimensions
		$newImage = @imagecreatetruecolor($newWidth, $newHeight);
		if(!$newImage)
		{
			return false;
		}

		// Resize the source image to fit the new dimensions
		$isSuccess = @imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $sourceWidth, $sourceHeight);
		if(!$isSuccess){
			return false;
		}

		// save canvas as a webp
		$isSuccess = @imagewebp($newImage, $destination, 80); // 80 is the quality parameter (0-100)

		// Clean up resources
		imagedestroy($sourceImage);
		imagedestroy($newImage);

		return $isSuccess;
    }
}
