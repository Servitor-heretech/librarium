<?
require "php/hud.php";
authcheck(function(){header('location: /');});
?>
<title>Education.ru</title>


<body>
	<button class="textbutton" onclick="location = '/groupcreation.php'">Создать группу</button>
	
	<?
	$groups = mysqli_query($con,"SELECT * FROM `groups` WHERE `creator` = '".$user['id']."'");
	while($gr = mysqli_fetch_assoc($groups)) {
		echo '<div class="bodyitem"><a href="/redactgroup.php?id='.$gr['id'].'">'.$gr['name'].'</a><div style="float: right">'.$user['name'].' '.$user['surname'].'</div></div>';
	}
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
