<?php 
	
	include "model.php";

	$model = new Model();

	$rows = $model->totalpaginador();

	echo $rows;
	
 ?>
