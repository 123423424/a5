$(document).ready(function(){  
    // $(".statys").click(function(){ }       
      //alert('');

//Отправка запроса на создания БД
    $('.query').click(function(){ 
       var str= $(this).data('query');
       var mess='Готово';
    $.ajax({
	type: "POST",
	url: 'Ajax/'+str,
	 //,	data: { name: geo }
	}).done(function(msg) {  
	       $('.query').filter(function() { return  $(this).data('query') == str; }).html(msg); 			
	}) .fail(function() {  
	    $('.query').filter(function() { return  $(this).data('query') == str; }).html('error');
    });
});    

















	 
}); // $(document).ready /
