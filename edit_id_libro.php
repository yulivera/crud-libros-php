<?php 

	include "model.php";

	$edit_id = $_POST['edit_id'];

	$model = new Model();

	$data = $model->edit_id_lib($edit_id);

	$jsonstring = json_encode($data);
	echo $jsonstring;

 ?>