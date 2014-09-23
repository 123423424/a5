$(document).ready(function(){ 	


	//Плавное отображение страницы
	$('tbody tr').hover(function() {
		$(this).addClass('info');
		/* Stuff to do when the mouse enters the element */
	}, function() {
		$(this).removeClass('info');

		/* Stuff to do when the mouse leaves the element */
	});

	//Переход по проекту
	$('tbody tr').click(function(event) {
		//alert($(this).data('nomer'))
		//document.location.href = '/client?ааа='+ $(this).data('nomer');
		document.location.href = '/client/'+ $(this).data('nomer');
	});

// setInterval('alert("прошла секунда")', 1000);



/*
sec($('.collor-mess'), i);
//$('.collor-mess').removeClass('collor-mess');

 */
	//alert('ddd')



});

//Мигание сообщения
var i = 0;
function sec(myDiv, iM) { 
	if (i == 0) {myDiv.removeClass('collor-mess'); i = 1;} else {myDiv.addClass('collor-mess'); i = 0;} 	
}
setInterval( 'sec( $(".chengeColor"), i )', 700) ;


 