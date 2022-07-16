<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="form_2.css">
  <!--<link rel="stylesheet" href="btnTwuo.css">-->
  <title>Authorize Form</title>
</head>
<body>
   <div class="contact-us">
     <?php

       htmlspecialchars($_SERVER['PHP_SELF']);
       session_start(); // создает новую сессию или восстанавливает текущую
       print_r(session_id()); // вывод id сессии
       print_r("<br>");
       print_r("<br>");
       if (!isset($_GET['submit'])) {
           print_r("<form class = 'userForm'>
                  <p><input type = 'text' name = 'login' required = 'required'><span>Login:<span class = 'error'>*</span></span></p>
                  <p><input type = 'password' name = 'passwd' required = 'required'><span>Password<span class = 'error'>*</span></span></p>
                  <button class = 'btn' type = 'submit' name = 'submit'>
                  <span>Войти</span>
                  <span>Войти</span>
                  </button>
                </form>");
         } else {
           $password = $_GET['passwd']; // переменная с паролем который создал клиент
           $login = $_GET['login']; // его логин

           //$link = mysqli_connect("localhost", "root", "", "database");
           $link = mysqli_connect("localhost", "personbk_database", "VP!MrPpFMjG9yuz", "personbk_database");

           if ($link === false) {
           print_r("Невозможно подключиться к MySQL. Ошибка: " . mysqli_connect_error());
           } else {
           print_r("Соединение установлено успешно!<br><br>");
             $sql = "SELECT userPassword FROM mydatabase WHERE userLogin = '" . $login . "';";
             $result = mysqli_query($link, $sql);
             if ($result === false) {
               print_r("<br>Произошла ошибка при выполнении запроса: " . mysqli_error($link));
             } else {
               $passwordBD = mysqli_fetch_array($result);  // переменная которая относится к хешу в базе данных
               $loginBD = mysqli_fetch_array($result);
               if (password_verify($password, $passwordBD['userPassword'])) {
                 $_SESSION['logged_in_user_id'] = '1';
                 $_SESSION['logged_login'] = 'login';
                //  if ($_GET['login'] === $loginBD['userLogin'] && $_GET['passwd'] === $passwordBD['hash']){
                 Header("Location: privatePage.php"); // перенаправляем на страницу
                 } else {
                 print_r("Неверный ввод, попробуйте еще раз<br><br>");
                 print_r("Через 5 сек. Вы автоматически отправитесь на форму авторизации.");
                 Header("Refresh: 5; authorize.php");
                 }
             }
          }
       }
     //}
       print_r("<br>");
       print_r("<br>");
       //print_r($_SESSION); //вывод всех меременных суссии
      ?>
      <!--  required = "required" <form class = "userForm" method = "POST" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> обработка кода php в этом же файле -->

      <form class = 'userForm'>
        <a href="index.php" class = 'btn_2'>
          <span>Главная страница</span>
          <span>Главная страница</span>
        </a>
     <br>
     <br>
      </form>
   </div>
</body>
</html>
<?php

/*  htmlspecialchars($_SERVER['PHP_SELF']);
  session_start(); // создает новую сессию или восстанавливает текущую

  if (!isset($_GET['submit'])) {
      print_r("<form class = userForm>
             <p><input type = text name = login required = required><span>Login:<span class = error>*</span></span></p>
             <p><input type = password name = passwd required = required><span>Password<span class = error>*</span></span></p>
             <button class = btnWTPNews type = submit name = submit><span>Отправить</span></button>
           </form>");
    } else {
      $_SESSION['login'] = $_GET['login']; //регистрируем переменную логин
      $_SESSION['passwd'] = $_GET['passwd']; // регистрируем переменную passwd,  теперь
      // логин и пароль - глобальные переменные для этой сессии
      if ($_GET['login'] === "abc" && $_GET['passwd'] === "123") {
        Header("Location: privatePage.php"); // перенаправляем на страницу
      } else {
        print_r("Неверный ввод, попробуйте еще раз<br>");
      }
    }
  print_r("<br>");
  //print_r($_SESSION); //вывод всех меременных суссии

 ?>*/
