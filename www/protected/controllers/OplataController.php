<?php

class OplataController extends Page
{
	public function actionIndex()
	{   $this->myVar['jsFooter'] = '<script src="'.Yii::app()->request->baseUrl.'/js/novosib.js"></script>';
    $this->myVar['title'] ='Оплата ';
		$this->render('oplata');
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