function aq(){
	location = '/themecreation.php';
}

function addtheme(){
	$.post('/php/addtheme.php',{name : $('.th-input').val()}).done(function(data){
	location = '/themeview.php?id='+data;
	});
}

function anstheme(tid){
	$.post('/php/redtheme.php', {themeid : tid, content : $('.th-input').val()}); 
	location = location;
}