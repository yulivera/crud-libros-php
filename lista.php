<?php 
	
	include "model.php";

	$model = new Model();

	$rows = $model->listaLibro();
	// $rowss = $model->hola();
	// var_dump($rowss);

 ?>

 	<?php

 			if(!empty($rows)){
 				foreach ($rows as $row) { ?>
 					
 					<div class="contenedor">
			          <div class="fila">
			            <div class="subfila">
			              <div class="fila1">
			                <img src="<?php echo $row['portada']; ?>" alt="milibro">
			                <span style="display: none;"><?php echo $row['id']; ?></span>
			              </div>
			              <div class="fila1">
			                <h2><?php echo $row['titulo']; ?></h2>
			                <address><?php echo $row['autor']; ?></address>
			                <span><?php echo $row['fecha']; ?> - <?php echo $row['editorial']; ?></span>
			              </div>
			            </div>
			          </div>
			          <div class="fila">
			            <p class="descrip"><?php echo $row['descripcion']; ?></p>
			          </div>
			          <div class="fila">
			            <p><?php echo $row['categoria']; ?></p>
			            <span style="display: none;"><?php echo $row['idcategoria']; ?></span>
			          </div>
			          <div class="fila">
			            <div class="acciones-btn">
			              
			              <button class="btn-accion" id="edit" value="<?php echo $row['id']; ?>">
			                <div class="relieve">
			                   <i class="fa fa-feather-alt" aria-hidden="true"></i>  
			                </div>
			                  <span>Editar</span>
			              </button>

			              <button class="btn-accion" id="del" value="<?php echo $row['id']; ?>">
			                <div class="relieve">
			                    <i class="fa fa-trash-alt" aria-hidden="true"></i>  
			                </div>
			                <span>Borrar</span>
			              </button>
			            </div>       
			          </div>
			        </div>	
			 		

 					<?php
 				}
 			}else{
 				
 				echo "<span>Sin Registros...</span>";

 			}
 	?> 
 		