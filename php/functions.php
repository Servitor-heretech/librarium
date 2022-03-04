<?

$con = mysqli_connect("37.140.192.80","u1498766_default","Ii7KqeE1h3qXHhF9","u1498766_default");
mysqli_set_charset($con,"utf8");

function sanitize($target){
	global $con;
	if (gettype($target) == 'string'){
		$target = mysqli_escape_string($con, $target);
	}
	if (gettype($target) == 'array'){
		foreach ($target as &$value) {
		$value	= mysqli_escape_string($con, $value);
		}

	}

	return $target;

}

$_POST = sanitize($_POST);
$_GET = sanitize($_GET);
$_COOKIE = sanitize($_COOKIE);

$cookie_key = $_COOKIE['session_key'];

$data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `cookie_keys` WHERE `session_key` = '$cookie_key' AND `active` = 1"));

$user = Array();

if ($data) {
	$d = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = ".$data['user_id']);
	$user = mysqli_fetch_assoc($d);
	$user['status'] = 'authorized';
}
else{
	$user['status'] = 'unauthorized';
}

function authcheck($fun = null, $fun2 = null){
	if ($fun === null) { $fun = function(){die();}; }
	if ($fun2 === null) { $fun2 = function(){}; }
	global $user;
	if ($user['status'] == 'unauthorized'){
		$fun();	
	}
	else{
		$fun2();
	}
}

function load_comments($thread){
	global $con;
	$r = mysqli_query($con,"SELECT * FROM `comments` WHERE `theme` = $thread");
	while ( $data = mysqli_fetch_assoc($r) ){
		?>

	<div class="convers">
		<div class="f-comment">
			<div class="f-posted"><?  echo date('d/m/Y H:i',strtotime($data['posted'])) ?></div>
			<div class="f-author"><? 
			$r2 = mysqli_query($con, "SELECT CONCAT(`name`,' ',`surname`) FROM `users` WHERE `id`= ".$data['author']);
			$auth = mysqli_fetch_row($r2);
			echo $auth[0];
		?></div>
			<div class="f-text"><? echo $data['text'] ?></div>
		</div>
	</div>

		<?
	}
}

?>