<?php

class ZakazController extends Page
{
	public function actionIndex()
	{   $this->myVar['css'] = '<link rel="stylesheet" href="'.Yii::app()->request->baseUrl.'/css/order.css">';
        $this->myVar['jsFooter'] = '<script src="'.Yii::app()->request->baseUrl.'/js/main_order.js"></script>';
        $this->myVar['title'] ='Заявка';
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}