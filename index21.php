<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Personal Portfolio Website</title>
</head>
<body>
   <div class = "navigation">
     <div class = "banner">
       <img src = "me.jpg" class = "cover">
     </div>
     <div class="navLink">
       <ul>
         <li><a href="https://shopmaster.info/YuriyBaragin_Personal_Portfolio/Profile/">Обо мне</a></li>
         <li><a href="https://shopmaster.info/YuriyBaragin_Personal_Portfolio/Certificates/">Сертификаты</a></li>
         <li><a href="https://shopmaster.info/YuriyBaragin_Personal_Portfolio/Portfolio/">Портфолио</a></li>
       </ul>
     </div>
   </div>

   <section class = "sec">
     <header>
       <div class="toggle"></div>
       <a href="https://shopmaster.info/YuriyBaragin_Personal_Portfolio/Profile/" class = "btn">Я здесь</a>
     </header>

     <div class="imgBx">
       <img src="me-.jpg" class = "cover">
     </div>
     <div class="content">
       <h2>   <?php
                 include 'time.php';
                ?> я<br><span>Юрий Барагин</span></h2>
       <p>Synergy Learning System PHP-разработчик.</p>
 <a href="https://shopmaster.info/YuriyBaragin_Personal_Portfolio/Portfolio/" class = "btn">Посмотреть мои работы</a>
     </div>
     <footer>
       <ul class = "sci">
         <li><a href="https://www.facebook.com/yuriy.baragin/" target="_blank"><img src="facebook.png"></a></li>
         <li><a href="#" target="_blank"><img src="twitter.png"></a></li>
         <li><a href="https://www.instagram.com/shopmaster.info/" target="_blank"><img src="instagram.png"></a></li>
       </ul>
<div>
<p class ="copyrightText">  &copy;<?php print_r(date("Y"));  print_r("&nbsp;Yuriy Baragin");?></p>
  <div id = "time">
    <?php print_r(date("F j"));?>
  <div id = "hours">00</div>:
  <div id = "minutes">00</div>:
  <div id = "seconds">00</div>
</div>
</div>
     </footer>
   </section>


   <script>

   setInterval (() => {

         let hours = document.getElementById('hours');
         let minutes = document.getElementById('minutes');
         let seconds = document.getElementById('seconds');


         let h = new Date().getHours();
         let m = new Date().getMinutes();
         let s = new Date().getSeconds();

         // меняем 24 часовой формат на 12 часовой
        /* if (h > 12) {
           h = h - 12;
         } */
         //Прибавляем ноль к (часу) (minutam) (secundam)
         h = (h < 10) ? "0" + h : h;
         m = (m < 10) ? "0" + m : m;
         s = (s < 10) ? "0" + s : s;

         hours.innerHTML = h;
         minutes.innerHTML = m;
         seconds.innerHTML = s;

        })

     let menuToggle = document.querySelector('.toggle');
     let navigation = document.querySelector('.navigation');
     let sec = document.querySelector('.sec');
     menuToggle.onclick = function() {
       menuToggle.classList.toggle('active');
       navigation.classList.toggle('active');
       sec.classList.toggle('active');
     }
   </script>
</body>
</html>
