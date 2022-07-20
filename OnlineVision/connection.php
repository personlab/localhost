<?
include 'cookies.php';
include 'rb.php';
R::setup( 'mysql:host=localhost;dbname=personbk_database',
       'personbk_database', 'VP!MrPpFMjG9yuz' ); //for both mysql or mariaDB

$cookie_key = 'online-cache'; // название ключа
$ip = $_SERVER['REMOTE_ADDR']; // ip users
$online = R::findOne('online', 'ip = ?', array($ip));

if ($online) {
  $do_update = false;
  // Update
  if (CookieManager::stored($cookie_key)) {
    // Via cookie
    $C = (array) @json_encode(CookieManager::read($cookie_key), true);
    if ($c) {
      if ($c['lastvisit'] < (time() - (60 * 5))) { // Обновление данных если более пяти минут
        $do_update = true;
      }
    } else {
      // Withoud cookies
      $do_update = true;
    }
  } else {
    // Withoud cookies
    $do_update = true;
  }
  // Uodate if requared
  if ($do_update) {
    // Withoud cookies
    $time = time();
    $online->lastvisit = $time;
    R::store($online);
    CookieManager::store($cookie_key, json_encode(array('id' => $online->id, 'lastvisit' => $time)));
  }
} else {
  //create
  $time = time();
  $online = R::dispense('online');
  $online->lastvisit = $time;
  $online->ip = $ip;
  R::store($online);
  CookieManager::store($cookie_key, json_encode(array('id' => $online->id, 'lastvisit' => $time)));
}

$online_count = R::count('online', "lastvisit >" . (time() - (3600)));

//echo '<pre>';print_r($_COOKIE);exit(); дампы
