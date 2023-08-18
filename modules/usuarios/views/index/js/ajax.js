$(document).ready(function(){
    
    $(document).on("click",".pagina", function(){
        paginacion($(this).attr('pagina'));
    });
    
    var paginacion = function(pagina){
        var pagina = 'pagina=' + pagina;
        var co = '&co=' + $("#co").val();
        var cb = '&cb=' + $("#cb").val();
        var registros = '&registros=' + $("#registros").val();
        
        $.post(_root_ + 'usuarios/index/pau', pagina + co + cb + registros, function(data){
            $('#lista_registros').html('');
            $('#lista_registros').html(data);
        });
    }
    
    $("#co").change(function(){
        $.post(_root_ + 'usuarios/index/gcbu','co=' + $("#co").val(),function(datos){
            $("#cb").html('<option value=""> - seleccione calle/Block - </option>');
            
            for(var i = 0; i < datos.length; i++){
                $("#cb").append('<option value="' + datos[i].a + '">' + datos[i].b + '</option>');
            }
            
        }, 'json');
        
        $("#cb").val('');
        
        paginacion();
    });
    
    $("#co").change(function(){
            paginacion();
    });
    
    $("#cb").change(function(){
            paginacion();
    });
    
    $("#registros").change(function(){
        paginacion();
    });
    
var gpc = function(){
        $.post(_root_ + 'usuarios/registro/gpc','cond=' + $("#cond").val(), function(datos1){
            $("#per").html('')//vamos a limpiar el select de ciudad
            $("#per").append('<option value="">-Seleccione-</option>')
            for(var i = 0; i < datos1.length; i++){
                $("#per").append('<option value="' + datos1[i].a + '">' + datos1[i].b + ' ' + datos1[i].c + ' ' + datos1[i].d + ' ' + datos1[i].e +'</option>');
            }
        }, 'json');
    } 
var grc = function(){
        $.post(_root_ + 'usuarios/registro/grc','cond=' + $("#cond").val(), function(datos2){
            $("#role").html('')//vamos a limpiar el select de ciudad
            $("#role").append('<option value="">-Seleccione-</option>')
            for(var i = 0; i < datos2.length; i++){
                $("#role").append('<option value="' + datos2[i].a + '">' + datos2[i].b + '</option>');
            }
        }, 'json');
    } 
    
        $("#cond").change(function(){
        if(!$("#cond").val()){// si el select tiene value cero
            $("#per").html('');
            $("#role").html('');
        }else{
            gpc();
            grc();
        }
    });  
    
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
});

