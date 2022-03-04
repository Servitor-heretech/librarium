function setCookie(name, value, options = {}) {

  options = {
    path: '/',
    ...options
  };

  if (options.expires instanceof Date) {
    options.expires = options.expires.toUTCString();
  }

  let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

  for (let optionKey in options) {
    updatedCookie += "; " + optionKey;
    let optionValue = options[optionKey];
    if (optionValue !== true) {
      updatedCookie += "=" + optionValue;
    }
  }

  document.cookie = updatedCookie;
}

function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

function logout() {
  master('stop_session',{},function(){
    setCookie('session_key', '');
    location = '/login.php';
  })
}

function checkedUsers(){
mas = [];
$('.select_user input[type=checkbox]:checked').each(function(){ mas.push($(this).data('id')) });
return mas }

function checkedMaterials(){
mas = [];
$('.select_mater input[type=checkbox]:checked').each(function(){ mas.push($(this).data('id')) });
return mas }

// function URLget(par){
//   url = location.search
//   var regex = /[?&]([^=#]+)=([^&#]*)/g, params = {}, match;
//   while(match = regex.exec(url)) {
//       params[match[1]] = match[2];
//   }
//   return params[par];
// }

function isValidJson(str) {
  try {
    JSON.parse(str);
    return true;
  } catch (e) {
    //console.error(e.message);
    return false;
  }
}


function master(command,parameters = {},handler = function( data ){ }){
  parameters['command']  = command;

  $.ajax({
    url : "/php/master.php",
    data : parameters,
    error : function(obj, status) { if (status == 'timeout') { message('Превышено время ожидания ответа') } else { message('Ошибка отаправки запроса') } },
    method : 'POST',
    success : function(data){ 
      if (isValidJson(data) == false) { console.log(data); return false }
      data = JSON.parse(data);
      if (data['type'] == 'error') { message(data['message']); return false } 
      if (data['type'] == 'console') { console.log(data['message']); } 
      if (data['type'] == 'refresh') { location = location ; } 
      if (data['type'] == 'warn') { message(data['message']); }
      handler(data); },
    timeout : 8000
}
)
  }


function message(usertext){
  $('.message').text(usertext).fadeIn();
  //$('.message').on('click') // .stop()  -- optional
  $('.message').fadeOut(4500);
}
