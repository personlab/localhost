<?php
require 'db.php';

htmlspecialchars($_SERVER['PHP_SELF']);

function checkInput($text) {
  $text = trim($text);
  $text = stripcslashes($text);
  $text = htmlspecialchars($text);
  return $text;
}

$ip = $_SERVER['REMOTE_ADDR']; // ip users
$data = $_POST;
$captcha = trim($data["captcha"]);
if (isset($data['do_signup'])) {
 // регистрация
 $errors = array();
 if (!preg_match("/^(([a-zA-Z' -]{1,40})|([а-яА-Я' -]{1,40}))$/u", checkInput($data['name']))) {
   $errors[] = "Введите корректное имя.<br>Русские или английские буквы, пробел, знаки ' или -.<br>Ваше имя:  {$data['name']}";
 }
 if (!preg_match("/^(([a-zA-Z' -]{1,40})|([а-яА-Я' -]{1,40}))$/u", checkInput($data['surName']))) {
   $errors[] = "Введите корректную фамилию.<br>Русские или английские буквы, пробел, знаки ' или -.<br>Ваша фамилия:  {$data['surName']}";
 }
 if (!preg_match("/^([a-zA-Z0-9-'_]{2,20})$/u", checkInput($data['login']))) {
   $errors[] = "Введите корректный логин.<br>Русские или английские буквы, цифры и знаки - ' _.<br>Ваш логин: {$data['login']}";
 }
 if (!filter_var(checkInput($data['email'], FILTER_VALIDATE_EMAIL))) {
   $errors[] = "Введите корректный email.";
 }
 if (!preg_match("/^([0-9]{2,40})$/u", checkInput($data['phone']))) {
   $errors[] = "Введите корректный номер:<br>только цифры.<br>Ваш номер: {$data['phone']} ";
 }
 if (trim($data['date']) === '') {
   $errors[] = 'Укажите дату рождения';
 }
 if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{7,}$/u", checkInput($data['password']))) {
   $errors[] = "Введите корректный пароль.<br>Длиной не менее 7 символов,
           включает латинские буквы верхнего и нижнего регистра, цифры и спец.символы.<br>Ваш пароль:  {$data['password']}";
 }
 if (($data['password_2']) != $data['password']) {
   $errors[] ='Повторный пароль введен не верно!';
 }
 if (trim($data['userGender']) === '') {
   $errors[] = 'Укажите пол';
 }
 if (trim($data['userMessage']) === '') {
   $errors[] = 'Введите сообщение';
 }
 if (($_SESSION["rand"] != $captcha) && ($_SESSION["rand"] != "")) {
   $errors[] = "<strong>Ошибка!</strong> Вы ввели неправильную капчу";
 }
 if (R::count('users', "login = ?", array($data['login'])) > 0) {
   $errors[] = 'Пользователь с таким логином уже существует';
 }
 if (R::count('users', "email = ?", array($data['email'])) > 0) {
   $errors[] = 'Пользователь с таким Email уже существует';
 }

 if (empty($errors)) {
   // все хорошо: регистрируем
   $user = R::dispense('users');
   $user->ip = $ip;
   $user->name = $data['name'];
   $user->surName = $data['surName'];
   $user->login = $data['login'];
   $user->email = $data['email'];
   $user->phone = $data['phone'];
   $user->datebd = $data['date'];
   $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
   $user->gender = $data['userGender'];
   $user->message = $data['userMessage'];
   $user->join_date = date("F j, Y, g:i a");

   R::store($user); // сохраняем данные в базе данных
   echo '<div style = "color: green;">Вы успешно зарегистрированы!</div><hr><br>
   Через 5 сек. Вы автоматически отправитесь на форму авторизации.<br><br>';
    Header("Refresh: 5; login.php");
  } else {
   echo '<div style = "color: red;">'.array_shift($errors).'</div><hr>';
 }
}
