<?php

Class loginController extends Controller{
    
    private $_login;

    public function __construct() {
        parent::__construct();
        $this->_login = $this->loadModel('login');
    }
    
    public function index($patente=false){
        
        if(Session::get('autenticado')){//verifica si esta logeado así no permitira entrar nuevamente al login           
            $this->redireccionar();
        }
        
        $this->_view->assign('titulo', 'Iniciar Sesión');
        
        $this->_view->setCss(array('style'));
        
        if($this->getInt('enviar') == 1){
            $this->_view->assign('datos', $_POST);
            
            if(!$this->getAlphaNum('usuario')){
                $this->_view->assign('_error', 'Debe introducir su nombre de usuario');
                $this->_view->renderizar('index','login');
                exit;        
            }
            
            if(!$this->getSql('pass')){
                $this->_view->assign('_error', 'Debe introducir su password');
                $this->_view->renderizar('index','login');
                exit;        
            }
            
            ///procesamos datos de ingreso
            $row = $this->_login->getUsuario(
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass')
                    );
            
            if(!$row){
                $this->_view->assign('_error', 'Usuario y/o password incorrecto(s)');
                $this->_view->renderizar('index','login');
                exit;
            }
            
            if($row['Id_estusu'] != 1 || $row['Id_activar'] != 1){
                $this->_view->assign('_error', 'Este usuario no esta habilitado');
                $this->_view->renderizar('index','login');
                exit;
            }
            
            Session::set('autenticado', true);
            Session::set('level', $row['Id_role']);
            Session::set('nombre_usu', $row['Nom_usu']);
            Session::set('usuario', $row['Usu_usu']);
            Session::set('id_usuario', $row['Id_usu']);
            Session::set('rut_usu', $row['Rut_usu']);
            Session::set('id_emp', $row['Id_emp']);
            if($row['Id_empresa'] == 0){
               Session::set('id_empresa', $row['Id_empresa']);
               
            }else{
               Session::set('id_empresa', $row['Id_empresa']);
               Session::set('idencript_empresa', $this->encrypt($row['Id_empresa']));
               Session::set('idencript_emp', $this->encrypt($row['Id_emp']));
               
               $nom_empresa = $this->_login->getNomEmpresa($row['Id_empresa']); 
               Session::set('empresa', $nom_empresa);
            }       
            
            
            Session::set('tiempo', time());

            //para testear usar print_r($_SESSION);//comprueba si funciona sesión
            $this->redireccionar();
        }
        
        $this->_view->renderizar('index', 'login');
        
    }
    
    public function cerrar(){
        
        Session::destroy();//2 var Session::destroy(array('var1', 'var2'));
        $this->redireccionar();//$this->redireccionar('login/mostrar');
    }
}

?>
