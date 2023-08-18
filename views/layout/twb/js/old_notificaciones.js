$(document).ready(function(){
            
    setInterval(
        function(){
           $('#campana').load(_root_ + 'movimientos/index/getCountNotifUsu', function(result) {
//               var data = JSON.parse(result);
               if(result>0){
                   $("#campana").html('<i class="fa fa-bell-o"></i><span class="label label-warning">'+result+'</span>');
                   $("#estadonotif").html('Usted tiene '+result+' notificaciones');
               }else{
                   $("#campana").html('<i class="fa fa-bell-o"></i>');
                   $("#estadonotif").html('No tiene notificaciones');
               }
           });
           
           $.post(_root_ + 'movimientos/index/getLastNotifUsu', function(datos){
                $('ul#lastnoti').html('');
                for(var i = 0; i < datos.length; i++){
                    $("ul#lastnoti").append('<li class="text-li-noti"><a href="' + _root_ +''+ datos[i].Ruta + '"><i class="bi bi-megaphone-fill"></i> [' + datos[i].Rol + '] ' + datos[i].Nom + ' <span style="font-weight: bold;">' + datos[i].Mov + '</span><p>Fecha: <span style="font-weight: bold;">' + datos[i].Date_mov + '</span> Hora: <span style="font-weight: bold;">' + datos[i].Time_mov + ' hrs.</span></p>');
                }
             }, 'json');
     
        },10000
    );
    
//    function getLastNotif(){
//    $.post(_root_ + 'movimientos/index/getLastNotifUsu', function(datos){
//                $('ul#lastnoti').html('');
//                for(var i = 0; i < datos.length; i++){
//                    $("ul#lastnoti").append('<li class="text-li-noti"><a href="' + _root_ +''+ datos[i].Ruta + '"><i class="bi bi-megaphone-fill"></i> [' + datos[i].Rol + '] ' + datos[i].Nom + ' <span style="font-weight: bold;">' + datos[i].Mov + '</span><p>Fecha: <span style="font-weight: bold;">' + datos[i].Date_mov + '</span> Hora: <span style="font-weight: bold;">' + datos[i].Time_mov + ' hrs.</span></p>');
//                }
//             }, 'json');
//    } 
//    
//    setInterval(getLastNotif,10000);

//           $('ul#lastnoti').load(_root_ + 'movimientos/index/getLastNotifUsu', function(result) {
//              var datos = jQuery.parseJSON(result);//jQuery.parseJSON
//              $('ul#lastnoti').html('');
//                for(var i = 0; i < datos.length; i++){
//                    $("ul#lastnoti").append('<li class="text-li-noti"><a href="' + _root_ +''+ datos[i].Ruta + '"><i class="bi bi-megaphone-fill"></i> [' + datos[i].Rol + '] ' + datos[i].Nom + ' <span style="font-weight: bold;">' + datos[i].Mov + '</span><p>Fecha: <span style="font-weight: bold;">' + datos[i].Date_mov + '</span> Hora: <span style="font-weight: bold;">' + datos[i].Time_mov + ' hrs.</span></p>');
//                }
//           });
             
             
    
    

//$("ul#lastnoti").css('background','yellow');



});

  $(document).ready(function(){  
            //$(window).load(function(){
                //var j = jQuery.noConflict(true);
                 //$(function(){
                     //a#campana.navega-lucho.dropdown-toggle.show
                     //$("div#navbarSupportedContent > ul#ulclicknoti > li.dropdown.notifications-menu > a").click(function() {
                     //$("div#navbarSupportedContent > ul#ulclicknoti > li.dropdown.notifications-menu > a:active").click( function () {
                     //$('[data-id="ejemplo"]').click(function() {
                     
                     //$('#unico').click(function(event) {
                     //    event.preventDefault();
                         
                         //alert("Hello AnojCrazyCoder !!!!");
                     //})
                 //})
            });



