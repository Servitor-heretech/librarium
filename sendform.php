<?
$con = mysqli_connect("37.140.192.80","u1498766_default","Ii7KqeE1h3qXHhF9","u1498766_default");

mysqli_set_charset($con, 'utf8');
$login = $_POST['login'];
$password = $_POST['password'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$info = $_POST['info'];
mysqli_query($con, "INSERT INTO `users` SET `name`='$name', `surname`='$surname', `login`='$login', `password`='$password', `info`='$info'");

$newuser = Array();
$newuser = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `users` WHERE `login`='$login'"));
mysqli_query($con, "INSERT INTO `cookie_keys` SET `user_id`='".$newuser['id']."', `session_key`='".hash('md4',rand()*time()*rand())."', `active` = 1, `created` = CURRENT_TIMESTAMP");
//read user id, create cookie_key

header('location: http://education.local/homepage.php');
?>