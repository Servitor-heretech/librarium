<?

require "php/hud.php";

?>

<title>Education.ru</title>

<div class="module">
	<center style="font-size: 30px;" class="mathead" contenteditable>Заголовок</center>

	<div class="question single">
		<p contenteditable>Вопрос</p>
		<div class="q-options">
			<div class="q-var" contenteditable>1<img src="media/delete.svg" alt=""></div>
			<div class="q-var" contenteditable>2<img src="media/delete.svg" alt=""></div>
			<div class="q-var" contenteditable>3<img src="media/delete.svg" alt=""></div>
			<div class="q-var" contenteditable>4<img src="media/delete.svg" alt=""></div>
		</div>
		<div><button class="textbutton hb" onclick="av($(this))">Добавить вариант ответа</button><button class="textbutton hb" onclick="delb($(this))">Удалить блок</button></div>
	</div>

</div>
<select id="add_type">
	<option value="1">Текст</option>
	<option value="2">Тест – один верный вариант</option>
	<option value="3">Тест – открытый вопрос</option>
	<option value="4">Тест – множественный выбор</option>
</select> <!-- show options for test (checkbox, radio, textarea) if value=2 -->
<button class="textbutton" onclick="ab($('select option:selected').val())">Добавить блок</button><!-- 
<button class="headitem" style="background-image: url(/media/picture.svg);"><input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"></button> -->

<div class="textbutton u-tog" onclick="csstoggle($('.select_user'), 'Скрыть группы', 'Показать группы', $('.u-tog'))">Скрыть/показать группы</div>
	<div class="select_user">
<?
		$r = mysqli_query($con,"SELECT `id`,`name` FROM `groups` WHERE `creator` = ".$user['id']);
		while($data = mysqli_fetch_assoc($r)){
			?>
		<div><label><input data-id="<? echo $data['id'] ?>" type="checkbox"><span><? echo $data['name'] ?></span></label></div>
			<?
		}
?>
	</div>

<button class="textbutton publ" onclick="privacy($(this).text())">Сделать открытым</button>
<button class="textbutton" onclick="am($('.publ').data('public'))">Создать материал</button>
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
		width:  130px;
		padding:  5px;
		margin-top: 15px;
	}
	.q-var{
		outline:  none;
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
	.selected{
	border:  1px solid orange;
	}
	.matclose{
		display: none;
	}
</style>

<script type="text/javascript" src="/js/matercreate.js"></script>
<script type="text/javascript" src="/js/procedures.js"></script>
<script type="text/javascript">
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