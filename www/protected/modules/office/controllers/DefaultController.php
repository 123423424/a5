<?php

class DefaultController extends Office
{
	public function actionIndex()
	{
		$this->render('office');
	}
}