<?php

class indexController extends controlController {
    
    private $_index;
    
    public function __construct() {
        parent::__construct();
        //$this->_control =  $this->loadModel('index');
    }
    
    public function index($patente="") {
        
        if(!Session::get('autenticado')){$this->redireccionar("usuarios/login/index/".$patente);}
        //$this->_acl->acceso('ver_usu');
        
        echo "Procesar la patente $patente";
    }
}