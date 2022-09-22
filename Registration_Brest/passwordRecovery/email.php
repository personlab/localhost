<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Восстановление пароля</title>
</head>
<body>
  <form class = "userForm" action="email.php" method="post">
    <?php require 'emailTwuo.php'; ?>
    <h2>Забыли пароль?</h2>
    <br>
    <br>
    <p><input type = "email" name = "email" required = required><span>Введите ваш Email:</span></p>
    <p><button class = "btn_1" type = "submit" name = "forgot">
      <span>Отправить</span>
      <span>Отправить</span>
      </button>
    </p>
  </form>
</body>
</html>
