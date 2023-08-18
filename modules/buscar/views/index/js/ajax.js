//función
$(document).ready(function(){

//    $(document).on("click",".pagina", function(){
//        paginacion($(this).attr('pagina'));
//    });

    $(document).on("click",".pagina", function(){
        paginacion($(this).attr('pagina'));
    });
    
    var paginacion = function(pagina){
        var pagina = 'pagina=' + pagina;
        var t = '&t=' + $("#t").val();
        var p = '&p=' + $("#p").val();
        var e = '&e=' + $("#e").val();
        
        var registros = '&registros=' + $("#registros").val();
        
        $.post(_root_ + 'buscar/index/pa', pagina + t + p + e + registros, function(data){
            $('#lista_registros').html('');
            $('#lista_registros').html(data);
        });
    };

    $("#t").change(function(){
        paginacion();
    });
    
    $("#btnEnviarA").click(function(){
        paginacion();
    });
    
    $("#e").change(function(){
            paginacion();
    });
    
    $("#registros").change(function(){
        paginacion();
    });

});

