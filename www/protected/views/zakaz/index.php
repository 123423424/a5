<!-- Modal  Login-->
        <div class="modal fade" id="repeatMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content panel panel-primary">
              <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title panel-title" id="myModalLabel">Для зарегистрированных пользователей</h3>
              </div>
              <div class="modal-body">
              <div class="lead">
              	Такой E-mail уже зарегистрирован.  Пожалуйста, введите пароль. <br />
              	Если Вы не помните пароль, воспользуйтесь функцией 

              	 <a class="btn btn-primary  btn-sm " role="button">Забыли пароль?</a>  или укажите
              	 <a class="btn btn-primary  btn-sm " aria-hidden="true" data-dismiss="modal" type="button">другой email</a>

              	


              	
              </div>


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



<!-- Слайдер --> 
<div id="content" class="bs-docs-header">
	<div class="container">
		<div class="row">
			<div class="col-sm-7 col-md-8 title-lead">
				<div id="tyt"></div>

				<h1>Сделать заказ</h1>
				<p>Два простых шага</p>
			</div>

			<div class="col-sm-5 col-md-4 title-lead">
				<p class="lead">
					<!-- Кнопки "Заказать" -->
					<!-- <a class="btn btn-outline-inverse btn-lg  btn-w170 btn-mgb10" href="/заказать-работу.html">Сделать заказ</a>
				<a class="btn btn-outline-inverse btn-lg pd btn-w170  btn-mgb10" href="/заказать-работу.html">Узнать стоимость</a>
				-->
			</p>
		</div>
	</div>
</div>
</div>

<!-- Тело страницы -->
<div class="bs-docs-featurette my-not-padding">
<div class="container">
	<div class="row">
		<div  class="col-xs-2 "></div>
		<div  class="col-xs-8 ">

			

			<!-- Инструкция по оплате -->


			<form id ='formZakaz' action="/chekZakaz" method="post" class="form-horizontal" role="form" oninput="log(event)" >
				<!-- <input type="hidden" value="777" name="file[10]"> -->

				<!-- Шаг 1 Информация о заказе-->
				<div class="step1">
					<h2 class="bs-docs-featurette-title">Шаг 1. Информация о заказе</h2>
					<br />
					<div class="form-group">
						<label for="check1" class="col-sm-3 control-label">Тип</label>
						<div class="col-sm-9">							

							<select id="check1" class="form-control" style="" size="1" name="check1" >
								<option selected="" value="">выберите тип работы</option>
								<option value="диплом">диплом</option>
								<option value="главы к диплому">главы к диплому</option>
								<option value="курсовая">курсовая</option>
								<option value="реферат">реферат</option>
								<option value="контрольная работа">контрольная работа</option>
								<option value="самостоятельная работа">самостоятельная работа</option>
								<option value="бизнес-план ">бизнес-план</option>
								<option value="билеты к экзаменам (вопросы)">билеты к экзаменам (вопросы)</option>
								<option value="диссертация">диссертация</option>
								<option value="доклад">доклад</option>
								<option value="задачи">задачи</option>
								<option value="исследование, аналитическая работа">исследование, аналитическая работа</option>
								<option value="лабораторная работа">лабораторная работа</option>
								<option value="отчет по практике (дневник)">отчет по практике (дневник)</option>
								<option value="перевод">перевод</option>
								<option value="презентация">презентация</option>
								<option value="рецензия">рецензия</option>
								<option value="сочинение">сочинение</option>
								<option value="статья ">статья</option>
								<option value="тесты">тесты</option>
								<option value="чертеж">чертеж</option>
								<option value="шпаргалки">шпаргалки</option>
								<option value="эссе">эссе</option>
								<option value="творческая работа">творческая работа</option>
								<option value="РГЗ">РГЗ</option>
								<option value="рерайтинг ">рерайтинг</option>
								<option value="другое">другое</option>
							</select>
						</div>
						<p class="form-mess bg-danger padding10">Вы не указали тип работы</p>

					</div>
					<p id='check1-info' class="help-block">
						Если затрудняетесь с определением типа, выберите пункт "другое" и укажите свой вариант
					</p>

					<div id="vis2">

						<div id = "form-other" class="form-group">
							<label for="other" class="col-sm-3 control-label">Другое</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="other" placeholder="Напишите тип работы" name="other" ></div>
							<br />
						</div>

						<div class="form-group">
							<label for="name_topic" class="col-sm-3 control-label">Тема</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" 
              id="name_topic" name="name_topic"></div>
							<p class="form-mess bg-danger padding10">Укажите тему работы</p>
						</div>

						<div class="form-group">
							<label for="item_name" class="col-sm-3 control-label">Предмет</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" 
              id="item_name" name="item_name" placeholder="Например ЭКОНОМИКА"></div>
							<p id="item_name-mass" class="form-mess bg-danger padding10">Укажите название предмета</p>

						</div>
						<p id='item_name-info' class="help-block">Рекомендация: Название предмета записать без сокращений</p>

						<div id="vis3">
							<!--  /#vis3 -->

							<div class="form-group">
								<label for="datepicker" class="col-sm-3 control-label">Срок</label>
								<div class="col-sm-9">
									<input type="text" class="form-control"  id="datepicker" name="datepicker"></div>
								<p class="form-mess bg-danger padding10">Укажите срок сдачи</p>

							</div>
							<p id ='datepicker-info' class="help-block col-sm-offset-3">
								ВАЖНО: Обратите внимание. Работа будет отправлена в течение указанного дня. Если срок известен более точный, его нужно написать в требованиях к работе (ниже). Укажите когда хотите получить готовую работу.
							</p>

							<div class="form-group">
								<label for="name_sources" class="col-sm-3 control-label">Объем</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" 
              id="name_sources" name="name_sources" placeholder="Пример: 25 страниц- записка и 8 листов А1 чертежей" ></div>
								<p class="form-mess bg-danger padding10">Укажите объем</p>
							</div>

							<div class="form-group">
								<label for="name_requirement" class="col-sm-3 control-label">Требования</label>
								<div class="col-sm-9">
									<textarea id="name_requirement" name="name_requirement" class="form-control"  rows="0" placeholder="Рекомендация: описать наиболее подробно задание и время отправки Вам готовой работы"></textarea>

								</div>
							</div>
							<button id='clonFile' class="btn btn-success btn-sm dropdown-toggle selectbutton" type="button" data-toggle="dropdown">+ Прикрепить фаил</button>

							<!-- Конопка дальше к шагу 2 -->
							<div class="btn-group">
								<button type="button" id="page1" class="btn btn-primary" >Дальше</button>
							</div>

							<div id="file-msg2"></div>
							<div id="file-group"></div>
						</div>
						<!-- /#vis3 -->
					</div>
					<!-- /#vis2 -->

				</div>
				<!-- Шаг 2 -->
				<div class="step2">
					<h2 class="bs-docs-featurette-title">Шаг 2. Контактная информация</h2>
					<div class="lead">Ваши контакты:</div>
					<div class="form-group">
						<label for="name_name" class="col-sm-3 control-label">Имя</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" 
              id="name_name" name="name_name" ></div>
						<p class="form-mess bg-danger padding10">Укажите Ваше имя</p>
					</div>
					<div class="form-group">
						<label for="name_phone" class="col-sm-3 control-label">Телефон</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" 
              id="name_phone" name="name_phone"  placeholder="Пример:+7-913-123-12-12"></div>
						<p class="form-mess bg-danger padding10">Укажите Ваш телефон</p>
						<span id='phoneRe'></span>
					</div>

					<div class="form-group">
						<label for="name_mail" class="col-sm-3 control-label">E-mail</label>
						<div class="col-sm-9">
							<input type="text" name="name_mail"  class="form-control" 
              id="name_mail">
							<p id="name_mail_name-mass" class="form-mess bg-danger padding10"></p>							
						</div>
						<p class="form-mess bg-danger padding10">Укажите Вашу почту</p>
						<span id='mailRe'></span>
					</div>

					<div class="form-group">
						<label for="name_pass" class="col-sm-3 control-label">Пароль</label>
						<div class="col-sm-9">
							<input type="password" name="name_pass"  class="form-control" 
              id="name_pass">
							<p id="name_mail_name-mass" class="form-mess bg-danger padding10"></p>
						</div>
						<p class="form-mess bg-danger padding10">Пароль должен быть из 6 латинских (от A до Z) символов или цифр</p>
					</div>



					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<label for="name_vk" class="control-label">
								Ссылка на Вашу страницу ВКонтакте для связи (не обязательно):
							</label>
							<input type="text" class="form-control" 
              id="name_vk" name="name_vk" placeholder="Пример: http://vk.com/diplom55555  или diplom55555"></div>
					</div>
					<hr />

					<div class="col-sm-offset-3  col-sm-9">
						<div class="lead margin-bottom-not">Уточняющие (не обяательно)</div>
						<div class="form-group">

							<label for="name_institution" class="control-label">Название учебного заведения</label>

							<input type="text" class="form-control" 
              id="name_institution" name="name_institution" placeholder="Например НГУЭУ"></div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="name_volume" class="col-sm-6 control-label">Антиплагиат</label>
									<div class="col-sm-6">
										<input type="text" name="name_volume" class="form-control" 
              id="name_volume" ></div>
								</div>
							</div>
							<div class="col-sm-6">

								<div class="form-group">
									<label for="name_institution" class="col-sm-4 control-label">Курс</label>
									<div class="col-sm-8">
										<input type="text" name="name_institution" class="form-control" 
              id="name_institution"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="btn-group">
						<button type="button" id="page2-repet" class="btn btn-default">Назад</button>
						<button type="button" id="page3" class="btn btn-primary">Отправить</button>

						

					</div>
				</div>
			</form>

			<!-- Работа с файлами -->
			<div id="uploadRe">
			<form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
				<ul><!-- The file uploads will be shown here --> </ul>
				<div id="drop" class="btn-group fileform">
					<button id='origFile' class="btn btn-success btn-sm dropdown-toggle selectbutton" type="button" data-toggle="dropdown">+ Прикрепить фаил</button>
					<input id="upload2" class="form-control" type="file" name="upl"  multiple />
				</div>
				<div id="info-intro"></div>
			</form>
			</div>

			<!-- JavaScript Includes -->
			<script src="<?=Yii::app()->request->baseUrl?>/file/assets/js/jquery.knob.js"></script>
			<!-- jQuery File Upload Dependencies -->
			<script src="<?=Yii::app()->request->baseUrl?>/file/assets/js/jquery.ui.widget.js"></script>
			<script src="<?=Yii::app()->request->baseUrl?>/file/assets/js/jquery.iframe-transport.js"></script>
			<script src="<?=Yii::app()->request->baseUrl?>/file/assets/js/jquery.fileupload.js"></script>
			<!-- Our main JS file -->
			<script src="<?=Yii::app()->request->baseUrl?>/file/assets/js/script.js"></script>
			<!-- /Работа с файлами -->

		</div>
		<div  class="col-xs-2 "></div>
	</div>
</div>
<br />
</div>

<!-- Валидация телефона -->
<script type="text/javascript" src="<?=Yii::app()->request->baseUrl?>/js/jquery.maskedinput-1.3.1.min_.js"></script>
<script type="text/javascript">// <![CDATA[
jQuery(function($) {
      $.mask.definitions['~']='[+-]';      
      $('#name_phone').mask('+7(999) 999-99-99');
    
   });
// ]]&gt;</script>
<!-- /Валидация телефона