<main id="content" class="bs-docs-masthead p-top10" role="main">
	<div class="container">

		<div class="row">
			<div class="col-sm-7 col-md-8 title-lead">
				<h1>Мои проекты</h1>
			</div>
			<div class="col-sm-5 col-md-4 title-lead p-top20 h90">
				<p class="lead">
					<a class="btn btn-outline-inverse btn-lg btn-success" href="/заказать-работу.html"> <strong>+</strong>
						Новый проект
					</a>
				</p>
			</div>
		</div>
	</div>

</main>
<?php
	echo Yii::app()->user->name.'='.Yii::app()->user->id['id'].'='.Yii::app()->user->id['Name'];
    
    //Заказы
    $orders = Yii::app()->db->createCommand()
        ->select(array('id', 'Date', 'type', 'type_other', 'topic', 'item', 'datepicker', 'sources', 'status', 'mess'))
        ->from('{{orders}}')->where('idClient="'.Yii::app()->user->id['id'].'"')->order('mess DESC, Date DESC') -> queryAll(); 
    
?>

<div class="bs-docs-featurette">
	<div class="container">
		<table id = 'orders' class="table table-striped text-left">
			<thead>
				<tr>
					<th>Название</th>
					<th>Срок до</th>
					<th>Статус</th>
					<th>Переписка</th>
				</tr>
			</thead>
			<tbody>
            
            <?php
	foreach ($orders as $a => $order ) {
	           
             
             echo '<tr data-nomer = "'.$order['id'].'" >
                    <td>'.$order['id'].' '.$order['item'].'. Тема:'.$order['topic'].' ('; 
             echo  $order['type'] == 'другое' ?  $order['type_other'] : $order['type'];  
             echo ') </td>';
             
             echo '<td>'.$order['datepicker'].'</td><td>'.$order['status'].'</td><td>
						<span class="glyphicon glyphicon-envelope f-size30 ';
             echo  $order['mess'] == 1 ?  'chengeColor' : '';             
      
             echo '"></span>
                        
					</td></tr>';
               
        }
?>

			</tbody>
		</table>
	</div>
</div>