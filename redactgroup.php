<?
require_once "php/hud.php";
authcheck(function(){header('location: /');});
?>
<title>Education.ru</title>

<body>

<?
$resgroup = mysqli_query($con, "SELECT `name`, `members`, `materials` FROM `groups` WHERE `id` = ".$_GET['id']);
$resgr = mysqli_fetch_assoc($resgroup);
$name = $resgr['name'];
$members = json_decode($resgr['members']);
$currentmats = json_decode($resgr['materials']);
?>

<div class="group"><div class="caption">НАЗВАНИЕ ГРУППЫ</div><input type="text" class="gr-input" value="<? echo $name ?>" oldname="<? echo $name ?>"></div>


<div class="textbutton u-tog" onclick="csstoggle($('.select_user'), 'Скрыть пользователей', 'Показать пользователей', $('.u-tog'))">Скрыть/показать пользователей</div>

<div class="select_user"><?
$resusers = mysqli_query($con, "SELECT `id`, `name`, `surname` FROM `users`");
while ($data = mysqli_fetch_assoc($resusers)) {

	?><div><label><input data-id="<? echo $data['id'] ?>" type="checkbox"<? if (in_array($data['id'], $members)){ echo 'checked'; } ?>><span><? echo $data['name']." ".$data['surname'] ?></span></label></div><?
}

?></div> 


<div class="textbutton m-tog" onclick="csstoggle($('.select_mater'), 'Скрыть материалы', 'Показать материалы', $('.m-tog'))">Скрыть/показать материалы</div>


<div class="select_mater"><?
$resmats = mysqli_query($con, "SELECT `id`, `name` FROM `materials` WHERE `author` = ".$user['id']);
while ($resm = mysqli_fetch_assoc($resmats)) {
	?><div><label><input data-id="<? echo $resm['id'] ?>" type="checkbox"<? if (in_array($resm['id'], $currentmats)){ echo 'checked'; }?>><span><? echo $resm['name'] ?></span></label></div><?
} ?> <!-- ATTENTION TO IN_ARRAY 2ND ARGUMENT -->

</div>
<div class="textbutton" onclick="master('groupupdate',{oldname : $('.gr-input').attr('oldname'), name : $('.gr-input').val(), members : JSON.stringify(checkedUsers()), materials : JSON.stringify(checkedMaterials())})">Сохранить изменения</div>

<div class="message"></div>

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
<!-- <script type="text/javascript" src="/js/"></script> -->
<script type="text/javascript">
	function changed(){
		$('.message').text('Группа изменена').fadeIn();
		$('.message').fadeOut(4500);
	}

</script>
<script type="text/javascript" src="/js/functions.js"></script>
