<?php

class ChekZakazController extends Param
{     
    
    	public function actionIndex2()
    { echo   json_encode(array("str" => 'lll', "err" => 'true', )); ; return; 
        } //   \actionIndex 
   
	public function actionIndex()
    {
        // если запрос асинхронный, то нам нужно отдать только данные
        if(Yii::app()->request->isAjaxRequest){ 
             
            
            
        /*  foreach ($_POST as $a=>$b)  $this->param .= "$a=>$b/"; 
            echo    $this->param;     */
           
             //Прием параметров и загрузка компонента авторизации
            $this->param = $_POST;          
            
             Yii::import('application.folder.Verification', true);  
            $verific = new Verification( $this->param ['name_mail'], 'email' ); 
            
            //Подготовка к проверке
            $email = $verific->newValue ( $this->param ['name_mail'], 'email' );
            $pass           =$verific->newValue ( $this->param ['name_pass'], 'pass' );
            
            $user = Yii::app()->db->createCommand()->select(array('id', 'pass'))->from('{{client}}')->where('mail="'.$email.'"')->queryRow(); 
            $str ='';
                //Проверка есть ли такой пользователь
                if ($user) {    
                // if (false) {   
                    //Проверка пароль
                    if($user['pass'] == $pass) {$str .= 'Пароли равны!';}
                    else {$str .= 'Пароли НЕ равны!';}
                    //foreach ($user as $a => $b) {$str.= "$a => $b";}
                    echo  json_encode(array("str" => $str, "err" => 'true', )); 
                    //echo 'error'; 
                    return;                             
                } else {                  
            
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
                
                $vk             =$verific->newValue ( $this->param ['name_vk'], 'text2' );
                $institution    =$verific->newValue ( $this->param ['name_institution'], 'text2' );
                $volume         =$verific->newValue ( $this->param ['name_volume'], 'text2' );
                
                
                //Серверные переменные                            
                $ip = $_SERVER['REMOTE_ADDR'];  
                
                $sql="INSERT INTO {{client}} 
                        (`name`,`phone`,
                         `mail`,`pass`,
                         `vk`                  
                         ) 
                VALUES ( '$name', '$phone',
                         '$email', '$pass',
                         '$vk'                                                
                          )";   
                
                Yii::app()->db->createCommand($sql)->execute();  
                $idClient = Yii::app()->db->getLastInsertID();
                
               //Вставка заказа
                $sql="INSERT INTO {{orders}} 
                        (`idClient`,`ip`, 
                         `Date`,`chFile`,`type`, 
                         `type_other`,`topic`,  
                         `item`, `datepicker`, 
                         `sources`, `requirement`,                        
                         `institution`, `volume`                         
                         ) 
                VALUES ( '$idClient', INET_ATON('$ip'),
                         CURRENT_TIMESTAMP, '$file','$type',
                         '$type_other', '$topic',
                         '$item', '$datepicker', 
                         '$sources',   '$requirement',                         
                         '$institution',  '$volume'                         
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
                $this->ch($idClient,$name); 
                //Yii::app()->user->name = "client";        
                echo '{}';
                 return;            
                // Завершаем приложение
                Yii::app()->end(); 
            } 
           
            
          } // \isAjaxRequest
    
    } //   \actionIndex 
   
    
    private function ch($lastId, $nameInput)
	{
	   Yii::app()->user->name = "client";        
       
       $arr = array(               
                'id' =>   $lastId,
                'Name' => $nameInput,                
                );                
        Yii::app()->user->id= $arr;      
	}    
}