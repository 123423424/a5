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



	//alert('ddd')



});







 