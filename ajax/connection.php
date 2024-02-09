<?php
error_reporting(E_ALL);
ini_set('display_errors','on');
$host='172.19.6.64';
$user='root';
$password='';
$database='minchat_db';
$con = mysqli_connect($host, $user, $password, $database) or die("Ошибка подключения " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8'");

?>