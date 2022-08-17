<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="btn.css">
  <title>Авторизация</title>
</head>
    <body>
      <section class="about">
    <div class="contact-us">
		<form class = "userForm" action="login.php" method="POST">
           <?php require 'loginTwuo.php'; ?>
		   <br>
		   <br>
		  <p>
			<input type="text" name="login" required = "required" value = "<?php echo @$data['login']; ?>"><span>Login</span>
		  </p>
		  <p>
			<input type="password" name="password" required = "required" value = "<?php echo @$data['password']; ?>"><span>Password</span>
		  </p>
		  <p>
			<button class = "btn_4" type="submit" name = "do_login">
			    <span>Войти</span>
                <span>Войти</span>
			</button>
		  </p>
		  <br>
		  <br>
		   <p>
			<a href="passwordRecovery/email.php" class = "btn_3">
			  <span>Забыли пароль</span>
			  <span>Забыли пароль</span>
			</a>
		 </p>

		</form>
    </div>
       </section>
    </body>
</html>
