$(document).ready(function(){ 	

//Свернуть/Развернуть задание
$('#collapseOne').on('show.bs.collapse', function () {
  $('h4.panel-title').html('<div class="dropup"><b class="caret"></b> Свернуть задание</div>');
})

$('#collapseOne').on('hide.bs.collapse', function () {
  $('h4.panel-title').html('<b class="caret"></b> Развернуть задание ');
})


//Добавление горизонтальной черты после диалогов
$('.dial').append('<hr />');


//$(".jspContainer").scrollTop(500);

/* //Не УДАЛЯЙ
// Загрузка 10 диалогов
var uploadDialog=1;
var uploadBatt=1;
$('.scroll-pane').scroll(function(){
	if ($(".scroll-pane").scrollTop() == 0){
		if (uploadBatt !=1){$("#bt-add_mess").prependTo("#add-mess_bl").show("slow"); 	}			
		setTimeout(function() {
			uploadBatt++;
			
			//Показать чат, сделанно плавно, т.к. вначеле с первого диалога нужно переместить в нижний диалог
			$('.Chat').animate({opacity: 1},300 );			
		}, 600); 
	}
});

*/

//Приссоединение диалога с помощью КНОПКИ
$("#bt-add_mess").click(function() {
		$(".ajax-exmpl").clone().find(".name-mess").html(uploadDialog+' диалог.').end().prependTo("#add-mess_bl").show("slow").removeClass('ajax-exmpl');
		uploadDialog++;
		$("#scroll-id").trigger('click');
	//alert('ddd');
		//window.location = '#top5';
});


// Начело для прокрутки
var mess = '<div class="mess">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>';
var s =1;
String.prototype.repeat = function(num){
    return new Array( num + 1 ).join( this );
}

var layer = $('#layer2'),
    wrapper = $('#contentcontainer').append(mess.repeat(9)),
    prevScrollH = wrapper.prop('scrollHeight');

//Привязка к скролу
wrapper.scrollTop(prevScrollH).on('scroll', function(e){
    var $that = $(this); 
    if($that.scrollTop() <= 0){ alert('dd')
        $.ajax({
            type: "POST",
			url: "/q.php",
            //dataType: 'html',
            beforeSend: function(){
                layer.show();
                s++;
            },
            complete: function(){
                layer.hide();
            },
            
            success: function(data){  
                //$that.prepend(data); 

                $that.scrollTop($that.prop('scrollHeight') - prevScrollH);
                prevScrollH = $that.prop('scrollHeight');                
            }
        }).done(function( msg ) {        	        	
			 $that.prepend(msg +'hhh <br />hhh <br />');
			 //s++;			

			//$('#tyt').html('myVar='+ myVar+'/msg3-null = '+msg2).css( "color", "red");
	});
    }
});

// Конец для прокрутки

// Начало форма для редактирования
$("#btm-edit-ord").click(function(event) {
	var allStr ='<form class="form-horizontal" role="form">'; 
	//allStr.html('kkk');
	var str = $(".td-order").each( function() {
		var dName = $(this).find(".dVolume").data('name');
		var dTitle = $(this).find(".dTitle").text();
		var dVolume = $(this).find(".dVolume").text();

		
		var ch =0;

		if (dName == 'trebov' ) {	
			allStr += '<div class="form-group"> <label for="tb_' + dName + '" class="col-sm-2 control-label">'+dTitle+'</label>';	
			allStr += '<div class="col-sm-10"> <textarea  id="tb_'+dName+'" name="tbn_'+dName+'"  class="form-control"  rows="5">'+dVolume + '</textarea></div></div>';
		} else if  (dName == 'files') {
			

			allStr += '<div class="form-group"><div class="checkbox">	';
			$(this).find(".file").each( function() {				

				var  nameF; 
				nameF = $(this).text();

				allStr += '<input id="file['+ch+']" class="CheckBoxClass" type="checkbox" name="file['+ch+']" value="'+nameF+'" checked>';
				allStr +='<label for="file['+ch+']" class="CheckBoxLabelClass" ><span class="glyphicon glyphicon-ok"></span>'+nameF+'</label><Br>';

				ch++;
			});
			allStr += '</div></div>';

		} else {
			allStr += '<div class="form-group"> <label for="tb_' + dName + '" class="col-sm-2 control-label">'+dTitle+'</label>';
			allStr += '<div class="col-sm-10"> <input type="text" id="tb_'+dName+'" name="tbn_'+dName+'" value="'+dVolume+'" class="form-control" ></div></div>';
		}
	});
	allStr +='</form>';
	$("#insert-project") . html(allStr);
// $("#insert-project") . html('<table class="table table-striped text-left"> <tbody>'+allStr+'</tbody> </table>');
	
});

//Изменение чекера при редактировании заказа (рабоат с файлами)
	$( document ).on( 'change', '.CheckBoxClass', function( e ) {
  e.preventDefault();
  if($(this).is(":checked")){
             $(this).next("label").find('.glyphicon').removeClass("glyphicon-remove").addClass("glyphicon-ok"); 

        }else{  
            $(this).next("label").find('.glyphicon').removeClass("glyphicon-ok").addClass("glyphicon-remove"); 
        } 
  
});



}); //Конец (document).ready












/*
window.addEvent('domready', function() {
		new ScrollControl($('contentcontainer'), {'createControls': true});
	});


//Функция плавной перемотки - не работает
$(function(){
   $('a[href^="#"]').click(function(){     		
        var target1 = $(this).attr('id');
        $('html, body').animate({scrollTop: $(target1).offset().top} , 18000);
       alert('sss');
        return false; 
   }); 
});
*/

 