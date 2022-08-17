<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Home page</title>
</head>
    <body>
      <section class="about">
    <div class="contact-us">
      <?php
      require 'db.php';
      htmlspecialchars($_SERVER['PHP_SELF']);
      echo "<br>";
      ?>
      <?php if (isset($_SESSION['logged_user'])) : ?>
        Авторизован!<br>
        Привет, <?php echo $_SESSION['logged_user']->login; ?>
        <hr>
        <a href="logout.php">Выйти</a>
      <?php else : ?>
      <form class = 'userForm' method = 'GET' action = 'formResultOne.php' >

            <h1>Привет всем!</h1>
            <h2>Это главная страница магазина</h2>
            <br>
            <br>
            <a href="login.php" class = "btn">
              <span>Авторизация</span>
              <span>Авторизация</span>
            </a>
            <br>
            <br>
            <a href="signup.php" class = "btn_2">
              <span>Регистрация</span>
              <span>Регистрация</span>
            </a>
        </form>
  </div>
       </section>
    </body>
</html>
<?php endif; ?>
