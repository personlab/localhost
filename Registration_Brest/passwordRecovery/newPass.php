<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Создание пароля</title>
</head>
<body>
  <form class = "userForm" action="newPass.php" method="get">
    <h2>Новый пароль?</h2>
    <br>
    <br>
    <?php require 'newPassTwuo.php' ?>
    <input type = "hidden" name = "key" value = "<?php echo $data['key']; ?>">
    <div class="password-Checker">
    <div class="password32">
    <div class="input-group">
    <p><input type = "password" id = "password" name = "password" placeholder="Password" required = required></p>
    <a href="#" class="password-control" onclick="return show_hide_password_1(this);"></a>
  </div>
      </div>
        <div class="progress">
          <div class="bar"></div>
        </div>
  </div>
  <div class="password32">
    <p><input type = "password" id = "password-input" name = "password_2" required = required><span>Повторить пароль</span></p>
    <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
  </div>
    <button class = "btn_5" type = "submit" name = "change">
      <span>Изменить пароль</span>
      <span>Изменить пароль</span>
    </button>
  </form>
  <script src="script.js"></script>
</body>
</html>
