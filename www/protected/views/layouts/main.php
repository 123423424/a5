<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
  <![endif]-->
  <!--[if IE 7]>
  <html class="no-js lt-ie9 lt-ie8">
    <![endif]-->
    <!--[if IE 8]>
    <html class="no-js lt-ie9">
      <![endif]-->
      <!--[if gt IE 8]>
      <!-->

      <html class="no-js">
        <!--<![endif]-->
<head>
        <link rel="shortcut icon" href="<?=Yii::app()->request->baseUrl?>/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?=Yii::app()->request->baseUrl?>/favicon.ico" type="image/x-icon">
       

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title> <?=$this->myVar['title']?> | Автомат5+</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/css/bootstrap.css">
        <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/css/bootstrap-theme.css">
        <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/css/main.css">
        <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/css/1.css">
        <?=$this->myVar['css']?> 
       

        <!-- Дата -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/cupertino/jquery-ui.css">      
        <!-- /Дата -->

		<!--  -->
        <script src="<?=Yii::app()->request->baseUrl?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="http://yandex.st/jquery/2.1.1/jquery.min.js"></script> 
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
   
   <script src="//api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
   

<!-- Подключение скриптов и стилей в head -->
</head>
<!-- Ниже BODY -->
<body  class="bs-docs-home">

        <!-- Modal  Login-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content panel panel-primary">
              <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title panel-title" id="myModalLabel">Вход / Регистрация</h3>
              </div>
              <div class="modal-body">
                <form role="form">
                  <div class="form-group has-success has-feedback">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Введите email">
                    <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                  </div>
                  <div class="form-group has-error has-feedback">
                    <label for="exampleInputPassword1">Пароль</label>

                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                    <p class="bg-danger padding10">Введен не верный пароль</p>
                  </div>
                  <div class="form-group">

                    <a href="">Забыли пароль? Восстановить.</a>
                  </div>

                  <div class="modal-footer">
                    <div class="btn-group btn-group-justified">
                      <div class="btn-group">
                        <button type="button" class="btn btn-default">Зарегистрироваться</button>
                      </div>
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Войти</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal  geo-->
        <div class="modal fade" id="geo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content panel panel-primary">
              <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title panel-title" id="myModalLabel">Выберите город</h3>
              </div>
              <div class="modal-body lead">
                <a href="" class="choice" data-geo="Moskva">Москва</a>
                <br />
                <a href="" class="choice" data-geo="Piter">Санкт-петербург</a>
                <br />
                <a href="" class="choice" data-geo="Novosib">Новосибирск</a>
                <br />
              </div>

              <div class="modal-footer">
                <div class="text-left">
                  Если вашего города нет в списке, вы можете  связаться с нами
                  <a href="/контакты.html" target="_blank">удобным для вас способом</a>
                  .
                </div>
              </div>
            </div>
          </div>
        </div>

        <a class="sr-only" href="#content">Перейти к основному содержанию</a>

        <!-- header -->        
<header id="top" class="navbar navbar-<?=$this->myVar['navbar']?>-top bs-docs-nav" role="banner">
       
          <div class="container">

            <!-- Кнопка сворачивания -->
            <div class="navbar-header">
              <button class="navbar-toggle" data-target=".bs-navbar-collapse" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="menu" >Меню</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

              </button>

              <a class="navbar-brand hidden-xs" href="/">5+ автомат</a>
              <a class="navbar-brand visible-xs" href="/">А+5</a>

              <!-- Телефон navbar-brand-xs -->

              <a class="navbar-brand navbar-brand60 pointer city visible-xs  navbar-brand-xs p-centr"  data-toggle="modal" data-target="#geo">
                <span class="geoI">                  
                </span>
              </a>  

            </div>

            <div class="row">
              <nav class="collapse navbar-collapse bs-navbar-collapse" id='q1'  role="navigation">
                <!-- меню -->
                <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                  <ul class="nav navbar-nav">
                    <li>
                      <a href="/oplata">ОПЛАТА</a>
                    </li>
                    <li>
                      <a class="hidden-sm" href="/garantii">ГАРАНТИИ</a>
                    </li>
                    <li>
                      <a href="/yslovia">УСЛОВИЯ</a>
                    </li>

                    <li>
                      <a href="/yslygi">УСЛУГИ</a>
                    </li>
                    <li>
                      <a href="/contacts">КОНТАКТЫ</a>
                    </li>

                  </ul>
                </div>
                <!-- Телефон   -->
                <a class="navbar-brand navbar-brand60 pointer city hidden-xs"  data-toggle="modal" data-target="#geo">
                  <span class="geoI">                  
                    
                  </span>
                </a> 
                <div  class="col-lg-offset-1 col-md-2  col-md-offset-1 col-sm-1 col-xs-12 ">
                  <!-- логин  -->
                  <ul class="nav navbar-nav">
                    <li>
                      <a class="pointer" id="login"  data-toggle="modal" data-target="#myModal" >
                        Вход или  
                        <br />
                       Регистрация
                      </a>
                    </li>
                  </ul>
                </div>
              </nav>
              <!-- /row --> </div>

          </div>
        </header>



<?php echo $content; ?>

<footer class="bs-docs-footer" role="contentinfo">
        <div class="container">

          <p>
            <a href="http://bootstrap-3.ru/">Предложения</a>
            по улучшению.
          </p>
          <ul class="bs-docs-footer-links muted">
            <li>Теукущая версия v4.1.1</li>
            <li>·</li>

            <li>
              <a target="_blank" href="/bootstraptheme.php">Инофрмация студентам</a>
            </li>
            <li>·</li>
            <li>
              <a href="/about.php">О проекте</a>
            </li>
            <li>·</li>
            <li>
              <a target="_blank" href="http://blog.getbootstrap.com/">Официальная группа</a>
            </li>
            <li>·</li>
            <li>
              <a target="_blank" href="https://github.com/twbs/bootstrap/issues?state=open">Вопросы</a>
            </li>
            <li>·</li>
            <li>
              <a target="_blank" href="https://github.com/twbs/bootstrap/releases">Партнерам</a>
            </li>
            <li>·</li>
            <li>
              <a target="_blank" href="https://github.com/twbs/bootstrap/releases">Авторам</a>
              (отправить резюме)
            </li>
          </ul>
          <div class="text-center">
            Спроектирован с любовью <?php /*
            echo '*';
	if (isset(Yii::app()->user->id['Name'])) {echo Yii::app()->user->id['Name'].':'.Yii::app()->user->id['id']; }
    echo '/';
    if (isset(Yii::app()->user->name)) {echo Yii::app()->user->name; }
     echo '*';*/
?>
            <a target="_blank" href="http://сайтсайтов.рф/">СайтСайтов</a>
            .
          </div>
        </div>
      </footer>
       <script src="<?=Yii::app()->request->baseUrl?>/js/main.js"></script>       
      <script src="<?=Yii::app()->request->baseUrl?>/js/vendor/bootstrap.js"></script>
      <script src="<?=Yii::app()->request->baseUrl?>/js/plugins.js"></script>
      
      <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
      
      
<?=$this->myVar['jsFooter']?>
   

</body>
    </html>





<?php 



/* 



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

*/