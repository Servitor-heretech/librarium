<?
require 'php/hud.php';
authcheck(function(){header('location: /');})
?>
<title>Education.ru forum</title>

<body>
	<div class="group"><div class="caption">ЗАГОЛОВОК</div><input class="th-input"></div>
	<button class="textbutton" onclick="addtheme()">Создать обсуждение</button>
	<div class="message"></div>

</body>

<footer style="position: fixed; bottom: 0px;"></footer>
<style type="text/css">
	.comment{
		position: fixed;
		top: 88px;
		width: 100%;
	}
	.comment .textbutton{
		float: right;
		position: static;
		margin-right: 20px;
	}
	
</style>
<script type="text/javascript" src="js/forum.js"></script>
