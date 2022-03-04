<?
require "php/hud.php";
authcheck(function(){header('location: /');});
?>

<title>Education.ru</title>

<div class="module">
<?

$r = mysqli_query($con, "SELECT `content`, `shared` FROM `materials` WHERE `id` =".$_GET['id']);
$data = mysqli_fetch_assoc($r);

echo $data['content']; //.replace()

?>

</div>

<select id="add_type">
	<option value="1">Текст</option>
	<option value="2">Тест – один верный вариант</option>
	<option value="3">Тест – открытый вопрос</option>
	<option value="4">Тест – множественный выбор</option>
</select> <!-- show options for test (checkbox, radio, textarea) if value=2 -->
<button class="textbutton" onclick="ab($('select option:selected').val())">Добавить блок</button>
<!--<button class="headitem" style="background-image: url(/media/picture.svg);"><input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"></button>-->
<div>
	<button class="textbutton publ" onclick="privacy($(this).text())">Сделать открытым</button>

	<div class="textbutton u-tog" onclick="csstoggle($('.select_user'), 'Скрыть группы', 'Показать группы', $('.u-tog'))">Скрыть/показать группы</div>
	<div class="select_user">
<?
		$grres = mysqli_query($con,"SELECT `id`,`name` FROM `groups` WHERE `creator` = ".$user['id']);
		while($grdata = mysqli_fetch_assoc($grres)){
			?>
		<div><label><input data-id="<? echo $grdata['id'] ?>" type="checkbox"<? if (in_array($grdata['id'], json_decode($data['shared']))){ echo 'checked'; } ?>><span><? echo $grdata['name'] ?></span></label></div>
			<?
		}
?>
	</div>

	<button class="textbutton" onclick="em(<? echo $_GET['id'] ?>, $('.publ').data('public'))">Сохранить изменения</button>   
	<button class="textbutton" onclick="location = location">Сбросить</button>
</div>
<footer style="position: fixed; bottom: 0px;"></footer>

<style>
	textarea{
		margin-top: 15px;
		resize: vertical;
		width:  300px;
		min-height: 100px;
		max-height: 300px;
	}
	select{
		width:  300px;
		padding:  5px 20px;
		margin-top: 15px;
	}
	.q-var{
		display: inline-block;
		padding:  10px;
		border: 1px solid #0005;
		width: 40%;
		display: inline-block;
		margin: 5px;
	}
	img[src="media/delete.svg"]{
		width: 20px;
		float: right;
		cursor: pointer;
	}

	.selected,.q-var[data-correct="1"]{
	border:  1px solid orange;
}

</style>

<script type="text/javascript" src="/js/matercreate.js"></script>

<script>
	
	$('.single .q-var').on('click',function(){	$(this).parent().children('.q-var').removeClass('selected');
	$(this).addClass('selected');
})


$('.multiple .q-var').on('click',function(){
	if ($(this).hasClass('selected')){
		$(this).removeClass('selected'); } else {
		$(this).addClass('selected');
		}
})

	function privacy(val){
		if (val == 'Сделать открытым'){
			$('.publ').text('Сделать закрытым');
			$('.publ').data('public', 1);
		}
		if (val == 'Сделать закрытым'){
			$('.publ').text('Сделать открытым');
			$('.publ').data('public', 0);
		}
	}

</script>
<script type="text/javascript" src="/js/procedures.js"></script>