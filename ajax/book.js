$(document).ready(function(){
	console.log('funciona JQuery');
	 // variable para editar, cambia a true cuando hace click en algun elemento nombre
  		let edit = false;
  		console.log("variable edit: "+edit);


	/* mostrar categorias en select*/
	function cargarCategoria(){

		$.ajax({
			url: "categoria.php",
			type: "post",
			success: function(data){
				$("#categoria").html(data);
			}
		});
	}
	cargarCategoria();

	// Boton cancelar
	 $(document).on('click','#btncancelar',function(){
	     edit = false;
 		// limpiar formulario
		$('#form').trigger('reset');
		$('#imgpreve').attr('src', 'public/images/img-preve.jpg');
	     // cambiar texto de boton
	     $('#submit').val('Guardar');
	  });

	
	// /////////////- PAGINACION -////////////////////////////////

	paginador = $(".pagination");

	var itemsPorPag = 3;
	var numerosPorPag = 3;
	var lobuscado = "";

	inicializar(itemsPorPag,numerosPorPag,lobuscado);
	// envia la peticion ajax que se realizara como callback
	set_callback(books);
	cargaPagina(0);

	function paginadorTotal(){

		$.ajax({
			url: "pagtotal.php",
			type: "post",
			success: function(data){
				console.log("TOTAL DE REGISTRO EN BASE DATSO: "+data);
			
      			console.log("crea paginador");
      			creaPaginador(data);

    	
			}
		});
	}
	paginadorTotal();

	// /////////////-X- PAGINACION -X-/////////////////////////////
	
	/*
	*	Mostar todos los registro
	*	variables, desde, itemsPorPagina: declarado en pagination.js
	*/
	function books(){
		$.ajax({
			data:{
          	"limit":itemsPorPagina,
          	"offset":desde
        	},
			url: "lista.php",
			type: "post",
			success: function(data){
				// console.log(data);
				$("#fetch").html(data);
				// Maximo caracteres a mostrar en elemento p descripcion
				// limite_texto(".descrip", 80);
				$(".descrip").each(function(i){
			    var len = $(this).text().trim().length;
			    // console.log("mi texto limite:"+len);
			    if(len>100){
			      $(this).text($(this).text().substr(0,80)+'...');
			    }
			  });

			}
		});
	}
	books();

	/*	llamada de  consulta
	*	GUARDAR y EDITAR depende de variable edit true: guardar false: editar
	*/
	$(document).on("click", "#submit", function(e){
        e.preventDefault();

		console.log('clic en input boton guaradr');
        // alert("click");

        var datos = new FormData($("#form")[0]);
        let url = edit === false ? 'insert.php' : 'editar.php';
    	
        $.ajax({
          url: url,
          type: 'post',
          data: datos,
          contentType: false,
          processData: false,
          success: function(data){

            // console.log("mi data form: "+data);
            // Mensaje notificacion
            $("#result").attr('style', 'display: flex;');
            $("#result").html(data);

        	if(data == "Datos Guardados"){
        		books();
        		paginadorTotal();
        		// limpiar formulario
        		$('#form').trigger('reset');
        		$('#imgpreve').attr('src', 'public/images/img-preve.jpg');
        		edit = false;
        	}
        	if(data == "Datos Actualizados"){
        		books();
        		paginadorTotal();
        		// limpiar formulario
        		$('#form').trigger('reset');
        		$('#imgpreve').attr('src', 'public/images/img-preve.jpg');
        		$('#submit').val('Guardar');
        		edit = false;
        	}
          }
        });
         // pagina no se refresque al hacer enter
      	e.preventDefault();

      });
	
	/*
	*	Borrar registro al hacer click en button borrar
	*/
	$(document).on("click", "#del", function(e){
		e.preventDefault();
		// alert("Eliminar");
		if (window.confirm("¿Eliminar Registro?")) {
			var del_id = $(this).attr("value");
			// alert(del_id);
			$.ajax({
				url: "del.php",
				type: "post",
				data: {
					del_id:del_id
				},
				success: function(data){
					$("#show").html(data);
					books();
        			paginadorTotal();
				}
			});	
		}else{
			return false;
		}
		
	});

	/*	EDITAR ID
	*	seleccionar id de value, enviar a consulta y traer a formulario
	*/
    $(document).on('click', '#edit', function (){
      console.log('editando');
      // limpiar formulario
      $('#form').trigger('reset');

      // tomar id value button
      var edit_id = $(this).attr("value");
      console.log(edit_id);
      // ubicarse scroll en formulario
       var dest = $("#form").offset().top;
       $("html, body").animate({scrollTop: dest});

      $.post('edit_id_libro.php', {edit_id}, function(data){
        // console.log(data);
        const book = JSON.parse(data);
        // mostrar en formulario
        $('#nombreLibro').val(book.titulo);
        $('#nombreAutor').val(book.autor);
        $('#fecha').val(book.fecha);
        $('#categoria').val(book.idcategoria);
        $('#nombreEditorial').val(book.editorial);
        $('#descripcion').val(book.descripcion);
        $('#imgpreve').attr('src', book.portada);

        $('#idlibro').val(book.id);
        // // cambiar texto de boton
        $('#submit').val('Actualizar');

        edit = true;
        console.log("clic boton editar: "+edit);
      });

      });

	  /**
	  * maximo de caracteres a mostrar para campo descripcion <p>
	  */

	  // function limite_texto(elemento, max_chars){
	    
	  //   limite_text = $(elemento).text();
	  //   if(limite_text.length > max_chars){
	  //     limite = limite_text.substr(0, max_chars)+"...";
	  //     $(elemento).text(limite);
	  //   }
	  // }



});
