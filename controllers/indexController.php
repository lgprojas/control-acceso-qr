<?php

class indexController extends Controller {
    
    private $_index;
    
    public function __construct() {
        parent::__construct();
        
        $this->_index = $this->loadModel('index');
    }
    
    public function index(){
        $this->_view->assign('titulo', 'Portada');   
        $this->_view->setCss(array('norma')); 
        $this->_view->setCss(array('portada')); 
        $this->_view->setCss(array('animate'));
        $this->_view->setCss(array('font-awesome.min'));
        $this->_view->setJs(array('wow.min'));
        $this->_view->setJs(array('portada'));  
        
        
        $this->_view->assign('javascript', 2);
        $var1 = 'new WOW().init();';
        $this->_view->assign('var1', $var1);
        
        $this->_view->assign('level', Session::get('level'));
        $this->_view->assign('usuario', Session::get('usuario'));
        $this->_view->assign('nombre', Session::get('nombre_usu'));
        $this->_view->assign('id', Session::get('id_usuario'));
        $this->_view->assign('rut_usu', Session::get('rut_usu'));
        $this->_view->assign('empresa', Session::get('empresa'));
        $this->_view->assign('tiempo', Session::get('tiempo'));
        $this->_view->renderizar('index','index');
        
        
    }
}
?>
