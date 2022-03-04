<?

require $_SERVER["DOCUMENT_ROOT"].'/php/functions.php';



$favid = $_POST['favid'];

mysqli_set_charset($con, 'utf8');

$r = mysqli_query($con, "SELECT * FROM `favorites` WHERE `favored_by` = ".$user['id']." AND `material` = $favid");

$data = mysqli_fetch_assoc($r);

if ($data != false) {
	mysqli_query($con, "DELETE FROM `favorites` WHERE `favored_by` = ".$user['id']." AND `material` = ".$favid);
	echo "удалён";
} else {
	mysqli_query($con, "INSERT INTO `favorites` SET `favored_by` = '".$user['id']."', `material` = ".$favid);
	echo "добавлен";
}

?>