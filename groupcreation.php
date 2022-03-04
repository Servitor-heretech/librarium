<?
require "php/hud.php";
authcheck(function(){header('location: /');});
?>
<title>Education.ru</title>

<body>
	<div class="group"><div class="caption">НАЗВАНИЕ ГРУППЫ</div><input type="text" class="gr-input"></div>
	

	<div class="textbutton u-tog" onclick="csstoggle($('.select_user'), 'Скрыть пользователей', 'Показать пользователей', $('.u-tog'))">Скрыть/показать пользователей</div>
	<div class="select_user">
<?
		$r = mysqli_query($con,"SELECT `id`,`name`,`surname` FROM `users`");
		while($data = mysqli_fetch_assoc($r)){
			?>
		<div><label><input data-id="<? echo $data['id'] ?>" type="checkbox"><span><? echo $data['name']." ".$data['surname'] ?></span></label></div>
			<?
		}
?>
	</div>

	<div class="textbutton m-tog" onclick="csstoggle($('.select_mater'), 'Скрыть материалы', 'Показать материалы', $('.m-tog'))">Скрыть/показать материалы</div>


<div class="select_mater"><?
$resmats = mysqli_query($con, "SELECT `id`, `name` FROM `materials` WHERE `author` = ".$user['id']);
while ($resm = mysqli_fetch_assoc($resmats)) {
	?><div><label><input data-id="<? echo $resm['id'] ?>" type="checkbox"><span><? echo $resm['name'] ?></span></label></div><?
} ?> 

</div>
<!-- <div class="textbutton" onclick="master('groupupdate',{oldname : $('.gr-input').attr('oldname'), name : $('.gr-input').val(), members : JSON.stringify(gatherData()), materials : null})">Сохранить изменения</div> -->

	<div class="message"></div>

	<button class="textbutton" onclick="atng()">Создать группу</button> <!-- ATTENTION TO DATA IN POST! ALL CHECKED ARE SENT AS ONE! -->
</body>
<footer style="position: fixed; bottom: 0px;"></footer>

<style type="text/css">
	.textbutton{
		display: inline;
		box-sizing: border-box;
		left: calc(50% - 412px);
	}
	.message{
		display: none;
	}
</style>
<script type="text/javascript" src="/js/grcreate.js"></script>
<script type="text/javascript" src="/js/functions.js"></script>