<?php
$link = mysqli_connect('localhost', 'root', '', 'likeusers');
$link->set_charset('utf8');
$link->query("SET NAMES utf8 COLLATE utf8_general_ci");

$clientIp = $_POST['ip'];
$article_id = $_POST['id'];
$sql = "INSERT INTO likes (id, client_ip, article_id) VALUES (NULL, '$clientIp', '$article_id')";
$query = mysqli_query($link, $sql);

function quantityLikes($postID) { // функция принимает ID поста
    global $link;
    $sql = "SELECT client_ip FROM likes WHERE article_id = '$postID' GROUP BY client_ip"; // выбираем IP из таблицы likes с уникальными значениями
    $query = mysqli_query($link, $sql);
    $likes = mysqli_fetch_all($query, 1);
    return $likes;
}
