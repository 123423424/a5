<?php

class DefaultController extends Page
{
	public function actionIndex()
	{
		$this->render('index');
	}
}