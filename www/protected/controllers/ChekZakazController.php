<?php

class ChekZakazController extends Param
{     
	public function actionIndex()
    { 
        // если запрос асинхронный, то нам нужно отдать только данные
        if(Yii::app()->request->isAjaxRequest){
            $this->param = '->'; 
            
           foreach ($_POST as $a=>$b)  $this->param .= "$a=>$b/"; 
            echo    $this->param;        
            
            /* 
            $this->param = $_POST;
            Yii::import('application.folder.Verification', true);
            $verific = new Verification($this->param ['nameInput'], 'text'); 
            
            $telephoneInput =$verific->newValue( $this->param ['telephoneInput'], 'tel' );
            
            $user = Yii::app()->db->createCommand()
            ->select('id')
            ->from('homeowners u')      
            ->where('phone="'.$telephoneInput.'"')
            ->queryAll();   
            $str ='';         
        
            if ($user) {
                echo 'error';
            } else {
                
                $nameInput =$verific->newValue ( $this->param ['nameInput'], 'text' );
                $surnameInput =$verific->newValue ( $this->param ['surnameInput'], 'text' );
                $patronymicInput =$verific->newValue ( $this->param ['patronymicInput'], 'text' );         
                $roomInput= $verific->newValue ( $this->param ['roomInput'], 'num' );
                
                $mailInput= $verific->newValue ( $this->param ['mailInput'], 'email' );
                $passwordInput= $verific->newValue ( $this->param ['passwordInput'], 'pass' );
                
                $ip = $_SERVER['REMOTE_ADDR'];    
                
                
                $sql="INSERT INTO `homeowners` (`firstName`, `lastName`, `patronymicName`, `room`, `phone`, `password`, `validation`,  `email`, `hireDate`, `registerDate`, `ip`) 
                VALUES ('$nameInput', '$surnameInput', '$patronymicInput', '$roomInput', '$telephoneInput', '$passwordInput', '0',  '$mailInput', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, INET_ATON('$ip'))";
                
                Yii::app()->db->createCommand($sql)->execute();
                $nomId = Yii::app()->db->getLastInsertID();
                
                // $this->ch($this->valid ( $this->param ['telephoneInput'], 'tel' ));
                $this->ch($nomId, $nameInput);  
                
                echo $str; 
                
                //Отправка почты
                $this->widget('application.extensions.email.debug');
                $email = Yii::app()->email;
                $email->to = '380-00-63@mail.ru';
                $email->subject = 'Регистрация кв. '.$roomInput;
                $email->message = $nameInput.'<br />'.$surnameInput.'<br />'.$patronymicInput.'<br />'.$roomInput.'<br />'
                        .$mailInput.'<br />'.$ip;
                $email->send();
                         
                                
                // Завершаем приложение
                Yii::app()->end(); 
            } 
            
            
       */   } // \isAjaxRequest
    
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