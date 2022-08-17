<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="btnTwuo.css">
  <title>Форма Регистрации</title>
</head>
<body>
   <section class="about">
      <div class="contact-us">
          <form class="userForm" action="signup.php" method="POST">
            <?php
            require 'signupTwuo.php';
            ?>
            <br>
            <p><input type = 'text' name = 'name' required = 'required' value = "<?php echo @$data['name']; ?>"><span>Name:</span></p>
            <p><input type = 'text' name = 'surName' required = 'required' value = "<?php echo @$data['surName']; ?>"><span>SurName:</span></p>
            <p><input type='text' name='login' required = 'required' value = "<?php echo @$data['login']; ?>"><span>Login:</span></p>
            <p><input type="text" name="email" required = 'required' value = "<?php echo @$data['email']; ?>"><span>Email:</span></p>
            <div class="group1">
                    <p><input type = 'text' id = "Phone" name = 'phone' required = 'required' value = "<?php echo @$data['phone']; ?>"><span>&nbsp;&nbsp;&nbsp;&nbsp;71234567890</span></p>
            </div>
            <div class="group2">
                    <p><input type = 'date' id = "date" name = 'date' required = 'required' value = "<?php echo @$data['date']; ?>"></p>
            </div>
            <div class="password-Checker">
              <div class="password32">
              <div class="input-group">
                <p><input type="password" id = "password"  name="password" required = 'required' placeholder="Password" value = "<?php echo @$data['password']; ?>"></p>
                <a href="#" class="password-control" onclick="return show_hide_password_1(this);"></a>
                </div>
            </div>
              <div class="progress">
                <div class="bar"></div>
              </div>
            </div>
            <div class="password32">
              <p><input type="password" id = "password-input" name="password_2" required = 'required' value = "<?php echo @$data['password_2']; ?>"><span>Pass.Confirm:</span></p>
              <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
            </div>

            <p><lable class = 'sex'>Пол</lable></p>
              <div class = 'genderUser'>
                  Мужской <input class = 'radioB' type = 'radio' name = 'userGender' value = 'Мужской'>
                  Женский <input class = 'radioB' type = 'radio' name = 'userGender' value = 'Женский'>
              </div>
            <p><textarea name = 'userMessage' cols="30" rows="3" required = 'required' ></textarea><span>Ваш комментарий<span class = 'error'>&nbsp;&nbsp;*</span></span></p>
              <div class="capth">
            <p><img src = "captcha.php" class = "captchas" ></p><!--<p><input type="text" name="captcha" placeholder="Проверочный код" required="required"></p> -->
            <p><input type="text" name="captcha" placeholder="Проверочный код *" required="required"></p>
              </div>
            <button class = 'btn' type = 'submit' name = 'do_signup'>
                <span>Зарегистрироваться</span>
                <span>Зарегистрироваться</span>
            </button>
            <br>

          </form>
      </div>
</section>
<script src="script.js"></script>
</body>
</html>
