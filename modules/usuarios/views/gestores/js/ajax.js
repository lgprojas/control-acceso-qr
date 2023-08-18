$(document).ready(function(){
    var getCiu = function(){
        $.post(_root_ + 'usuarios/asigciu/getCiuReg','reg=' + $("#reg").val(), function(datos){
            $("#ciu").html('')//vamos a limpiar el select de ciudad
            $("#ciu").append('<option value="">-Seleccione-</option>')
            for(var i = 0; i < datos.length; i++){
                $("#ciu").append('<option value="' + datos[i].Id_ciu + '">' + datos[i].Nom_ciu + '</option>');
            }
        }, 'json');
    }  
//evento
    $("#reg").change(function(){
        if(!$("#reg").val()){// si el select tiene value cero
            $("#reg").html('');//muestra ciudad vacio
        }else{
            getCiu();//sino muestra ciudades relacionadas
        }
    });  
});