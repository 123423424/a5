<?php

class DefaultController extends Page
{
	public function actionIndex()
	{
	   if (Yii::app()->user->name =='client'){
	       $this->myVar['title'] ='Клиент';
            $this->myVar['jsFooter'] = '<script src="'.Yii::app()->request->baseUrl.'/js/client.js"></script>';
            $this->myVar['css'] .= '
            <link rel="stylesheet" href="'.Yii::app()->request->baseUrl.'/css/client.css">
            <link rel="stylesheet" href="'.Yii::app()->request->baseUrl.'/css/client_ch.css">     
            ';
            $this->render('index');
	   } else {$this->redirect('/');}        
	}
    
   
}