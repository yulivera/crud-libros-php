<?php 

	Class Model{

		private $server = "localhost";
		private $username = "root";
		private $password = "";
		private $db = "crud_libro_simple";
		private $conn;

		public function __construct(){
			try{
				$this->conn = new PDO("mysql:host=$this->server;dbname=$this->db", $this->username,$this->password);
			}catch (PDOException $e){
				echo "conexion fallida".$e->getMessage();
			}
		}

		/*
		*	Seleccionar todo de tabla categoria, usado para mostrar en form,select
		*	@return: data de todos los registros
		*/
		public function categorias(){
			$data = null;
			$stmt = $this->conn->prepare("SELECT * FROM categoria");

			$stmt->execute();

			$data = $stmt->fetchAll();

			return $data;
		}

		/*
		*	Contar total de filas en tabla libro, usado para crear paginador
		*	@return: numero total de filas
		*/
		public function totalpaginador(){
		    //total de filas en tabla libro
		    $myquerytotal = "SELECT COUNT(*) total FROM libro";

		    $resultadototal = $this->conn->query($myquerytotal);

		    $total = $resultadototal->fetchColumn();

			return $total;

		}
		
		/*
		*	Insertar datos en tabla libro, validar campos vacios de formulario
		*	validar formato de imagen a subir, tamaño permitido en MB
		*/
		public function insert(){
			// if(isset($_POST['submit'])){
				// echo "submit";
				if(isset($_POST['nombreLibro']) && isset($_POST['descripcion'])){

					if(!empty($_POST['nombreLibro']) && !empty($_POST['nombreAutor']) && !empty($_POST['fecha']) && !empty($_POST['categoria']) && !empty($_POST['nombreEditorial']) && !empty($_POST['descripcion'])){
						
						$titulo = $_POST['nombreLibro'];
						$autor = $_POST['nombreAutor'];
						$fecha = $_POST['fecha'];
						$categoria = $_POST['categoria'];
						$editorial = $_POST['nombreEditorial'];
						$descripcion = $_POST['descripcion'];

						$portada = $_FILES['archivo_oculto1'];

						// formato de imagen permitidos
						$permitidos = array("image/jpg","image/jpeg","image/png");
						// tamaño de imagen
						$limite_kb = 300;
					 	
					 	if (in_array($portada["type"], $permitidos) && $portada["size"] <= $limite_kb*1024) {
							// echo "podemos insertar";
							// crear ruta donde guardar mi imagen 
							$ruta = "img/".md5($portada["tmp_name"]).".jpg";

							$query = "INSERT INTO libro (titulo,autor,descripcion,idcategoria,editorial,fecha,portada) VALUES ('$titulo','$autor','$descripcion','$categoria','$editorial','$fecha','$ruta')";

							if ($sql = $this->conn->exec($query)){
								// mover archivo a la ruta de mi carpeta /img
								move_uploaded_file($portada["tmp_name"], $ruta);
								echo "Datos Guardados";
							}else{
								echo "fallo al guardar";
							}

					 	}else{
					 		echo "Debe seleccionar una imagen valida";
					 	}

					}else{
						echo "Datos no correctos";
					}
				}
			// }
		}
		
		/*
		*	Mostrar todos los registros de tabla libro con su limite
		*	@return: todos los datos encontrados	
		*/
		public function listaLibro(){
			
			// ----- consulta desde hasta paginacion resultados 
		    $limite = $_POST['limit'];
		    $hasta =  $_POST["offset"];
		    // print_r($limite);
		    // print_r($hasta);
		   // Seleccionar todo de libro y categoria mientrar libro.categodia sea igual a categoria.id
			$myquery = "SELECT * FROM libro,categoria WHERE libro.idcategoria=categoria.idcat ORDER BY id DESC LIMIT ".$limite." OFFSET ".$hasta;
	        
	        $resultado = $this->conn->prepare($myquery);
	        $resultado->execute();
			$data = $resultado->fetchAll();

			return $data;
		}

		/*
		*	Eliminar Registro en tabla libro, y ruta de imagen carpeta /img
		*	@param: del_id, id del libro a borrar, tomado de value de button borrar
		*/
		public function del($del_id){

			// consulta: buscar ruta de la imagen, concidente con valor $del_id recivido
     	 	$queryruta = "SELECT portada FROM libro WHERE id = $del_id ";

			$resultruta = $this->conn->prepare($queryruta);
	        $resultruta->execute();
			$imgactual = $resultruta->fetch();

			$query = "DELETE FROM libro WHERE id = '$del_id' ";

			if ($sql = $this->conn->exec($query)) {
				// eliminar de carpeta img/
				unlink($imgactual['portada']);
			 	echo "Registro Borrado";
			 }else{
			 	echo "Fallo al Borrar";
			 } 
		}

		/*
		*	Buscar datos a editar
		*  @param: id de libro a editar
		*/
		public function edit_id_lib($edit_id){
			$data = null;

			$stmt = $this->conn->prepare("SELECT * FROM libro WHERE id='$edit_id' ");

			$stmt->execute();

			$data = $stmt->fetch();

			return $data;

		}

		/*
		*	Actualizar registro libro
		* 	buscar url de imagen editada, para cambiar o permanecer
		*/

		public function editar(){

			if(isset($_POST['nombreLibro']) && isset($_POST['descripcion'])){

				if(!empty($_POST['nombreLibro']) && !empty($_POST['nombreAutor']) && !empty($_POST['fecha']) && !empty($_POST['categoria']) && !empty($_POST['nombreEditorial']) && !empty($_POST['descripcion'])){

			
			$id =  $_POST['idlibro'];
			$titulo = $_POST['nombreLibro'];
			$autor = $_POST['nombreAutor'];
			$fecha = $_POST['fecha'];
			$categoria = $_POST['categoria'];
			$editorial = $_POST['nombreEditorial'];
			$descripcion = $_POST['descripcion'];

			$portada = $_FILES['archivo_oculto1'];

			// formato de imagen permitidos
			$permitidos = array("image/jpg","image/jpeg","image/png");
			// tamaño de imagen
			$limite_kb = 300;
		 	


			// CONSULTA: buscar ruta de la imagen, de $id recivido 
			$queryruta = "SELECT portada FROM libro WHERE id = $id ";

			$resultruta = $this->conn->prepare($queryruta);
	        $resultruta->execute();
			$imgactual = $resultruta->fetch();

			// si el campo inputfile imagen no esta vacio
			if($portada["name"] != null){
				if (in_array($portada["type"], $permitidos) && $portada["size"] <= $limite_kb*1024) {
						// eliminar de carpeta img/ la imagen actual
					 	unlink($imgactual['portada']);
					 	// crear una nueva ruta
						$ruta = "img/".md5($portada["tmp_name"]).".jpg";
						move_uploaded_file($portada["tmp_name"], $ruta);
					}else{
						echo "Imagen No valida";
					}
			}else{
				// si no selecciono ningun archivo, mantener la imagen actual
			  $ruta = $imgactual['portada'];	
			}
			// consulta: actualizar campos de columna, concidente con $id recivido
			$query = "UPDATE libro SET titulo = '$titulo' , autor = '$autor', fecha = '$fecha', idcategoria = '$categoria', editorial = '$editorial', descripcion = '$descripcion', portada = '$ruta' WHERE id = '$id' ";

			if ($sql = $this->conn->exec($query)) {
			 	echo "Datos Actualizados";
			 }else{
			 	echo "Fallo al Editar";
			 }


			}else{
				echo "Datos Incorrectos";
			}

			}
		}	


	} //class Model

 ?>