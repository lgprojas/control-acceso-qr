$(document).ready(function(){
    
    $("#pass1").keyup(function(){
        
        var var1 = $("#pass1").val();
        var var2 = $("#pass2").val();

        if(var1.length !== 0){
            if(var1.length >= 8){
                $("#valida1").html('<i style="color:green;font-size:20px;" class="bi bi-check"></i>');
                if(var1 === var2){
                     $("#valida1").html('<i style="color:green;font-size:20px;" class="bi bi-check-circle-fill"></i>');
                     $("#valida2").html('<i style="color:green;font-size:20px;" class="bi bi-check-circle-fill"></i>');
                }else{
                     if(var2.length >= 8){
                        $("#valida2").html('<i style="color:green;font-size:20px;" class="bi bi-check"></i>');                       
                    }else{
                        $("#valida2").html('');
                    }
                }
            }else{
                $("#valida1").html('');
                if(var2.length >= 8){
                    $("#valida2").html('<i style="color:green;font-size:20px;" class="bi bi-check"></i>');
                    if(var1 === var2){
                         $("#valida1").html('<i style="color:green;font-size:20px;" class="bi bi-check-circle-fill"></i>');
                         $("#valida2").html('<i style="color:green;font-size:20px;" class="bi bi-check-circle-fill"></i>');
                    }else{
                         $("#valida2").html('');
                    }
                }else{
                    $("#valida2").html('');
                }
            }
        }else{
            $("#valida1").html('');
        }

    });
    $("#pass2").keyup(function(){
        
        var var1 = $("#pass1").val();
        var var2 = $("#pass2").val();
        
        if(var2.length !== 0){
            if(var2.length >= 8){
                $("#valida2").html('<i style="color:green;font-size:20px;" class="bi bi-check"></i>');
                if(var1 === var2){
                     $("#valida1").html('<i style="color:green;font-size:20px;" class="bi bi-check-circle-fill"></i>');
                     $("#valida2").html('<i style="color:green;font-size:20px;" class="bi bi-check-circle-fill"></i>');
                }
            }else{
                $("#valida2").html('');
            }
        }else{
            $("#valida2").html('');
        }
    });
});

    function valPass(e) {
        //de la 'a' hasta la 'z' min y may del 0-1 acepta -_
        // /^[a-z0-9_-]{6,18}$/
        tecla = (document.all) ? e.keyCode : e.which; // 2   
        if (tecla==8 && tecla.charAt(0) != 0){
             return true; // 3
             patron = /^[a-zA-Z0-9_-]$/; // Solo acepta números
                te = String.fromCharCode(tecla); // 5
                return patron.test(te); // 6
        }else{
                patron = /^[a-zA-Z0-9_-]$/; // Solo acepta números
                te = String.fromCharCode(tecla); // 5
                return patron.test(te); // 6
            }
    }
