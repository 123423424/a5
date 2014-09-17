<?php

class ChekZakazController extends Param
{     
	public function actionIndex()
    { 
        // если запрос асинхронный, то нам нужно отдать только данные
        if(Yii::app()->request->isAjaxRequest){
            $this->param = '->'; 
            
        /*  foreach ($_POST as $a=>$b)  $this->param .= "$a=>$b/"; 
            echo    $this->param;     */
          
           
          
           
             //Прием параметров и загрузка компонента авторизации
            $this->param = $_POST;
           // echo 'f1+';
            
             Yii::import('application.folder.Verification', true);
             
            
            $verific = new Verification( $this->param ['name_mail'], 'email' ); 
            
            //Подготовка к проверке
            $email = $verific->newValue ( $this->param ['name_mail'], 'email' );
            $user = Yii::app()->db->createCommand()->select('id')->from('{{orders}}')->where('mail="'.$email.'"')->queryAll(); 
                
                //Проверка есть ли такой пользователь
                if ($user) { 
                //if (false) {     
                    echo 4; return;                             
                } else {
                  /*
            ->
            check1=>задачи/
            other=>Другое/
            name_topic=>Темавы/
            item_name=>Предмет5/
            datepicker=>25.09.2014/
            name_sources=>Объем/
            name_requirement=>Требования/
            name_name=>Имя/
           
            name_vk=>Ссылка на Вашу страницу /
            name_institution=>Курс/
            name_volume=>Антиплагиат/
            name_pass=>534535
            */   
            
                //Работа с препленными файлами
                $file = isset($_POST['file']); 
                
                //добавь двоеточие : в ветификацию text2
                $phone =$verific->newValue($this->param ['name_phone'], 'tel');
                
                $type           =$verific->newValue ( $this->param ['check1'], 'text' );
                $type_other     =$verific->newValue ( $this->param ['other'], 'text2' );                           
                $topic          =$verific->newValue ( $this->param ['name_topic'], 'text2' );
                $item           =$verific->newValue ( $this->param ['item_name'], 'text2' );
                $datepicker     =$verific->newValue ( $this->param ['datepicker'], 'text2' );
                $sources        =$verific->newValue ( $this->param ['name_sources'], 'text2' );
                $requirement    =$verific->newValue ( $this->param ['name_requirement'], 'text2' );
                $name           =$verific->newValue ( $this->param ['name_name'], 'text2' );
                $pass           =$verific->newValue ( $this->param ['name_pass'], 'pass' );
                $vk             =$verific->newValue ( $this->param ['name_vk'], 'text2' );
                $institution    =$verific->newValue ( $this->param ['name_institution'], 'text2' );
                $volume         =$verific->newValue ( $this->param ['name_volume'], 'text2' );
                
                
                //Серверные переменные 
                $idClient = '12345';               
                $ip = $_SERVER['REMOTE_ADDR'];  
                
                
                $sql="INSERT INTO {{orders}} 
                        (`idClient`,
                         `ip`, 
                         `Date`, 
                         `chFile`, 
                         `type`, 
                         `type_other`, 
                         `topic`,  
                         `item`, 
                         `datepicker`, 
                         `sources`,                          
                         `requirement`,
                         `name`,
                         `phone`,
                         `mail`,
                         `pass`,
                         `vk`,
                         `institution`,
                         `volume`                         
                         ) 
                VALUES ( '$idClient',
                         INET_ATON('$ip'),
                         CURRENT_TIMESTAMP,
                         '$file',
                        
                         
                         '$file',
                         '$type_other',
                         '$topic',
                         '$item',
                         '$datepicker', 
                         '$sources',
                         '$requirement',
                         '$name',
                         '$phone',
                         '$email',
                         '$pass',
                         '$vk',
                         '$institution',
                         '$volume'                         
                          )";
                          
                          // '$type',
                
                Yii::app()->db->createCommand($sql)->execute();  
                $nomId = Yii::app()->db->getLastInsertID();
                
                //Работа с файлами
                if($file !=0){
                    $fileArrey = $_POST['file'];
                    if (is_array($fileArrey)){                        
                            $idOrders =$nomId;
                            foreach ($fileArrey as $a) { 
                                $a =  preg_replace ("/[^a-zA-Z0-9\.,_() -]/","", $a);
                                $sql="INSERT INTO {{file}}  (`idOrders`, `pathTo`)  VALUES ( '$idOrders', '$a')";
                                Yii::app()->db->createCommand($sql)->execute();  
                            }
                    } else {return;}
                }             
                
                
               
                
                /*
                //Отправка почты
                $this->widget('application.extensions.email.debug');
                $email = Yii::app()->email;
                $email->to = '380-00-63@mail.ru';
                $email->subject = 'Регистрация кв. '.$roomInput;
                $email->message = $nameInput.'<br />'.$surnameInput.'<br />'.$patronymicInput.'<br />'.$roomInput.'<br />'
                        .$mailInput.'<br />'.$ip;
                $email->send();
                */         
                                
                // Завершаем приложение
                Yii::app()->end(); 
            } 
            
            
          } // \isAjaxRequest
    
    } //   \actionIndex 
   
    
    private function ch($lastId, $nameInput)
	{
	   Yii::app()->user->name = "reg"; 
       
       $arr = array(               
                'id' =>   $lastId,
                'firstName' => $nameInput,
                'validation' => 0, 
                );
                
        Yii::app()->user->id= $arr;
       
	}    
}