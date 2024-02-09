<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Filesystem\Path;
use Joomla\Filesystem\Exception\FilesystemException;

//no direct access
defined('_JEXEC') or die('Restricted access');

class BuilderMediaHelper
{
	public static function isValidImagesPath(string $path): bool
	{
		$mediaParams = ComponentHelper::getParams('com_media');
		$filePath = Path::clean($mediaParams->get('file_path', 'images'));
		$fullFilePath = Path::clean(JPATH_ROOT . '/' . $filePath);

		return strpos($path, $fullFilePath) === 0;
	}

	public static function checkForMediaActionBoundary(string $path)
	{
		try {
			$cleanedPath = Path::check($path);
		} catch (\Exception $e) {
			throw new FilesystemException($e->getMessage());
		}

		// TODO: Need to check this later
		// if (!self::isValidImagesPath($cleanedPath))
		// {
		// 	throw new FilesystemException('Invalid path for performing this action.');
		// }

		return $cleanedPath;
	}

	private static function getImageSource($image_path)
	{
		$image_properties   = @getimagesize($image_path);
		$image_type         = $image_properties[2];
		$imageSource 		= false;

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

			case 18: // webp
				$imageSource  = @imagecreatefromwebp($image_path);
				break;
		}

		return $imageSource;
	}

	public static function convertImage($image_path, $destination, $convert_type = 'webp')
	{
		$image = self::getImageSource($image_path);

		if (!$image) {
			return false;
		}

		// get dimensions of image
		$width = imagesx($image);
		$height = imagesy($image);

		// create a canvas
		$canvas = imagecreatetruecolor($width, $height);
		imageAlphaBlending($canvas, false);
		imageSaveAlpha($canvas, true);

		// By default, the canvas is black, so make it transparent
		$transparent = imagecolorallocatealpha($canvas, 0, 0, 0, 127);
		imagefilledrectangle($canvas, 0, 0, $width - 1, $height - 1, $transparent);

		// copy image to canvas
		imagecopy($canvas, $image, 0, 0, 0, 0, $width, $height);

		$is_image_saved = false;

		switch ($convert_type) {
			case 'png':
				$is_image_saved = imagepng($canvas, $destination, 8);
				break;

			default:
				// save canvas as a webp
				$is_image_saved = imagewebp($canvas, $destination, 80); // 80 is the quality parameter (0-100)
				break;
		}


		// clean up memory
		imagedestroy($canvas);

		return $is_image_saved;
	}

	public static function changeAspectRatio($aspect_ratio, $image_path, $destination, $output_image_format = 'webp')
	{
		$sourceImage = self::getImageSource($image_path);
		if (!$sourceImage) {
			return false;
		}

		// Calculate the new dimensions while maintaining the aspect ratio
		$sourceWidth = imagesx($sourceImage);
		$sourceHeight = imagesy($sourceImage);

		$parts = explode(':', $aspect_ratio ?? '1:1');
		$aspectRatio = $parts[0] / $parts[1];

		// Calculate the target width and height based on the aspect ratio
		if ($sourceWidth / $sourceHeight > $aspectRatio) {
			$newWidth = round($sourceHeight * $aspectRatio);
			$newHeight = $sourceHeight;
		} else {
			$newWidth = $sourceWidth;
			$newHeight = round($sourceWidth / $aspectRatio);
		}

		if ($aspect_ratio === '1:1') {
			$newHeight = min($newHeight, 1024);
			$newWidth = min($newWidth, 1024);
		}

		// Create a new image with the desired dimensions
		$newImage = @imagecreatetruecolor($newWidth, $newHeight);
		if (!$newImage) {
			return false;
		}

		$backgroundColor = @imagecolorallocatealpha($newImage, 0, 0, 0, 127);

		// Fill the image with the background color
		imagefill($newImage, 0, 0, $backgroundColor);

		// Set the blending mode for transparent background
		imagesavealpha($newImage, true);

		// Resize the source image to fit the new dimensions
		$isSuccess = @imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $sourceWidth, $sourceHeight);
		if (!$isSuccess) {
			return false;
		}

		switch ($output_image_format) {
			case 'png':
				$isSuccess = @imagepng($newImage, $destination, 8);
				break;

			default:
				// save canvas as a webp
				$isSuccess = @imagewebp($newImage, $destination, 80); // 80 is the quality parameter (0-100)
				break;
		}

		// Clean up resources
		imagedestroy($sourceImage);
		imagedestroy($newImage);

		return $isSuccess;
	}
}
