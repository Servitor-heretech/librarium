<?
require $_SERVER['DOCUMENT_ROOT']."/php/functions.php";

mysqli_query($con,"INSERT INTO `forum` SET `name` = '".$_POST['name']."', `created` = CURRENT_TIMESTAMP, `author` = '".$user['id']."'");
$r = mysqli_query($con,"SELECT `id` FROM `forum` WHERE `author` = '".$user['id']."' ORDER BY `id` DESC LIMIT 1");
$data = mysqli_fetch_assoc($r);
echo $data['id'];
// get theme id -> comment query
?>