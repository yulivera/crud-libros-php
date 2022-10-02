function inicializar(item,num,mebusca){
  itemsPorPagina = item; 
  numerosPorPagina = num;
  mibuscado = mebusca;
  // console.log("inicializar lobuscado: "+mibuscado);
  // console.log("itemsPorPagina pagination.js: "+itemsPorPagina);
  // console.log("numerosPorPagina pagination.js: "+numerosPorPagina);
}

  function creaPaginador(totalItems)
  {
 
    paginador.html("");

    totalPaginas = Math.ceil(totalItems/itemsPorPagina);

    // $('<li><a href="#" class="first_link">&lt;</a></li>').appendTo(paginador);
    // $('<li><a href="#" class="prev_link">&lt;&lt;</a></li>').appendTo(paginador);
    
    // $('<li><a href="#" class="prev_link"><i class="fa fa-chevron-left"></i></a></li>').appendTo(paginador);
    $('<li><a href="#" class="prev_link"><span aria-hidden="true"><span class="fa fa-chevron-left"></span></span></a></li>').appendTo(paginador);

    var pag = 0;
    while(totalPaginas > pag)
    {
      // <li><a href="#" class="page_link"><span>2</span></a></li>
      $('<li><a href="#" class="page_link"><span>'+(pag+1)+'</span></a></li>').appendTo(paginador);
      pag++;
    }

    if(numerosPorPagina > 1)
    {
      $(".page_link").hide();
      $(".page_link").slice(0,numerosPorPagina).show();
    }
    
    // $('<li><a href="#" class="next_link"><span aria-hidden="true"><span class="fa fa-chevron-right"></span></span></a></li>').appendTo(paginador);
    $('<li><a href="#" class="next_link"><span aria-hidden="true"><span class="fa fa-chevron-right"></span></span></a></li>').appendTo(paginador);
    
    // $('<li><a href="#" class="next_link">&gt;&gt;</a></li>').appendTo(paginador);
    // $('<li><a href="#" class="last_link">&gt;</a></li>').appendTo(paginador);

    paginador.find(".page_link:first").addClass("active");
    paginador.find(".page_link:first").parents("li").addClass("active");

    paginador.find(".prev_link").hide();

    paginador.find("li .page_link span").click(function()
    {
      var irpagina =$(this).html().valueOf()-1;
      cargaPagina(irpagina);
      return false;
    });

    paginador.find("li .first_link").click(function()
    {
      var irpagina =0;
      cargaPagina(irpagina);
      return false;
    });

    paginador.find("li .prev_link").click(function()
    {
      var irpagina =parseInt(paginador.data("pag")) -1;
      cargaPagina(irpagina);
      return false;
    });

    paginador.find("li .next_link").click(function()
    {
      var irpagina =parseInt(paginador.data("pag")) +1;
      cargaPagina(irpagina);
      return false;
    });

    paginador.find("li .last_link").click(function()
    {
      var irpagina =totalPaginas -1;
      cargaPagina(irpagina);
      return false;
    });

    
  }
  // llamada callback
  function get_data(){
    console.log("nada")
  }

  function set_callback(a){
    !function(b){
      b.get_data=function(){
        a()}
      }
    (window||{})
  }

  function cargaPagina(a)
  {
    pagina=a;
    desde=pagina*itemsPorPagina;
    // llamada callback cargar contenido
    get_data();
    
    if(pagina >= 1)
    {
      paginador.find(".prev_link").show();

    }
    else
    {
      paginador.find(".prev_link").hide();
    }
  
    if(pagina < (totalPaginas - numerosPorPagina))
    {
      // console.log("mostrar");
      paginador.find(".next_link").show();
    }else
    {
      // console.log("no mostrar");
      paginador.find(".next_link").hide();
    }

    paginador.data("pag",pagina);

    if(numerosPorPagina>1)
    {
      $(".page_link").hide();
      if(pagina < (totalPaginas- numerosPorPagina))
      {
        $(".page_link").slice(pagina,numerosPorPagina + pagina).show();
      }
      else{
        if(totalPaginas > numerosPorPagina)
          $(".page_link").slice(totalPaginas- numerosPorPagina).show();
        else
          $(".page_link").slice(0).show();
      }
    }
// ul class pagination children li remover active
    paginador.children().removeClass("active");
    paginador.children().eq(pagina+1).addClass("active");


  }

var paginador,totalPaginas,desde=0,pagina=0;
