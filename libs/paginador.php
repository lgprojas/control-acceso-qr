<?php

class Paginador
{
    private $_datos;
    private $_paginacion;
    
    public function __construct() {
        $this->_datos = array();
        $this->_paginacion = array();
    }
    
    public function paginarx($query, $cantreg, $pagina = false, $limite = false, $paginaciones = false) {
        //Paginador v2 mejorado para paginar con LIMIT x,y
        
        if($limite && is_numeric($limite)){
            $limite = $limite;
        } else {
            $limite = 10;
        }
        
        if($pagina && is_numeric($pagina)){
            $pagina = $pagina;
            $inicio = ($pagina - 1) * $limite; //selecciona pagina del lote a mostrar
        } else {
            $pagina = 1;
            $inicio = 0;
        }
        
        
        $registros = $cantreg; //Cuenta cant registros
        $total = ceil($registros / $limite); //Total paginas / cant registros por pagina (además aproxima)
        $this->_datos = $query;//

        
        $paginacion = array();
        $paginacion['actual'] = $pagina;
        $paginacion['total'] = $total;
        
        if($pagina > 1){
            $paginacion['primero'] = 1;
            $paginacion['anterior'] = $pagina - 1;
        } else {
            $paginacion['primero'] = '';
            $paginacion['anterior'] = '';
        }
        
        if($pagina < $total){
            $paginacion['ultimo'] = $total;
            $paginacion['siguiente'] = $pagina + 1;
        } else {
            $paginacion['ultimo'] = '';
            $paginacion['siguiente'] = '';
        }
        
        $this->_paginacion = $paginacion;
        $this->_rangoPaginacion($paginaciones);
        return $this->_datos;
    }
    
    public function limit($pagina, $limite) {
                
        if($limite && is_numeric($limite)){
            $limite = $limite;
        } else {
            $limite = 10;
        }
        
        if($pagina && is_numeric($pagina)){
            $pagina = $pagina;
            $inicio = ($pagina - 1) * $limite; //selecciona pagina del lote a mostrar
            //echo $inicio;exit;
        } else {
            $pagina = 1;
            $inicio = 0;
        }
        
        $limitex = " LIMIT ".$inicio.", ".$limite;
        
        return $limitex;
    }
//------------------------------------------------------------------------------
    
    public function paginar($query, $pagina = false, $limite = false, $paginaciones = false)
    {
        if($limite && is_numeric($limite)){
            $limite = $limite;
        } else {
            $limite = 10;
        }
        
        if($pagina && is_numeric($pagina)){
            $pagina = $pagina;
            $inicio = ($pagina - 1) * $limite; //selecciona pagina del lote a mostrar
        } else {
            $pagina = 1;
            $inicio = 0;
        }
        
        
        $registros = count($query); //Cuenta cant registros
        $total = ceil($registros / $limite); //Total registros / cant registros por pagina (además aproxima)
        $this->_datos = array_slice($query, $inicio, $limite);// selecciona lote entre x e y
//        var_dump($this->_datos);exit;
//        while($regs = mysql_fetch_assoc($consulta)){
//            $this->_datos[] = $regs;
//        }
        
        $paginacion = array();
        $paginacion['actual'] = $pagina;
        $paginacion['total'] = $total;
        
        if($pagina > 1){
            $paginacion['primero'] = 1;
            $paginacion['anterior'] = $pagina - 1;
        } else {
            $paginacion['primero'] = '';
            $paginacion['anterior'] = '';
        }
        
        if($pagina < $total){
            $paginacion['ultimo'] = $total;
            $paginacion['siguiente'] = $pagina + 1;
        } else {
            $paginacion['ultimo'] = '';
            $paginacion['siguiente'] = '';
        }
        
        $this->_paginacion = $paginacion;
        $this->_rangoPaginacion($paginaciones);
        
        return $this->_datos;
    }
    
    public function _rangoPaginacion($limite = false)
    {
        if($limite && is_numeric($limite)){
            $limite = $limite;
        } else {
            $limite = 10;
        }
        
        $total_paginas = $this->_paginacion['total'];
        $pagina_seleccionada = $this->_paginacion['actual'];
        $rango = ceil($limite / 2);
        $paginas = array();
        
        $rango_derecho = $total_paginas - $pagina_seleccionada;
        
        if($rango_derecho < $rango){
            $resto = $rango - $rango_derecho;
        } else {
            $resto = 0;
        }
        
        $rango_izquierdo = $pagina_seleccionada - ($rango + $resto);
        
        for($i = $pagina_seleccionada; $i > $rango_izquierdo; $i--){
            if($i == 0){
                break;
            }
            
            $paginas[] = $i;
        }
        
        sort($paginas);
        
        if($pagina_seleccionada < $rango){
            $rango_derecho = $limite;
        } else {
            $rango_derecho = $pagina_seleccionada + $rango;
        }
        
        for($i = $pagina_seleccionada + 1; $i <= $rango_derecho; $i++){
            if($i > $total_paginas){
                break;
            }
            
            $paginas[] = $i;
        }
        
        $this->_paginacion['rango'] = $paginas;
        
        return $this->_paginacion;
        
    }
    
    public function getView($vista, $link = false){
        
        $rutaView = ROOT. 'views' . DS . '_paginador' . DS . $vista . '.php';
         
        if($link){
             $link = BASE_URL . $link . '/';
         }
         
         if(is_readable($rutaView)){
             ob_start();//abrimos el buffer
             
             include $rutaView;//almacenamos la vista en el Buffer
             
             $contenido = ob_get_contents();// lo del buffer lo almacenamos en $contenido
             
             ob_end_clean();//limpia el buffer
             
             return $contenido;
         }
         
         throw new Exception('Error de paginacion');
    }
}

?>
