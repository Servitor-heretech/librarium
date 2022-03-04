
$('.search').on('input',function(){
	$('.finder').show()
	f = 0;
	$('.finder li').each(function(){
		if (($(this).text().toUpperCase().includes($('.search').val().trim().toUpperCase()))
			&& ($('.search').val().trim())){
			$(this).css('display', 'block')
		    f = 1;
		}
		else {
			$(this).css('display', 'none')
		}
	})
	if (!f){
		$('.finder').hide();
	}
})

$('.finder li').on('click', function(){
	$('.search').val(($(this).text()));
	$('.finder').hide()

})

//location = 'http://education.local/publicmaterials.php'
// location -> publicmaterials (-> another php db access & this js sort func)

$('#reg').on('click',function(){
	location = 'http://education.local/registration.php';
})

$('#ent').on('click',function(){
	$.post('authorize.php', {login : $('#login').val(), password : $('#password').val()}).done(function(data){
		data = JSON.parse(data); //add error message here!
		if (data['response'] == 'ok'){
			setCookie('session_key',data['key']);
			location = '/homepage.php';
		}
	})
})

function logout(){
	setCookie('session_key', '');
	location = '/';
}

$('.module').on('click','img[src="media/delete.svg"]',function(){
	$(this).parent().remove();
})

function found(request){
	location = '/searchresults.php?request='+request;
}

function csstoggle(obj, onshown, onhidden, btn){
	if (obj.css('display') == 'none'){
		obj.css('display', '');
		btn.val(onshown);
	} else {
		obj.css('display', 'none');
		btn.val(onhidden);
	}
}


$('.module').on('input','.ans',function(){
	$(this).attr('correct',$(this).val())
})
