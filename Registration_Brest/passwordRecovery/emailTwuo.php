<?php
require 'db.php';

htmlspecialchars($_SERVER['PHP_SELF']);

function checkInput($text) {
  $text = trim($text);
  $text = stripcslashes($text);
  $text = htmlspecialchars($text);
  return $text;
}

$data = $_POST;
if(isset($data['forgot'])) {
  if (!filter_var(checkInput($data['email'], FILTER_VALIDATE_EMAIL))) {
   print_r("<br>Введите корректный email.");
 } else {
  $user = R::findOne('users', 'email = ?', array($data['email']));
  if ($user) {
    $key = md5($user->login.rand(100000, 999999));
    $user->change_key = $key;
    R::store($user);

    $url = $site_url.'newPass.php?key='.$key;
    $message = $user->login.", был выполнен запрос на изменение вашего пароля. \n\n Для изменения перейтиле по ссылке: ".$url."\n\n Если это были не вы, то советуем вам изменить пароль!";
    mail($data['email'], 'Подтвердите действие', $message);
    print_r("<br>Ссылка для изменения пароля отправлена на почту");
    print_r("Через 6 сек. Вас переведут на персональную страницу.<br><br>");
    header('Refresh: 6; /PasswordUpdate/login.php');

  } else {
    print_r("<br>Данный Email не зарегистрирован");
  }
 }
}
