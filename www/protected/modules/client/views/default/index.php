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
    $ordersPage = 10; //Количество заказов на странице
    $boocs = 5; //Всего книг на странице
    
    $page = abs((integer)Yii::app()->getRequest()->getQuery('page'));
    $nowPage = $page - 1;  
	
    
    
    //Заказы
    $orders = Yii::app()->db->createCommand()
        ->select(array('id', 'Date', 'type', 'type_other', 'topic', 'item', 'datepicker', 'sources', 'status', 'mess'))
        ->from('{{orders}}')->where('idClient="'.Yii::app()->user->id['id'].'"')->order(' Date DESC') -> queryAll(); 
        $allOrders =  count($orders);
     $orders = Yii::app()->db->createCommand()
        ->select(array('id', 'Date', 'type', 'type_other', 'topic', 'item', 'datepicker', 'sources', 'status', 'mess'))
        ->from('{{orders}}')->where('idClient="'.Yii::app()->user->id['id'].'"')->order('id  ') -> 
        limit($ordersPage /* количесвто */, $nowPage*$ordersPage /* начиная с */) ->  queryAll(); 
          
        
    //  mess DESC, Date DESC
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
  <?php
	$allBoocs =  ceil($allOrders/$ordersPage); //всего книг (округление в большую сторуну) 
    if ($page == 0) $page = 1;    
    $booc = ceil($page/$boocs) -1; //Окрулгение в меньшую           
           $f =  ($booc+1)*$boocs;          
           if ($f < $allBoocs ) { $iEnd =  $f;} else { $iEnd =  $allBoocs;}
           
    
    if ($allBoocs > 1) {
        $pDown = $booc*$boocs;
        $pUp = ($booc+1)*$boocs+1; 
       echo  '<ul class="pagination">';
      
       
            if ($booc==0){
                        echo '<li class="disabled"><a href="">&laquo;</a></li>';                    
                    } else {
                        echo '<li><a href="?page='.$pDown.'">&laquo;</a></li>'; 
                    }       
               
           for ($i = $booc*$boocs+1; $i <= $iEnd; $i++) {
                if ($page == $i ) {
                    echo '<li class="active"><a href="#">'.$i.'<span class="sr-only">(current)</span>';
                } else {
                    echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
                }
            }
              
              if ($f < $allBoocs ){
                echo '<li><a href="?page='.$pUp.'">&raquo;</a></li>'; 
                                          
                    } else {
                        echo '<li class="disabled"><a href="">&raquo;</a></li>';  
                    }      
       echo  '</ul>';
        
    }
?>      
     

	</div>
</div>


