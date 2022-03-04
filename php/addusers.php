<?
require $_SERVER['DOCUMENT_ROOT']."/php/functions.php";

$users = $_POST['users'];
$maters = $_POST['mats'];
$grname = $_POST['name'];

$r2 = mysqli_query($con, "SELECT `id` FROM `groups` WHERE `name` = '$grname' AND `creator` = ".$user['id']);
if (mysqli_fetch_row($r2) != null) {
	echo 'exists';
	die();
}

mysqli_query($con,"INSERT INTO `groups` SET `materials` = '$maters', `members` = '$users', `name` = '$grname', `creator` = ".$user['id']);

$r = mysqli_query($con,"SELECT `id` FROM `groups` WHERE `creator` = '".$user['id']."' ORDER BY `id` DESC LIMIT 1");
$data = mysqli_fetch_assoc($r);
echo $data['id'];

// bad server opt

?> 