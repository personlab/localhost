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
      <form class = 'userForm' method = 'GET' action = 'formResultOne.php' >   <!-- enctype = 'multipart/form-data'> -->
        <p><input type = 'text' name = 'name' required = 'required'><span>Name:<span class = 'error'>*</span></span></p>
        <p><input type = 'text' name = 'surtName' required = 'required'><span>SurtName:<span class = 'error'>*</span></span></p>
        <p><input type = 'text' name = 'login' required = 'required'><span>Login:<span class = 'error'>*</span></span></p>
        <p><input type = 'text' name = 'email' required = 'required'><span>Email:<span class = 'error'>*</span></span></p>
<div class="group1">
        <p><input type = 'text' id = "Phone" name = 'phone' required = 'required' placeholder="Phone *"></p>
</div>
        <div class="group2">
        <p><input type = 'date' id = "date" name = 'date' required = 'required'></p>
      </div>
          <div class="password-Checker">
            <div class="input-group">
              <p><input type = "password" id = "password" name = "passwd" required = "required" placeholder="Password *"></p>
            </div>
            <div class="progress">
              <div class="bar"></div>
            </div>
          </div>
<div class="password32">
        <p><input type = 'password' id = 'password-input' name = 'passwd_confirm' required = 'required'><span>Pass.confirm<span class = 'error'>*</span></span></p>
        <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
</div>
        <p><lable class = 'sex'>Пол</lable></p>
          <div class = 'genderUser'>
              Мужской <input class = 'radioB' type = 'radio' name = 'userGender' value = 'Мужской'>
              Женский <input class = 'radioB' type = 'radio' name = 'userGender' value = 'Женский'>
          </div>
        <p><textarea name = 'userMessage' cols="30" rows="3" required = 'required'></textarea><span>Ваш комментарий<span class = 'error'>&nbsp;&nbsp;*</span></span></p>
          <div class="capth">
        <p><img src = "captcha.php" class = "captchas" ></p><!--<p><input type="text" name="captcha" placeholder="Проверочный код" required="required"></p> -->
        <p><input type="text" name="captcha" placeholder="Проверочный код *" required="required"></p>
          </div>
        <button class = 'btn' type = 'submit' name = 'submit'>
            <span>Зарегистрироваться</span>
            <span>Зарегистрироваться</span>
        </button>
            <br>
            <a href="privatePage.php" class = 'btn_2'>
              <span><h5>Персональная страница</h5></span>
              <span><h5>Персональная страница</h5></span>
            </a>

	    <br>
      </form>
    </div>
</section>
<script src="script.js"></script>
</body>
</html>
