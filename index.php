<!DOCTYPE html>
<html lang="es">
  <head>
    <title>libros</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- FONTAWESOME-ICONS -->
    <script src="https://kit.fontawesome.com/746cd4296d.js" crossorigin="anonymous"></script>
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <!-- My Style -->
    <link rel="stylesheet" href="public/style-menu.css">
    <link rel="stylesheet" type="text/css" href="public/style.css">

  </head>
  <body>
      
    <div class="site-wrap">

      <a href="#" class="offcanvas-toggle js-offcanvas-toggle">Menu</a>
        
      <div class="offcanvas_menu" id="offcanvas_menu">
        <div class="overlay">
          <ul>
            <li class="logo"><i class="fa fa-book-open"></i></li>
            <li><a href="#">Inicio</a></li>
            <li class="active"><a href="#">Libros</a></li>
            <li><a href="#">Listado</a></li>
          </ul>
        </div>
      </div>  
  
  <main>
        <!-- INPUT BUSCAR -->
        <div class="buscar">
          <input type="search" name="buscar" placeholder="Buscar">
        </div>
        <!--x UNPUT BUSCAR x-->
        <div class="titulo">
          <i class="fa fa-book-open"></i>
          <h1>Libros</h1>
        </div>
        <!-- -------- FORMULARIO - VISTA PREVIA IMAGEN ------ -->
        <form  action="" method="post" id="form" enctype="multipart/form-data">
        
        <div class="contenido-book">
          <!-- COL 1 formulario entrada -->
          <div class="col">
            <div class="form-book">
                <div id="result" style="display: none;"></div>
              <!-- ID oculto -->
                <input type="hidden" name="idlibro" id="idlibro">
                <!-- <input type="text" name="idlibro" id="idlibro"> -->

                <input type="text" id="nombreLibro" name="nombreLibro" placeholder="Titulo">
                <input type="text"  id="nombreAutor" name="nombreAutor" placeholder="Autor/es">
                
                <input type="number" id="fecha" name="fecha" placeholder="Año">
                
                <!-- cargar categorias -->
                <select id="categoria" name="categoria">
                </select>
              
                <input type="text" id="nombreEditorial" name="nombreEditorial" placeholder="Editorial">
                <textarea id="descripcion" name="descripcion" placeholder="Descripcion"></textarea>

                <div class="form-btn">
                    <input type="submit" id="submit" value="Guardar" class="btn-rose">
                    <button id="btncancelar" class="btn-rose">Cancelar</button>
               </div>

            </div>
          </div>
          <!-- COL 2 vista previa input-file-img- -->
          <div class="col">
            <div class="form-book-imagen">
              
                <div class="item img-preve">
                    <img src="public/images/img-preve.jpg" id="imgpreve">
                </div>
                <div class="item inputModificado">
                  <input class="inputImagen" id="archivo1"/>
                  <div class="botonInputFileModificado">
                      <input type="file" class="inputImagenOculto" id="archivo_oculto1" name="archivo_oculto1"/>
                      <div class="boton">examinar</div>
                  </div>        
                </div>  
            	
            </div>
          </div>

      </div> <!-- contenido book -->
    	</form>
      <!-- ---X----- FORMULARIO - VISTA PREVIA IMAGEN ---X--- -->
       

      <!-- ----------------- LISTA LIBROS TABLE ------------------------ -->
      <section class="listalibro">      
        <div id="show"></div> <!-- mensaje de consulta -->

        <div class="cabecera">
          <div class="col-lis"><span>Libro</span></div>
          <div class="col-lis"><span>Descripcion</span></div>
          <div class="col-lis"><span>Categoria</span></div>
          <div class="col-lis"><span>Acciones</span></div>
        </div>
        
        <!-- peticion AJAX -->
        <div id="fetch"></div> <!-- contenido -->

      </section>
      <!-- --------x--------- LISTA LIBROS TABLE ---------x----------- -->

      <!---------------- PAGINACION ---------------------->
 	    <div class="block-27">
        <ul class="pagination" id="paginador">
          <!------------- CODIFICAR -------------->
        	<!-- ------X----- CODIFICAR -------x------- -->
        </ul>
      </div>

      <!-------X--------- PAGINACION ----------X------------>

        <footer> 
          <span>&copy; 2020 - IngSoftware</span>
            <a href="https://paypal.me/ingandreina" class="btn-donar" target="_blank">
           Donar
                <i class="fas fa-heart"></i>
            </a>    
        </footer>
    
    </main>
  </div>  <!--  site-wrap -->

<!-- ------------------------------------FIN----------------------------------- -->
    
    <!-- MY JAVASCRIPT -->
    <script src="public/jquery-3.2.1.min.js"></script>
    <!-- FONTAWESOME-ICONS-JS  -->
    <!-- <script src="vendor/fontawesome-free/css/fontawesome.min.css"></script> -->
    <!-- AJAX -->
    <script src="public/main.js"></script>
    <script src="ajax/book.js"></script>
    <script src="ajax/pagination.js"></script>
    
  </body>
</html>