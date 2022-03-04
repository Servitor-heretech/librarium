<?

require "php/hud.php";

?>

<title>Education.ru registration</title>
<form action="/sendform.php" method="POST">
	<div class="form" style="border-top-left-radius: 8px; border-top-right-radius: 8px;">
		<div class="text">Логин</div>
		<input type="text" name="login">
	</div>

	<div class="form">
		<div class="text">Пароль</div>
		<input type="text" name="password">
	</div>

	<div class="form">
		<div class="text">Имя</div>
		<input type="text" name="name">
	</div>

	<div class="form">
		<div class="text">Фамилия</div>
		<input type="text" name="surname">
	</div>

	<div class="form" style="border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; height: 58px;">
		<div class="text">Дополнительные сведения</div>
		<input type="textarea" name="info" placeholder="Необязательно"> <!-- larger text area??? -->
	</div>
	<button class="textbutton">Зарегистрироваться</button>
</form>

<footer style="position: fixed; bottom: 0px;"></footer>

<style type="text/css">
    footer{
    	position: fixed;
    	bottom: 0px;
    }

	.textbutton{
		top: 88px;
	}
</style>