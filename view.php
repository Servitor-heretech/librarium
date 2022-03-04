<?

require $_SERVER["DOCUMENT_ROOT"]."/php/hud.php";

?>

<title>Education.ru</title>

<div class="module">


<?

$r = mysqli_query($con, "SELECT `content` FROM `materials` WHERE `id` =".$_GET['id']);
$data = mysqli_fetch_assoc($r);

echo $data['content']; //.replace()

if (strpos($data['content'], 'question') != -1){
	echo('<div><button class="textbutton" onclick="check()">Проверить</button></div>');
}

?>
<button class="textbutton addfav" onclick="addfav(<? echo $_GET['id'] ?>)">Добавить в избранное</button>
</div>

<div class="message" onclick="$(this).stop();$(this).fadeOut();"></div>

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
		display:  none;
	}
	.selected{
		border:  1px solid orange;
	}
	.hb{
		display: none;
	}
	.bodyitem:empty{
		display: none;
	}
</style>

<script type="text/javascript" src="/js/matercreate.js"></script>

<script>
	
	$('.single .q-var').on('click',function(){
	if (nomore == 1) { return false }
	$(this).parent().children('.q-var').removeClass('selected');
	$(this).addClass('selected');
})

$("*[contenteditable]").attr('contenteditable',false);

$('.multiple .q-var').on('click',function(){
	if (nomore == 1) { return false }
	if ($(this).hasClass('selected')){
		$(this).removeClass('selected'); } else {
		$(this).addClass('selected');
		}
})

function addfav(matid){
	$.post("/php/addfav.php",{favid : matid}).done(function(data){
		if (data == 'добавлен') {
			$('.addfav').text("Удалить из избранного");
		}
		if (data == 'удалён') {
			$('.addfav').text("Добавить в избранное");
		}
	})
}
</script>