(function($) {

	'use strict';

  console.log("en main.js");
  /**
  * Mostar y/0 ocultar menu lateral 
  */
  var offcanvas_toggle = $('.js-offcanvas-toggle');
  offcanvas_toggle.on('click', function() {

    if ( $('body').hasClass('offcanvas-open') ) {
      $('body').removeClass('offcanvas-open');
    } else {
      $('body').addClass('offcanvas-open');
    }

  });


  $(document).click(function(e) {
    var container = $('.js-offcanvas-toggle, #offcanvas_menu');
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      if ( $('body').hasClass('offcanvas-open') ) {
        $('body').removeClass('offcanvas-open');
      }
    }
  });


  /**
 * Permite que se muestre el contenido del input file oculto en otro input.
 * 
 * @param numeroInput Numero del input file que se quiere ver con un estilo modificado 
 * y del input en el que se mostrara.
 */
function mostrarInputFileModificado(numeroInput) {
    $("#archivo_oculto"+numeroInput).change(function(){
        $("#archivo"+numeroInput).val($("#archivo_oculto"+numeroInput).val());
    });
}

mostrarInputFileModificado(1);
mostrarInputFileModificado(2);

  /**
  * Mostrar imagen previa antes de guardar, mostrar en un elemento img
  * @param: imput oculto
  */
  function readImage(input){
    if(input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#imgpreve').attr('src', e.target.result); //renderizamos la imagen
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  // codigo a ejecutar cuando se detecta un cambio de archivo
  $("#archivo_oculto1").change(function(){
    readImage(this);
  });

})(jQuery);