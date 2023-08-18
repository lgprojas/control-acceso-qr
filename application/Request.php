<?php

class Request{
    
    private $_modulo;
    private $_controlador;
    private $_metodo;
    private $_argumentos;
    private $_modules;


    public function __construct() {
        if(isset($_GET['url'])){
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $url = array_filter($url);

            /*Modulos de la app*/
            $this->_modules = array(
                                    'error',
                                    'errores',
                                    'usuarios',
                                    'codeqr',
                                    'dashboard',
                                    'buscar'
            );
            
            
           // 1.modulo/controlador/metodo/argumentos
           // 2.controlador/metodo/argumentos
           $this->_modulo = strtolower(array_shift($url));
           
           if($this->_modulo == '_errorpages'){$this->_modulo = 'errores';}//si tiene error
           
           if(!$this->_modulo){
               $this->_modulo = false;
           }else{
               if(count($this->_modules)){//conteo del arreglo de los modulos para ver si existe el modulo dentro del array modules
                   if(!in_array($this->_modulo, $this->_modules)){
                       $this->_controlador = $this->_modulo;
                       $this->_modulo = false;
                   }else{
                       //si esta contenido entonces en el array
                       $this->_controlador = strtolower(array_shift($url));//al controlador se le va asignar el siguiente elementos del array url
                       
                       if(!$this->_controlador){
                           $this->_controlador = 'index';// controlador index del modulo
                       }
                   }
               }else{//si no hay modulo

                     $this->_controlador = $this->_modulo;
                     $this->_modulo = false;
               }
              
           }           
            //$this->_controlador = strtolower(array_shift($url));
            $this->_metodo = strtolower(array_shift($url));
            $this->_argumentos = $url;
        }
        
        if(!$this->_controlador){
            $this->_controlador = DEFAULT_CONTROLLER;
        }
        
        if(!$this->_metodo){
            $this->_metodo = 'index';
        }
        
        if(!isset($this->_argumentos)){
            $this->_argumentos = array();
        }    
        
        //echo $this->_modulo . '/' . $this->_controlador . '/' . $this->_metodo . '/' ; print_r($this->_argumentos);exit;//test 
    }
    
    public function getModulo(){
        return $this->_modulo;
    }


    public function getControlador(){
        return $this->_controlador;
    }
    
    public function getMetodo(){
        return $this->_metodo;
    }
    
    public function getArgs(){
        return $this->_argumentos;
    }            
}

?>
