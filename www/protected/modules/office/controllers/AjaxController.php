<?php
//if (Yii::app()->user->name != 'MaXiM') return false;
           
class AjaxController extends CController {
    // actionIndex вызывается всегда, когда action не указан явно.
    function actionIndex(){
       if (Yii::app()->user->name != 'MaXiM'){ die('ddd');} else {echo 'jjj';}
    }    
    
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
            name_phone=>+7(654) 654-64-56/
            name_mail=>vvv-v@mail.ru/
            name_vk=>Ссылка на Вашу страницу /
            name_institution=>Курс/
            name_volume=>Антиплагиат/
            name_pass=>534535
            */               
        
        //Заказы
        public function actionOrders()	
        {             
            $sql='CREATE TABLE IF NOT EXISTS  {{orders}}  (
            id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,    
            idClient INT UNSIGNED NOT NULL default 0,  
            ip INT UNSIGNED NOT NULL,
            Date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
            visible TINYINT NOT NULL default 1, 
            chFile TINYINT NOT NULL default 0,
            
            type VARCHAR(255) NOT NULL default "",
            type_other VARCHAR(255) NOT NULL default "",
            topic VARCHAR(255) NOT NULL default "",
            item VARCHAR(255) NOT NULL default "",
            datepicker VARCHAR(255) NOT NULL default "",
            sources  VARCHAR(255) NOT NULL default "",
            requirement VARCHAR(255) NOT NULL default "",           
            
            institution VARCHAR(255) NOT NULL default "",
            volume VARCHAR(255) NOT NULL default "",   
            
            status VARCHAR(255) NOT NULL default "Новая заявка", 
            mess bool default 0,         
                                         
            INDEX (idClient)          
            )  
            ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci';
            
       $s= Yii::app()->db->createCommand($sql)->execute();         
        echo 'Orders';  
	}
            //Клиент
        public function actionClient()	
        {             
           $sql='CREATE TABLE IF NOT EXISTS  {{client}}  (
            id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
           
            name VARCHAR(255) NOT NULL default "",
            phone VARCHAR(255) NOT NULL default "",
            mail  VARCHAR(255) NOT NULL default "",
            pass VARCHAR(255) NOT NULL default "",            
            vk VARCHAR(255) NOT NULL default "", 
           
            other VARCHAR(255) NOT NULL default "",
            
            INDEX (mail)     
            )  
            ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci';
                      
       $s= Yii::app()->db->createCommand($sql)->execute();
        echo 'client';  
	}
    
    
         //файлы
        public function actionFile()	
        {             
            $sql='CREATE TABLE IF NOT EXISTS  {{file}}  (
            id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            idOrders INT UNSIGNED NOT NULL default 0,
            pathTo VARCHAR(255) NOT NULL default "",  
                             
            INDEX (idOrders)         
            )  
            ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci';
            
       $s= Yii::app()->db->createCommand($sql)->execute();
        echo 'FileRRR';  
	}
    
        
          //Собственникижилья
        public function actionMembers()	
        {             
            //CURRENT_TIMESTAMP, - автоматически вставить текущую дату
            // Create table ЗАКАЗЫ 
            $sql='CREATE TABLE IF NOT EXISTS  {{members}}  (
            
            
            ';
            //$sql='SELECT * FROM {{user}}';
       $s= Yii::app()->db->createCommand($sql)->execute(); 
        
        //$this->render('homeowners');  
        //$this->renderPartial ('homeowners');    
        echo 'members';  
	}
    
  
      //Собственникижилья
        public function actionAuthor()	
        {             
            //CURRENT_TIMESTAMP, - автоматически вставить текущую дату
            // Create table ЗАКАЗЫ 
            $sql='CREATE TABLE IF NOT EXISTS  {{author}}  (
            
            
            ';           
       $s= Yii::app()->db->createCommand($sql)->execute();
        echo 'author';  
	}
        
  
     
        
     
        
        
        
        ////////////////////////////////////////////////////////////
        //Собственникижилья
        public function actionOrders2()	
        {             
            //CURRENT_TIMESTAMP, - автоматически вставить текущую дату
            // Create table ЗАКАЗЫ 
            $sql='CREATE TABLE IF NOT EXISTS  {{orders}}  (
            id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,            
            firstName VARCHAR(255) NOT NULL,
            lastName VARCHAR(255) NOT NULL,
            patronymicName VARCHAR(255) default "",
            room TINYINT default 0,
            phone VARCHAR(255) default "",
            password VARCHAR(255) NOT NULL,
            validation TINYINT UNSIGNED default 0,   
            rights VARCHAR(255) default "reg",          
            email VARCHAR(255) default "",
          
  
    hireDate TIMESTAMP NOT NULL default "0000-00-00 00:00:00",
    registerDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
            
            ip INT UNSIGNED NOT NULL,   
                  
            INDEX (phone),
            INDEX (id)          
            )  
            ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci
            
            
            ';
            //$sql='SELECT * FROM {{user}}';
       $s= Yii::app()->db->createCommand($sql)->execute(); 
        
        //$this->render('homeowners');  
        //$this->renderPartial ('homeowners');    
        echo 'homeowners';  
	}
    
    //Отвеченные вопросы
        public function actionUnanswered()	
        {             
            //CURRENT_TIMESTAMP, - автоматически вставить текущую дату  //idAnswers MEDIUMINT UNSIGNED  NOT NULL default 0,   
            // Create table ЗАКАЗЫ 
            $sql='CREATE TABLE IF NOT EXISTS  unanswered  (
            idAnswers MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,  
            idHomeowners MEDIUMINT UNSIGNED  NOT NULL default 0, 
            idQuestion MEDIUMINT UNSIGNED  NOT NULL default 0, 
                         
           
            INDEX (idHomeowners)          
            ) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci ';
        Yii::app()->db->createCommand($sql)->execute(); 
        
        //$this->render('homeowners');  
        //$this->renderPartial ('homeowners');    
        echo Yii::app()->user->name;  
	}
    
    //Ответы
        public function actionAnswers()	
        {             
            //CURRENT_TIMESTAMP, - автоматически вставить текущую дату
            // Create table ЗАКАЗЫ 
            $sql='CREATE TABLE IF NOT EXISTS  answers  (
            id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,  
            idAnswers MEDIUMINT UNSIGNED default 0,
            nameAnswer  VARCHAR(255) default "", 
            Answer VARCHAR(255) default "",                 
           
            INDEX (idAnswers)          
            ) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci ';
        Yii::app()->db->createCommand($sql)->execute(); 
        
        //$this->render('homeowners');  
        //$this->renderPartial ('homeowners');    
        echo Yii::app()->user->name;  
	}
    
    //Актуальные темы 
        public function actionTopics()	
        {             
            //CURRENT_TIMESTAMP, - автоматически вставить текущую дату
            // Create table ЗАКАЗЫ 
            $sql='CREATE TABLE IF NOT EXISTS  topics  (
            idTopic MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,  
            idHomeowners MEDIUMINT UNSIGNED  NOT NULL default 0, 
            mess VARCHAR(255) default "", 
            sendTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
            visibl MEDIUMINT UNSIGNED NOT NULL default 0,  
            
            INDEX (idTopic)          
            ) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci ';
        Yii::app()->db->createCommand($sql)->execute(); 
        
        //$this->render('homeowners');  
        //$this->renderPartial ('homeowners');    
        echo Yii::app()->user->name;  
	}
    

    
    
    
    
}