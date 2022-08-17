<?php
require 'db.php';

htmlspecialchars($_SERVER['PHP_SELF']);

function checkInput($text) {
  $text = trim($text);
  $text = stripcslashes($text);
  $text = htmlspecialchars($text);
  return $text;
}

$data = $_GET;
$password = $data['password'];
$password_confirm = $data['password_2'];
if($_SESSION['user'] != NULL) header('Location: /PasswordUpdate/login.php');
if($data['key'] === NULL) header('Location: /PasswordUpdate/login.php');

$user = R::findOne('users', 'change_key = ?', array($data['key']));
if(!$user) header('Location: /PasswordUpdate/login.php');

if(isset($data['change'])) {
  if ($password === $password_confirm) {
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{7,}$/u", checkInput($data['password']))) {
      print_r("<br>Введите корректный пароль.<br>Длиной не менее 7 символов,
              включает латинские буквы верхнего и нижнего регистра, цифры и спец.символы.<br>Ваш пароль:  {$data['password']}");
    } else {
    $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
    $user->change_key = NULL;
    R::store($user);
    header('Location: /PasswordUpdate/login.php');
  }
} else { 	//Если пароль и его подтверждение НЕ совпадают - выведем ошибку:
  print_r("<br>Пароли не совпадают!");
  }
}
