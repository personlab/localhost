  <!DOCTYPE html>
  <html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="btnTwuo.css">
    <title>Private Page</title>
  </head>
      <body>
        <?php
          htmlspecialchars($_SERVER['PHP_SELF']);
          session_start();
          print_r(session_id()); // вывод id сессии
          //print_r($_SESSION); //вывод всех меременных суссии
          print_r("<br>");
          print_r("<br>");

        print_r("<h1>Личная страница.<br>Добро пожаловать</h1>
        <br>
        <br>
        <h3><a href='index.php'>Главная страница</a></h3>");


          if (!($_SESSION['logged_in_user_id'] === '1' && $_SESSION['logged_login'] === 'login')) {
            Header("Location: authorize.php");
          }
          print_r("<br>");
          print_r("<br>");
          print_r("<br>");
          print_r("<br>");
          $visitCount = 0;

          if (isset($_COOKIE['visitCount'])) {
            $visitCount = $_COOKIE['visitCount'] + 1;
          }
          //setcookie("visitCount", $visitCount, strtotime("+30 days"));
          setcookie("visitCount", $visitCount, time()+3600);
          print_r("Вы посетили эту страницу " . $visitCount . " раз");

          ?>
      </body>
  </html>
