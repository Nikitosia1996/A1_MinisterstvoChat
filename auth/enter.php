<?php
include('../sms-php-main/SMS_BY.php');
require_once('../sms-php-main/Transliterate.php');
require_once('../sms-php-main/CountSmsParts.php');


// Your API-KEY or token which you can obtain here: https://app.sms.by/user-api/token
$token = 'e34d5beb2af5f53259f24b4319c6df2b';  // Код токена вы можете получить здесь: https://app.sms.by/user-api/token
// Phone number where you will receive all test sms
$phone = '+375445493507';  // Номер телефона для теста


$text = "Заглавная буква в начале текста"; // place here any sample text
$comment = "Пример работы транслитерации строки. \"$text\" "; // transliteration of russian text to english
$translit = Transliterate::getTransliteration($text);



$string = "Длина этого короткого текста на русском  примерно 70 символов или около того";
$oSize = new CountSmsParts($string);
$res = $oSize->checkTextLength($string);

$sms = new SMS_BY($token);

    include "../ajax/connection.php";
    ini_set("session.use_trans_sid", true);

    session_start();
    if ($phone != "") {

        if (true) {

            $message = "Hello World! Powered by SMS.by";

            $insertquery = "SELECT * FROM users WHERE phone='$phone'";

            $rez = mysqli_query($con, $insertquery) or die("Ошибка " . mysqli_error($con));

            if (mysqli_num_rows($rez) == 1) //если нашлась одна строка, значит такой юзер существует в базе данных
            {
                $row = mysqli_fetch_assoc($rez);
                $_SESSION['id_user'] = $row['id_user'];
                $id = $_SESSION['id_user'];
                setcookie("phone", $phone, time() + 1800, '/');
                setcookie("id_user", $id, time() + 1800, '/');
            }
            else{

                $insertquery = "insert into users (phone, kod) values ('$phone', '123321')";

                $rez = mysqli_query($con, $insertquery) or die("Ошибка " . mysqli_error($con));

                $insertquery = "SELECT * FROM users WHERE phone='$phone'";

                $rez = mysqli_query($con, $insertquery) or die("Ошибка " . mysqli_error($con));
                if (mysqli_num_rows($rez) == 1) //если нашлась одна строка, значит такой юзер существует в базе данных
                {
                    $row = mysqli_fetch_assoc($rez);
                    $_SESSION['id_user'] = $row['id_user'];
                    $id = $_SESSION['id_user'];
                    setcookie("phone", $phone, time() + 1800, '/');
                    setcookie("id_user", $id, time() + 1800, '/');
                }
            }

            echo("да");

            //    $res = $sms->sendQuickSms($message, $phone);
            //    _echo ("Sent sms using sendQuickSms method");
        }
    }
