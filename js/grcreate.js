function atg(groupid){
	addtogroup = $('.body selected').each(function(){$(this).data('id')});
	$.post('/php/addusers.php', {id : groupid, members : addtogroup});
}

function atng(){;
	$.post("/php/addusers.php",{name : $('.gr-input').val(), mats : JSON.stringify(checkedMaterials()), users : JSON.stringify(checkedUsers())}).done(function(data){
		if (data == 'exists') {
			$('.message').text('Группа с таким названием уже существует').fadeIn();
			$('.message').fadeOut(4500);
		} else {
			location = '/redactgroup.php?id='+data;
			console.log(data);
		}
	})
}
