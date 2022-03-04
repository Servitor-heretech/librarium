nomore = 0;

function message(html){
	$('.message').html(html);
	$('.message').fadeIn();
	$('.message').fadeOut(10000);

}

function addblock(choice){
	alert(choice)
}

// $('.module').on('click','img[src="media/delete.svg"]',function(){
// 	$(this).parent().remove();
// })

$('.module').on('dblclick','.single .q-var',function(){
	if (nomore == 1) { return false }
	$(this).parent().children('.q-var').removeClass('selected');
	$(this).addClass('selected');
})


$('.module').on('dblclick','.multiple .q-var',function(){
	if (nomore == 1) { return false }
	if ($(this).hasClass('selected')){
		$(this).removeClass('selected'); } else {
		$(this).addClass('selected');
		}
})



function check(){
	r = 0; w = 0;
	nomore = 1;
	$('.single .selected').each(function(){
		if ($(this).data('correct') == 1) {
			r += 1;
		} else {
			w += 1;
		}
	})

	$('.multiple .q-var').each(function(){
		if (($(this).data('correct') == 1) && ($(this).hasClass('selected'))) {
			r += 1;
		}
		if (($(this).data('correct') == 1) && ($(this).hasClass('selected') == false)) {
			w += 1;
		}

		if (($(this).data('correct') != 1) && ($(this).hasClass('selected'))) {
			w += 1;
		}
	})

	$('.open .ans').each(function(){
		if (($(this).val().trim().toUpperCase() == $(this).data('correct')) && ($(this).data('correct') != false)){
			r += 1;
		}
		else {
			w += 1;
		}
	})

	alert(r+" / "+(r+w))
}

function am(ispublic){
	$('.selected').attr('data-correct',1);
	$('.selected').removeClass('selected');
	$('.ans').each(function(){$(this).attr('data-correct',$(this).val())});
	$.post('/php/addmaterial.php',{name : $('.mathead').text(), content : $('.module').html(), public : ispublic, shared : JSON.stringify(checkedUsers())});
	location = '/homepage.php';
}

function ab(selected) {
	if (selected == 1) {
		$('.module').append($('<div class="theory"><p contenteditable>Заголовок</p><div class="bodyitem" contenteditable></div><button class="textbutton hb" onclick="($(this)).parent().remove()">Удалить блок</button></div>'))
	}
	if (selected == 2) {
		$('.module').append($('<div class="question single"><p contenteditable>Текст вопроса</p><div class="q-options"><div class="q-var" contenteditable>1<img src="media/delete.svg" alt=""></div><div class="q-var" contenteditable>2<img src="media/delete.svg" alt=""></div><div class="q-var" contenteditable>3<img src="media/delete.svg" alt=""></div><div class="q-var" contenteditable>4<img src="media/delete.svg" alt=""></div></div><div><button class="textbutton hb" onclick="av($(this))">Добавить вариант ответа</button><button class="textbutton hb" onclick="delb($(this))">Удалить блок</button></div></div>'))
	}
	if (selected == 4) {
		$('.module').append($('<div class="question multiple"><p contenteditable>Текст вопроса</p><div class="q-options"><div class="q-var" contenteditable>1<img src="media/delete.svg" alt=""></div><div class="q-var" contenteditable>2<img src="media/delete.svg" alt=""></div><div class="q-var" contenteditable>3<img src="media/delete.svg" alt=""></div><div class="q-var" contenteditable>4<img src="media/delete.svg" alt=""></div></div><div><button class="textbutton hb" onclick="av($(this))">Добавить вариант ответа</button><button class="textbutton hb" onclick="delb($(this))">Удалить блок</button></div></div>'))
	}
	if (selected == 3) {
		$('.module').append($('<div class="question open"><p contenteditable>Текст вопроса</p><input type="text" class="ans"></div>'))
	}
}

function av(object) {
	object.parent().parent().children('.q-options').append('<div class="q-var" contenteditable>ответ<img src="media/delete.svg" alt=""></div>')
}

function delb(object) {
	object.parent().parent().remove();
}

function em(matid, ispublic){
	$('.selected').attr('data-correct',1);
	$('.selected').removeClass('selected');
	$('.ans').each(function(){$(this).attr('data-correct',$(this).val())});
	$.post('/php/editmaterial.php',{name : $('.mathead').text(), content : $('.module').html(), materid : matid, public : ispublic, shared : JSON.stringify(checkedUsers())});
	location = '/homepage.php'; 
}