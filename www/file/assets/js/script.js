var numberFile=0;
var chFile = 0;
var chMess = 0;
var iMy = 0;


// использование Math.round() даст неравномерное распределение!
function getRandomInt()
{
  return Math.floor(Math.random() * (999999 - 100000 + 1)) + 100000;
}

$(function(){

    var ul = $('#upload ul');
    ul.addClass('list-unstyled');

    $('#drop a').click(function(){
        // Simulate a click on the file input buttoАn
        // to show the file browser dialog
        $(this).parent().find('input').click();
    });

    // Initialize the jQuery File Upload plugin
    $('#upload').fileupload({

        // This element will accept file drag/drop uploading
        dropZone: $('#drop'),

        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {
            numberFile++;

//Очистка сообщений об ошибки и блока
            if (chMess ==1) {
                 $('#info-intro').hide("slow").html('');
                 chMess =0;
            }

 // Выводим  сообщение о допустимых объема файла
            if(data.files[0].size > 19000000){ 
                chMess =1;
                $('#info-intro').append("<p class='bg-danger padding10'>Нельзя загружать файлы больше 19MB. Воспользуйтесь сервисами: <a href='https://disk.yandex.ru' target='_blanc' >Яндекс.Диск </a> или  <a href='http://files.mail.ru/' target='_blanc' >Файлы Mail.Ru  </a>. После этого напишите ссылку в требованиях к проекту. Спасибо.</p>").show("slow");
                }
//Максимальное допустимое количество файлов chMess
           if(numberFile > 20){  
                chMess =1;             
                if (chFile==0) {
                                $('#info-intro').append("<p class='bg-danger padding10'>Максимальное количество файлов равно 20. <br /> Попробуйте заархивировать файлы</p>").show("slow");
                                //$('#info-intro').html("slow");
                                chFile = 1;
                            }
                 } // else { $('#info-intro').hide("slow"); }

// Выводим сообщение о допустимых типах файлов
            if(data.files[0]['type'] == 'application/octet-stream'){ 
                chMess =1;
                $('#info-intro').append("<p class='bg-danger padding10'>Нельзя загружать файлы с этим расширением. Воспользуйтесь архиватором RAR: <a href='http://www.win-rar.ru/download/winrar/' target='_blanc' >Скачать</a></p>").show("slow");
                 }
               if (chMess == 1 ) { return;}

            var tpl = $('<li class="working">  <div class="important-file"></div>               <div class="row">                  <div class="col-sm-6">                    <p></p>                    <span></span>                </div>                  <div class="col-sm-6">                    <div class="progress progress-striped active">Процес </div>                  </div>                </div>              </li>');

            // Append the file name and file size
            tpl.find('p').text(data.files[0].name);
           
                         
            var z = tpl.find('p');

            // Add  the HTML to the UL element
            data.context = tpl.appendTo(ul);

            // Initialize the knob plugin
            tpl.find('input').knob();

            // Listen for clicks on the cancel icon
            tpl.find('span').click(function(){

                if(tpl.hasClass('working')){
                    jqXHR.abort();
                }

                tpl.fadeOut(function(){
                    tpl.remove();
                });

            });

            // Automatically upload the file once it is added to the queue
            var jqXHR = data.submit();           
            
            },

        progress: function(e, data){
            $('#page1').attr('disabled','disabled');
            var n; 

            // Calculate the completion percentage of the upload
            var progress = parseInt(data.loaded / data.total * 100, 10);

            // Update the hidden input field and trigger a change
            // so that the jQuery knob plugin knows to update the dial
            data.context.find('input').val(progress).change();  // progress+'%'
           data.context.find('.progress').html(
            '<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="'+progress+'" aria-valuemin="0" aria-valuemax="100" style="width: '+progress+'%;">'+progress+'%</div>').change(); 
            data.context.find('input').html(data.loaded)
           

            if(progress == 100){
                var nfile = getRandomInt();
                data.context.find('.progress').removeClass("active progress-striped");
           // var allname = nfile+'-'+ data.files[0].name;
           // alert (allname);

                             
            }
        },

        fail:function(e, data){
            $('#page1').removeAttr('disabled');
            // Something has gone wrong!
            data.context.addClass('error');
        },
        success: function() {
            $('#page1').removeAttr('disabled');
            console.log(arguments);
           var cart = JSON.parse ( arguments[0] );
           $('#formZakaz').append('<input type="hidden" name = "file['+iMy+']" value="'+cart.param+'">');
           iMy++;

           if (cart.infoError =='yes') {
           var fileNameCut;
           fileNameCut = $(this).find('p').text();
            console.log(fileNameCut);

            $(this).html('<p class="form-mess bg-danger padding10"   style="display: block;">К сожалению,  фаил '+fileNameCut+' не получилось загрузить. Не волнуйтесь. Отправьте его на нашу почту 3802200@mail.ru . В теме напишите код ошибки:' + cart.nameEror +' и Ваш контатный телефон. <br /> Или воспользуйтесь сервисами: <a href="https://disk.yandex.ru" target="_blanc" >Яндекс.Диск </a> либо  <a href="http://files.mail.ru/" target="_blanc" >Файлы Mail.Ru  </a>. После этого напишите ссылку в требованиях к проекту. Спасибо.</p>');

       }
            
 

        //alert( cart.param);

    }

    });



    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

    // Helper function that formats the file sizes
    function formatFileSize(bytes) {
        if (typeof bytes !== 'number') {
            return '';
        }

        if (bytes >= 1000000000) {
            return (bytes / 1000000000).toFixed(2) + ' GB';
        }

        if (bytes >= 1000000) {
            return (bytes / 1000000).toFixed(2) + ' MB';
        }

        return (bytes / 1000).toFixed(2) + ' KB';
    }

});



/*    //Пояснения которое поялвяется для прекрепления файлов
    if (i=='диплом' || i=='главы к диплому') {
      $("file-msg2" ) .html('<p class="help-block col-sm-offset-2"> ВАЖНО: Чтобы все малейшие требования были учтены, для выполнения дипломной работы желательно прикрепить всю имеющуюся информация которая есть (методички и план диплома, если он уже согласованны с преподавателем.)</p>');
    }
    else if (i=='курсовая') {
      $("file-msg2" ) .html('<p class="help-block col-sm-offset-2"> ВАЖНО: Чтобы все малейшие требования были учтены, для выполнения курсовой работы желательно прикрепить всю имеющуюся информация (методичка) которая есть </p>');
    }
     else {
      $("file-msg2" ) .html('');
     }
*/

