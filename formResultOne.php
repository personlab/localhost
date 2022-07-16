<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="formResult.css">
  <title>Result</title>
</head>
<body>
    <form class = "userForm" method = "GET" action = "formResult.php">
      <?php
        include 'formResult.php';
        ?>
        <br>
        <br>
      <p><span>Ваше имя: <span class = "error"><?php echo $userBD; ?></span></span></p>
      <br>
      <p><span>Фамилия: <span class = "error"><?php echo $userBDSurName; ?></span></span></p>
      <br>
      <p><span>Ваш Login: <span class = "error"><?php echo $login; ?></span></span></p>
      <br>
      <p><span>Ваше Email: <span class = "error"><?php echo $email; ?></span></span></p>
      <br>
      <p><span>Ваш номер: <span class = "error"><?php echo $phone; ?></span></span></p>
      <br>
      <p><span>Ваш пол: <span class = "error"><?php echo $gender; ?></span></span></p>
      <br>
      <p><span>Ваш комментарий: <?php echo $comment; ?></span></p>
      <br>
      <br>
      <a href="index.html">
        <span>Ввести данные</span>
        <span>снова</span></a>
    </form>
</body>
</html>
