<?
require 'php/hud.php';
authcheck(function(){header('location: /');})
?>
<title>Education.ru forum</title>

<body>
	<div class="mathead" style="font-size: 30px;"><? $data = mysqli_fetch_assoc(mysqli_query($con, "SELECT `name` FROM `forum` WHERE `id` = ".$_GET['id'])); echo $data['name'] ?></div>

<? load_comments($_GET['id']) ?>
<div style="display:flex; justify-content: center;">
	<div class="group"><div class="caption">КОММАЕНТАРИЙ</div><textarea class="th-input" style="height:300px; width: 50vw"></textarea></div>
</div>
	<button class="textbutton" onclick="anstheme(<? echo $_GET['id'] ?>)">Добавить комментарий</button>
</body>

<footer style="position: fixed; bottom: 0px;"></footer>
<style type="text/css">
	.comment{
		width: 100%;
		height: 17%;
	}
	.comment .bodyitem{
		margin: 12px;
		width: 60%;
	}
	.comment .textbutton{
		float: right;
	}
	.hb{
		display: none;
	}

</style>
<script type="text/javascript" src="js/forum.js"></script>
<script type="text/javascript">
	$(".convers>.convers [contenteditable]").attr('contenteditable',false); //
	dif = window.innerHeight - $('footer').offset().top;
	if ( dif > 0 ) { $('footer').css('margin-top',dif - $('footer').height())}
</script>

