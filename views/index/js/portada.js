$(document).ready(function(){
    
    var height = $(window).height();
    
    ajustesIniciales();
    
    function ajustesIniciales(){
        $("section#body").css({"margin-top": height - 80 + "px"});
    }
    
    $(document).scroll(function(){
        var scrolltop = $(this).scrollTop();
        var pixels = scrolltop / 70;
        
        if(scrolltop < height){
            $("section#contenedor").css({
                "-webkit-filter": "blur(" + pixels + "px)",
                "-moz-filter": "blur(" + pixels + "px)",
                "-o-filter": "blur(" + pixels + "px)",
                //"background-position": "center -" + pixels * 10 + "px"
            });
               
        }
    });
});