// Календарь
 $(function() {
$( "#datepicker" ).datepicker({
showOtherMonths: true,
selectOtherMonths: true,
showButtonPanel: true,
 changeMonth: true,
changeYear: true,
dateFormat: 'dd.mm.yy'
});
});
//Формат календаря
$.datepicker.regional['ru'] = {
  closeText: 'Закрыть',
  prevText: '<Пред',
  nextText: 'След>',
  currentText: 'Сегодня',
  monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
  'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
  monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
  'Июл','Авг','Сен','Окт','Ноя','Дек'],
  dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
  dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
  dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
  weekHeader: 'Не',
  dateFormat: 'dd.mm.yy',
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['ru']);


//Проверяет ячейку на пустату при нажатии кнопки далее. Если ячейка пуста сообщает об этом. 
//nId - id устанавливаемого класса
//nexP - возвращеное значение для общей проверки
function checkId (nId,nexP) {  
  if (nId.val() == "") {  
    nId.parents(".form-group").addClass("has-error")
    .children('.form-mess').show("slow");
    return 0;   
    }  
    return nexP;
  }

//Устанавливает сшушателя, при изменении ячейки, очищает ячейку от сообщания об ошибки, если ошибка исправленна
//nId - Id ячейки, которую нужно очистить
function cleanId (nId) {  
     nId.change(function() {
      nId.parents(".form-group").removeClass("has-error")
        .children('.form-mess').hide("slow");
    });
  }  

//Функция установленна на все форму, при изменении
//значения в двух ячейках , отображает 3 часть первого шага
function log(event) {
  if (  ($( "#name_topic" ).val() !='') && ($( "#item_name" ).val()!='' )) {    
  $("#vis3, #upload").show("slow");
  $("#item_name-info" ).hide("slow");

  }
  
}


$("#datepicker" ).change(function() {
  if ($( "#datepicker" ).val() !=''){
  $("#datepicker-info").hide("slow");
  }


});


//Первый шаг: установка слушателя изменений
cleanId($("#check1"))
cleanId($("#name_topic"))
cleanId($("#item_name"))
cleanId($("#datepicker"))
cleanId($("#name_sources"))



//При изменении первого пуформы
$("#check1" ).change(function() {
  var ncoll;
  $("#check1-info" ).hide("slow");
  $("#vis2" ).show("slow");
     
  i = $( "#check1" ).val();
  //Замена "предмета" на "кафедру"
  if (i=='диплом' || i=='главы к диплому') {
      ncoll = 1;
      $("label[for=item_name]" ) .html('Кафедра');
      $("#item_name-info" ) .html('Напишите название кафедры (специальность), по которой выпускаетесь.<br /> Рекомендация: Название кафедры записать без сокращений');
      $("#item_name-mass" ) .html('Укажите название кафедры');

    }
    else {
       $("label[for=item_name]" ) .html('Предмет'); 
       $("#item_name-info" ) .html('Рекомендация: Название предмета записать без сокращений'); 
       $("#item_name-mass" ) .html('Укажите название предмета');  
    }

 //Пояснения которое поялвяется для прекрепления файлов
    if (i=='диплом' || i=='главы к диплому') {
      $("#file-msg2" ) .html('<p class="help-block col-sm-offset-2"> ВАЖНО: Чтобы все малейшие требования были учтены, для выполнения дипломной работы желательно прикрепить всю имеющуюся информация которая есть (методички и план диплома, если он уже согласованны с преподавателем.)</p>');
    }
    else if (i=='курсовая') {
      $("#file-msg2" ) .html('<p class="help-block col-sm-offset-2"> ВАЖНО: Чтобы все малейшие требования были учтены, для выполнения курсовой работы желательно прикрепить всю имеющуюся информация (методичк и т.д.) которая есть. </p>');
    }
     else {
      $("#file-msg2" ) .html('');
     }

    //При выборе "другое" или "" (отсутствие выбора)
  if (i=='другое') {
      ncoll = 1;
      $("#form-other" ) .show("slow");}
  else if (i=='') {
      $("#vis2" ).hide("slow"); //скрыть вторую часть
      $( "#form-other" ) .hide("slow");
            ncoll = 0;}
    else {
      if (ncoll == 1){
            $( "#form-other" ) .hide("slow");
            ncoll = 0;
          }
      }  
});

//Клик по кнопки "дальше" Шаг1 //Проверки для каждой части
$("#page1") .click(function() {
  var nexPage = 1;
  if ($("#check1").val() == ""){
      nexPage = checkId($("#check1"),nexPage)} 
  else if 
    (($( "#name_topic" ).val() =='') || ($( "#item_name" ).val()=='' )) 
  {   
      if ($( "#name_topic" ).val() =="")  {
    nexPage = checkId($("#name_topic"),nexPage)}  

    if ($( "#item_name" ).val()=="" ){
      nexPage = checkId($("#item_name"),nexPage)}
    }
   else {    
      if ($( "#datepicker" ).val() =="")  {
    nexPage = checkId($("#datepicker"),nexPage)
    }  
    if ($( "#name_sources" ).val() =="")  {
    nexPage = checkId($("#name_sources"),nexPage)
    }  
   }    
   //Показать вторую страницу
     if (nexPage ==1) {
      $(".step1").fadeOut( 300, 0 );
      $("#upload, #uploadRe").hide();
      $(".step2").delay(400).fadeTo( 300, 1 );    
   }
});

//Кнопка обратно Шаг2
$("#page2-repet") .click(function() {   
    $(".step2").hide();
    $(".step1, #upload, #uploadRe").show(); 
});


//Второй шаг
cleanId($("#name_name"))
cleanId($("#name_phone"))
cleanId($("#name_mail"))
cleanId($("#name_pass"))

//$('#repeatMail').modal()

//При совпадении паролей появляется модальное окно в нем можно ввести пароль который бедет вставлен в форму (модальное окно вызывается в другой функции)
$("#sumbPass") .click(function(event) {
  var str = $("#errPassword").val();
  $("#name_pass").val(str);   
  $("#page3").click();
});


$("#page3") .click(function() {  
  var nexPage = 1;
  nexPage = checkId($("#name_name"),nexPage)
  nexPage = checkId($("#name_phone"),nexPage)
  nexPage = checkId($("#name_mail"),nexPage) 
  nexPage = checkId($("#name_pass"),nexPage) 
 
   if (nexPage ==1) {
    //alert('ok') 

    // Проверка формы
      var forma = $('#formZakaz');

       //берем из формы метод передачи данных
        var m_method=forma.attr('method');
        //получаем адрес скрипта на сервере, куда нужно отправить форму
        var m_action=forma.attr('action');
        //получаем данные, введенные пользователем в формате input1=value1&input2=value2...,
        //то есть в стандартном формате передачи данных формы
        var m_data=forma.serialize();
        $.ajax({
          type: m_method,
          url: m_action  /*+'/2' */,
          data: m_data ,
          dataType: "json"          
          }).done(function( result ) {
            //alert(result.stringify + 'done');           
            $("#mailRe").hide().html('');
            
            if (result.err =='true') {

              $('#repeatMail').modal()
            } 

              /*
              .parents(".form-group").addClass("has-error")
    .children('.form-mess').show("slow");


            */
              //#phoneRe
              
              /* if (result != 'error') {
               // document.location.href = '/questions?first=1'; 
              } else  {  $('#tyt').html('<p class="text-center">Такой телефон уже зарегистрирован. Пожалуйста позвоните администратору для решения этого вопроса. +7-952-944-38-87</p>')} */
                  
        }).fail(function(result) {
            alert(result + 'fail')
            $('#tyt').html("нет ответа... Сообщите об ошибке на почту 380-00-63@mail.ru")
            })        
        

   }
});


var numF =1, chNum = 0;

//Фаил + Добавить еще
$( document ).on( "click", ".file-add", function() {
         var cod = "<div class='form-group'> <label for='exampleInputFile"+numF+"' class='col-sm-2' >Фаил</label><div class='col-sm-6'><input type='file' id='exampleInputFile"+numF+"' name='exampleInputFile["+numF+"]'class='exampleInputFile btn btn-default'></div><div class='col-sm-4'> <button type='button' class='btn btn-success file-add'> <strong>+</strong> Добавить ещё</button> </div></div>"
    
    if (numF < 20) {      
       $("#file-group").append(cod);
       numF ++;}
    if ((numF == 20) && (chNum ==0)) { 
    $('#file-group').append( "<p class='help-block'>Максимальное количество файлов равно 20. <br /> Попробуйте заархивировать файлы</p>" );
    chNum =1;
       }

    });


//$("#upload").appendTo("#file-group");


$(document).ready(function() {
      $('#name_mail').blur(function() {
        if($(this).val() != '') {
          var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
          if(pattern.test($(this).val())){            
            $('#name_mail_name-mass').hide("slow");
          } else {
            $('#name_mail_name-mass').html('Проверьте и укажите точный Ваш email').show("slow");
          }
        } else {
          $('#name_mail_name-mass').html('Поле email не должно быть пустым').show("slow");          
        }
      });
    });

$("#clonFile").click(function(event) {
  $("#origFile, #upload2").click();
});


///////////////////

