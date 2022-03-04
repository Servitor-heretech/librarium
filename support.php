<?
require 'php/hud.php';
authcheck(function(){header('location: /');})
?>
<title>Education.ru forum</title>

<body>
	<!-- autocomp -->
	<button class="textbutton" onclick="aq()">Добавить обсуждение</button>
	<?
	$themes = mysqli_query($con,"SELECT * FROM `forum`"); 
	while($them = mysqli_fetch_assoc($themes)) {
		$authname = mysqli_fetch_assoc(mysqli_query($con, "SELECT `name`, `surname` FROM `users` WHERE `id` = '".$them['author']."'"));
		echo '<div class="bodyitem"><a href="/themeview.php?id='.$them['id'].'"><h3 style="display: inline-block">'.$them['name'].'</h3><p style="float: right">'.$authname['name'].' '.$authname['surname'].'</p></a></div>';
	}
	?>
</body>

<footer style="position: fixed; bottom: 0px;"></footer>
<script type="text/javascript" src="js/forum.js"></script>
<script type="text/javascript">
	dif = window.innerHeight - $('footer').offset().top;
	if ( dif > 0 ) { $('footer').css('margin-top',dif - $('footer').height())}
</script>