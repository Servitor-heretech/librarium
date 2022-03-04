<?

require "php/hud.php";

?>

<title>Education.ru authorization</title>

<div class="form" style="border-top-left-radius: 8px; border-top-right-radius: 8px;">
		<div class="text">Логин</div>
		<input type="text" id="login">
	</div>

	<div class="form" style="border-bottom-left-radius: 8px; border-bottom-right-radius: 8px">
		<div class="text">Пароль</div>
		<input type="password" id="password">
	</div>
	<button class="textbutton" id="reg">Регистрация</button>
	<button class="textbutton" id="ent">Войти</button>
</div>

<style type="text/css">
	#reg{
		position: relative;
		left: calc(50% - 222px);
		top: 80px;
		border: 1px dotted #8080a0;
		color: #8080a0;
	}

	#reg:hover{
		border: 1px solid #8080a0;
		color: #000;
	}

	#ent{
		position: relative;
		left: calc(50% - 188px);
		top: 80px;
	}

	input #password{
		text-decoration-style: dotted;
	}
</style>
<footer style="position: fixed; bottom: 0px;"></footer>
<script type="text/javascript" src="/js/procedures.js"></script>
