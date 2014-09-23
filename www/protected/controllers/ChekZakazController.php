<?php

class ChekZakazController extends Param
{        
	public function actionIndex()
    {
        // если запрос асинхронный, то нам нужно отдать только данные
        if(Yii::app()->request->isAjaxRequest){ 
           
             //Прием параметров и загрузка компонента авторизации
            $this->param = $_POST;          
            
             Yii::import('application.folder.Verification', true);  
            $verific = new Verification( $this->param ['name_mail'], 'email' ); 
            
            //Подготовка к проверке
            $email = $verific->newValue ( $this->param ['name_mail'], 'email' );
            $pass           =$verific->newValue ( $this->param ['name_pass'], 'pass' );
            
            $user = Yii::app()->db->createCommand()->select(array('id', 'pass', 'name'))->from('{{client}}')->where('mail="'.$email.'"')->queryRow(); 
            $str ='';
            
                //Проверка есть ли такой пользователь
                if ($user) {  
                    //Проверка пароль
                    if($user['pass'] != $pass) {                      
                        //Пароли НЕ равны!                        
                        echo  json_encode(array("str" => $str, "err" => 'true', ));
                        return;
                        }
                    else { 
                          //Пароли равны!
                          $action = 'newOrder';                        
                        }                      
                } else {
                    //Новый пользователь
                    $action = 'newUserAndOrder';                 
                } 
                                
                //Общая часть
                $file = isset($_POST['file']); //Работа с препленными файлами  
                $fileArrey = $_POST['file'];
                $ip = $_SERVER['REMOTE_ADDR'];   //Серверные переменные                  
                                
                $type           =$verific->newValue ( $this->param ['check1'], 'text' );
                $type_other     =$verific->newValue ( $this->param ['other'], 'text2' );                           
                $topic          =$verific->newValue ( $this->param ['name_topic'], 'text2' );
                $item           =$verific->newValue ( $this->param ['item_name'], 'text2' );
                $datepicker     =$verific->newValue ( $this->param ['datepicker'], 'text2' );
                $sources        =$verific->newValue ( $this->param ['name_sources'], 'text2' );
                $requirement    =$verific->newValue ( $this->param ['name_requirement'], 'text2' );  
                $institution    =$verific->newValue ( $this->param ['name_institution'], 'text2' );
                $volume         =$verific->newValue ( $this->param ['name_volume'], 'text2' ); 
                
                //Создание нового пользователя и заказа
                if ($action == 'newUserAndOrder') {                     
                    $name           =$verific->newValue ( $this->param ['name_name'], 'text2' );
                    $phone          =$verific->newValue($this->param ['name_phone'], 'tel');
                    $vk             =$verific->newValue ( $this->param ['name_vk'], 'text2' );                    
                    //Создание нового клиента и возвращение его ID                 
                    $idClient = $this->newUser($name, $phone, $email, $pass, $vk);                
                     }
                     
                //Клиент старый заказа новый    
                if ($action == 'newOrder') { 
                    $idClient= $user['id'];
                    $name  =$user['name'];
                    
                }      
                    //Создание нового заказа                      
                    $nomId = $this->newOrder($idClient, $ip, $file, $type, $type_other, $topic, $item, 
                                    $datepicker, $sources, $requirement, $institution, $volume,
                                    $fileArrey  
                                    );
                    
                    //Установка в сессии имени и ID
                    $this->setIdClient($idClient,$name);      
                    
                    // Отправка почты
                    // $this->newEmeil();           
                    
                    //Установка куки                
                    $this->newCookie($ip, $email,$verific);
                            
                    echo '{}';
                    return;            
                    // Завершаем приложение
                    Yii::app()->end();
               
            
          } // \isAjaxRequest
    
    } //   \actionIndex 
    
     private function newOrder($idClient, $ip, $file, $type, $type_other, $topic, $item, 
                                $datepicker, $sources, $requirement, $institution, $volume,                               
                                $fileArrey)
	{
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
                         
                Yii::app()->db->createCommand($sql)->execute();  
                $nomId = Yii::app()->db->getLastInsertID();
                
                //Работа с файлами
                if($file !=0){                    
                    if (is_array($fileArrey)){                        
                            $idOrders =$nomId;
                            foreach ($fileArrey as $a) { 
                                $a =  preg_replace ("/[^a-zA-Z0-9\.,_() -]/","", $a);
                                $sql="INSERT INTO {{file}}  (`idOrders`, `pathTo`)  VALUES ( '$idOrders', '$a')";
                                Yii::app()->db->createCommand($sql)->execute();  
                            }
                    } 
                } 
                return $nomId;
	}
    
    
     private function newUser($name, $phone, $email, $pass, $vk)
	{
	       //Вставка клиента
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
                return $idClient;
	}
    
     private function newCookie($ip, $email,$verific)
	{
	   //Ставим куку                
                $value =$ip.$email;                 
                $value  =$verific->newValue ( $value, 'pass' );
                
                $cookieEmail = new CHttpCookie('ch_em', $email); //Почта 
                $cookieEmail->expire = time()+60*60*24*180; 
                Yii::app()->request->cookies['ch_em'] = $cookieEmail;                 
                                            
                $cookie = new CHttpCookie('ch_login', $value); //Хэш проверки  
                $cookie->expire = time()+60*60*24*180; 
                Yii::app()->request->cookies['ch_login'] = $cookie;    
                
                 /* Чтение куки                
                $cookie_re_em = Yii::app()->request->cookies->contains('ch_em') ? Yii::app()->request->cookies['ch_em']->value : '';    
	echo 'kkk='.$cookie_re_em;                */ 
	}   
    
   
    
     private function newEmeil()
	{
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
	}
      
    
    private function setIdClient($lastId, $nameInput)
	{
	   Yii::app()->user->name = "client";        
       
       $arr = array(               
                'id' =>   $lastId,
                'Name' => $nameInput,                
                );                
        Yii::app()->user->id= $arr;      
	}    
}