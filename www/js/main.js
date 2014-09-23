//Отображение без скачеков
$(document).ready(function(){ 	
	//Плавное отображение страницы
	/* $('body').animate({opacity: 0},0 );
	$('body').animate({opacity: 1},1000 ); */

	//Плавное отображение страницы
	$('body').fadeOut(0);
	$('body').fadeIn( 700 );


    //Ширина и высота экрана
   /* var siW, siH;
    siW = $(window).width();   // returns width of browser viewport
    siH = $(window).height();   // returns width of browser viewport
    alert('ширина:'+siW+'. Высота:'+siH); */
    
});


//"Открыть" форму регистрации и ввода
$('a#login').click(function (e) {
  e.preventDefault()
  $('#form1').addClass("modal").css('display', 'block');//overflow-y: scroll; .modal-open
  $('body').addClass("modal-open");  
  $('#form-log').show("slow")  
})

//Функция "закрыть" форму регистрации и ввода
function closeLogin (){ 
     $('#form1').removeClass("modal").css('display', 'none')
     $('body').removeClass("modal-open");  
    $('#form-log').hide("slow")
    $('.bs-docs-home ').css('overflow', 'auto') 
    }

//Закрыть форму регистрации и входа
$('#form-log-close').click(closeLogin);

//Закрыть форму регистрации и входа
$('#btn-log-close').click(closeLogin);

function getCookie(name) {
	var cookie = " " + document.cookie;
	var search = " " + name + "=";
	var setStr = null;
	var offset = 0;
	var end = 0;
	if (cookie.length > 0) {
		offset = cookie.indexOf(search);
		if (offset != -1) {
			offset += search.length;
			end = cookie.indexOf(";", offset)
			if (end == -1) {
				end = cookie.length;
			}
			setStr = unescape(cookie.substring(offset, end));
		}
	}
	return(setStr);
}

// Определение города
var myVar , msg2;
myVar = getCookie("ipGeoCookie");
myVar = decodeURIComponent(myVar);
	//Если нет КУКИ
if (myVar == "null"){
	$.ajax({
	type: "POST",
	url: "/ip/example.php"
	// ,	data: { name: "Jo2h3n" }
	}).done(function( msg ) {
			 msg2 = msg;
			$('.geoI').html(decodeURIComponent(msg)+ '-4-');
			//$('#tyt').html('myVar='+ myVar+'/msg3-null = '+msg2).css( "color", "red");
	});
}
	//Если куки установлена
else {     
	//alert ('hh=' + decodeURIComponent(myVar))
	//$('.geoI').html('ssss');
	$('.geoI').html(decodeURIComponent(myVar)+ '-3-');	
 } 


//Выбор другого города
$('.choice') .click(function(event) {	
	event.preventDefault();
	  var geo;
   geo = $( this ).data('geo');
$.ajax({
	type: "POST",
	url: "/ip/example.php"
	 ,	data: { name: geo }
	}).done(function( msg ) {
	  

			 msg2 = msg;
			$('.geoI').html(decodeURIComponent(msg));
			
	}) .fail(function() {
alert( "error" );
});
    
	$('.close') .click();  
}); 




