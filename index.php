<?
require "php/hud.php";
?>
<title>Welcome to Education.ru</title>
<body>
	<center style=""></center>
	<?
	$maters = mysqli_query($con,"SELECT * FROM `materials` WHERE `public` = '1'"); // OR `shared` ??? '".$user['id']."'
	while($mat = mysqli_fetch_assoc($maters)) {
		$authname = mysqli_fetch_assoc(mysqli_query($con, "SELECT `name`, `surname` FROM `users` WHERE `id` = '".$mat['author']."'"));
		echo '<div class="bodyitem"><a href="/view.php?id='.$mat['id'].'"><h3>'.$mat['name'].'</h3><p>'.$authname.'</p></a></div>';
	}
	?>
</body>
<footer style="position: fixed; bottom: 0px;"></footer>
