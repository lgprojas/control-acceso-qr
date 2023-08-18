function getPaginacion(pagina, paginacion){
    var page = Number(pagina);
    var paginacion = Number(paginacion);
    var form = document.form1;
    
    if(paginacion == 1){
        form.pagina1.value = page;
        form.submit();
        return 0;
    }
    
    if(paginacion == 2){
        form.pagina2.value = page;
        form.submit();
        return 0;
    }
    
    if(paginacion == 3){
        form.pagina3.value = page;
        form.submit();
        return 0;
    }
}