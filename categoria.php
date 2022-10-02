<?php 

	include 'model.php';

	$model = new Model();

	$categoria = $model->categorias();
	
	// var_dump($categoria);
 ?>

	<option value="" selected>Seleccione</option>
 <?php

		if(!empty($categoria)){
			foreach ($categoria as $row) { ?>
			<option value="<?php echo $row['idcat']; ?>"><?php echo $row['categoria']; ?></option>
			<?php
 				}
 			}else{
 				echo "sin categorias";
 			}
 	?> 
 		
