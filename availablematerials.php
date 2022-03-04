<?
require "php/hud.php";
authcheck(function(){header('location: /');});
?>
<title>Education.ru</title>

<head>
	<button class="textbutton" onclick="location = '/homepage.php'">Все материалы</button>
	<button class="textbutton" onclick="location = '/availablematerials.php'">Доступные мне</button>
	<button class="textbutton" onclick="location = '/favorite.php'">Избранное</button>
	<button class="textbutton" onclick="location = '/mymaterials.php'">Мои материалы</button>
</head>

<body>
	<?
	
	$allmembership = mysqli_query($con, "SELECT `id` FROM `groups` WHERE `members` LIKE '%".$user['id']."%'");
	$shared = Array();
	while($membof = mysqli_fetch_assoc($allmembership)) {
		$maters = mysqli_query($con,"SELECT * FROM `materials` WHERE `shared` LIKE '%".$membof['id']."%'");
		while($mat = mysqli_fetch_assoc($maters)) {
		$authname = mysqli_fetch_assoc(mysqli_query($con, "SELECT `name`, `surname` FROM `users` WHERE `id` = '".$mat['author']."'"));
		echo '<div class="bodyitem"><a href="/view.php?id='.$mat['id'].'"><h3 style="display: inline-block">'.$mat['name'].'</h3><p style="float: right">'.$authname['name'].' '.$authname['surname'].'</p></a></div>';}
	}// THEN DO SHARED UPDATING
	// may show duplicates
	
	?>
</body>
<footer style="position: fixed; bottom: 0px;"></footer>

<style type="text/css">
	.textbutton{
		display: inline;
		box-sizing: border-box;
		left: calc(50% - 412px);
	}
</style>
