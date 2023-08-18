$(document).ready(function(){

//Datetimepicker
    $( "#o-fcho" ).datetimepicker({
            inline: true,
           monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
           monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
           dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
           dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
           dateFormat: "dd-mm-yy",
           timeFormat: 'HH:mm:ss',
           closeText: 'Listo',
           currentText: 'Ahora',
           timeText: 'Tiempo',
            hourText: 'Hora',
            minuteText: 'Minuto',
            maxDate: "+0m +0d"

    }); 

//------------------------------------------------------------------------------    
    $(document).on("click","#btn_save_entrada", function () {
        
            if(confirm("¿Desea registrar esta entrada?")) {  
                showPleaseWait();
                    var valores = "";
                    
                    var iv = 'idv=' + $("#e-idv").val();
                    var fm = '&fchm=' + $("#e-fchm").val();
                    var itm = '&idtm=' + $("#e-idtm").val();
                    var not = '&nota='+$("#e-nota").val();
                    
                    valores = iv+fm+itm+not;         
                    
                    $.ajax({
                            type: "POST",
                            url: _root_ + 'codeqr/registrar/snm',
                            data: valores,
                            headers: {'X-CSRF-TOKEN': $('meta[name="tkn"]').attr('content')},
                            success: function(data){ 
                                if(data["valor"] == "0"){
                                  hidePleaseWait();
                                  $('#mssg').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><div><i class="bi bi-exclamation-triangle-fill"></i> ' + data["mssg"] +'</div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');                                    
                                }
                                if(data["valor"] == "1"){
                                  const url = _root_ + 'codeqr/registrar/index/' + data["cod"]; 
                                  $(location).attr('href',url);
                                  hidePleaseWait();
                                }
                            }
                            }); 
            };
    });    

    $(document).on("click","#btn_save_salida", function () {
        
            if(confirm("¿Desea registrar esta salida?")) {  
                showPleaseWait();
                    var valores = "";
                    
                    var iv = 'idv=' + $("#s-idv").val();
                    var fm = '&fchm=' + $("#s-fchm").val();
                    var itm = '&idtm=' + $("#s-idtm").val();
                    var not = '&nota='+$("#s-nota").val();
                    
                    valores = iv+fm+itm+not;         
                    
                    $.ajax({
                            type: "POST",
                            url: _root_ + 'codeqr/registrar/snm',
                            data: valores,
                            headers: {'X-CSRF-TOKEN': $('meta[name="tkn"]').attr('content')},
                            success: function(data){ 
                                if(data["valor"] == "0"){
                                  hidePleaseWait();
                                  $('#mssg').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><div><i class="bi bi-exclamation-triangle-fill"></i> ' + data["mssg"] +'</div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');                                    
                                }
                                if(data["valor"] == "1"){
                                  const url = _root_ + 'codeqr/registrar/index/' + data["cod"]; 
                                  $(location).attr('href',url);
                                  hidePleaseWait();
                                }
                            }
                            }); 
            };
    });
    
    $(document).on("click","#btn_save_obs", function () {
        
            if(confirm("¿Desea registrar esta nueva observación?")) {  
                showPleaseWait();
                    var valores = "";
                    
                    var iv = 'idv=' + $("#o-idv").val();
                    var fo = '&fcho='+$("#o-fcho").val();
                    var itm = '&tobsvehi=' + $("#o-tobsvehi").val();
                    var not = '&nota='+$("#o-nota").val();
                    
                    valores = iv+fo+itm+not;         
                    
                    $.ajax({
                            type: "POST",
                            url: _root_ + 'codeqr/registrar/sno',
                            data: valores,
                            headers: {'X-CSRF-TOKEN': $('meta[name="tkn"]').attr('content')},
                            success: function(data){ 
                                if(data["valor"] == "0"){
                                  hidePleaseWait();
                                  $('#mssg').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><div><i class="bi bi-exclamation-triangle-fill"></i> ' + data["mssg"] +'</div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');                                    
                                }
                                if(data["valor"] == "1"){
                                  const url = _root_ + 'codeqr/registrar/index/' + data["cod"]; 
                                  $(location).attr('href',url);
                                  hidePleaseWait();
                                }
                            }
                            }); 
            };
    });
    
//------------------------------------------------------------------------------
function showPleaseWait() {
     waitingDialog.show('Procesando...');
     //waitingDialog.show('Custom message', {dialogSize: 'sm', progressType: 'warning'});

}
function hidePleaseWait() {
        setTimeout(function () {
      waitingDialog.hide();
    }, 3000);
}
//-------------------------------------------------------------------------  

});