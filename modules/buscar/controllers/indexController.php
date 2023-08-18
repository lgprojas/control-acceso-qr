<?php

class indexController extends buscarController {
    
    private $_index;
    
    public function __construct() {
        parent::__construct();
        $this->_index =  $this->loadModel('index');
    }
    
    public function index(){

//        $this->_view->assign('acctran', $this->_index->getAccTransa());        
        if(!Session::get('autenticado')){$this->redireccionar();}
        //$this->_acl->acceso('ver_index');
        
        $this->_view->assign('titulo', 'Buscar');
        
        $this->_view->assign('tmov', $this->_index->getTipoMovFilt());
        $this->_view->assign('enti', $this->_index->getEntidadesFilt());

        $row = $this->_index->getMovs();
        
        $this->getLibrary('paginador');
        $pag1 = new Paginador();        
        $pagina1 = false;        
        if($_POST){
            $this->_view->assign('_datos', $_POST);
            $pagina1 = $this->getInt('pagina1');
        }
        $this->_view->setJs(array('ajax')); 
        //$this->_view->setJs(array('example'));        
        $this->_view->assign('color', '#F5FFFA');        
        $this->_view->assign('mov', $pag1->paginar($row, $pagina1, 20));
        $this->_view->assign('paginacion1', $pag1->getView('paginacion_ajax'));
        
      $this->_view->renderizar('index', 'buscar');
    }
    
    public function pa()
   {
       if(!Session::get('autenticado')){$this->redireccionar();}
//       $this->_acl->acceso('ver_cli');
        
       $pagina1 = $this->getInt('pagina');
       $entidad = $this->getSql('e');
       $patente = $this->getSql('p');
       $tipo = $this->getSql('t');
       //$registros  = $this->getInt('registros');
       //echo $rut;exit;
       $condicion = "";
              
//            $id = $this->_per->getIdCond(Session::get('id_usuario'));
               if($tipo){
                   $condicion .= " AND m.Id_tmov = $tipo ";
               }
               if($patente){
                   $condicion .= " AND Pat_vehi LIKE '%$patente%' ";
               }
               if($entidad){
                   $condicion .= " AND e.Id_entidad = $entidad ";
               }
                            
        
        //echo $condicion;exit;
        
        $this->getLibrary('paginador');
        $pag1 = new Paginador();
       
        $row = $this->_index->getMovs($condicion);
        
        $this->_view->assign('root', BASE_URL);
        $this->_view->assign('_acl', $this->_acl);//para permiso
        $this->_view->setJs(array('ajax'));        
        $this->_view->assign('color', '#F5FFFA');        
        $this->_view->assign('mov', $pag1->paginar($row, $pagina1, 20));
        $this->_view->assign('paginacion1', $pag1->getView('paginacion_ajax'));
        $this->_view->renderizar('ajax/pagAjax', false, true);
   }
}