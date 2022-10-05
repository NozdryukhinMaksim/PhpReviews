<?php
//Выход из аккаунта
session_start();
session_destroy();
setcookie('login', '', time() - 3600);
setcookie('key', '', time() - 3600);
setcookie('PHPSESSSID', '', time() - 3600);
$new_url = '../login.php';
header('Location: ' . $new_url);
exit();
