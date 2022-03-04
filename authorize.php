<?

require 'php/functions.php';


$login = $_POST['login'];
$password = $_POST['password'];

mysqli_set_charset($con, 'utf8');

$user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'"));
$response = Array();

if ($user == false) {
	$response['response'] = 'error';
	$response['comment'] = 'Нет совпадений.';
}
else{
	$response['response'] = 'ok';
	$newkey = hash('md4',rand()*time()*rand());
	$response['key'] = $newkey;
	mysqli_query($con, "INSERT INTO `cookie_keys` SET `user_id` = '".$user['id']."', `created` = CURRENT_TIMESTAMP, `session_key` = '$newkey', `active` = 1");
}

echo json_encode($response);

?>