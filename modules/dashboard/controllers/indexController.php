<?php

class indexController extends dashboardController {

    private $_index;

    public function __construct() {
        parent::__construct();        
        $this->_index =  $this->loadModel('index');
    }

    public function index() {

       $this->_view->assign("titulo", "Dashboard");
       
       
       //$this->_view->assign('circulacion', $this->_index->getCirculacion());

       //$this->_view->setCssb(array("Chart.min"));
       $this->_view->setJsb(array('chart.min'));
       $this->_view->setJsb(array('chartjs-plugin-datalabels.min'));
       $this->_view->setJs(array('ajax'));

       $this->_view->renderizar("index", "index");
    }
    
    public function getCantMovPorMes(){
        
        if($this->getInt('fch')){
            $y = $this->getInt('fch');            
        }else{
            $y = date("Y");
        }
        
        //podría ser cantidad de causas por mes categorizadas por tipo
        $datos = $this->_index->getCantMovPorMes($y);
        
        echo json_encode($datos);
        
    }
    
    public function getMovs(){
        //Movimientos por empresas
        
        if($this->getInt('fch')){
            $y = $this->getInt('fch');            
        }else{
            $y = date("Y");
        }
        
        if($this->getInt('mes')){
            $m = ' AND MONTH(Fch_mov) = ' . $this->getInt('mes');            
        }else{
            $m = '';
        }
        
        $datos = $this->_index->getMovs($y,$m);
        
        echo json_encode($datos);
        
    }
    
    public function getCantCausasPorMesEstado(){
        
        if($this->getInt('fch')){
            $y = $this->getInt('fch');            
        }else{
            $y = date("Y");
        }
        
        //podría ser cantidad de causas por mes categorizadas por tipo
        $datos = $this->_index->getCantCausasPorMesEstado($y);
        
        echo json_encode($datos);
        
    }
    
    public function getCantCausasYearMesTipo(){
        
        if($this->getInt('y')){
            $y = $this->getInt('y');            
        }else{
            $y = date("Y");
        }
        
        if($this->getInt('m')){
            $m = ' AND MONTH(Fch_causa) = ' . $this->getInt('m');            
        }else{
            $m = '';
        }
        
        //podría ser cantidad de causas por mes categorizadas por tipo
        $datos = $this->_index->getCantCausasYearMesTipo($y,$m);
        
        echo json_encode($datos);
        
    }
    

    
    public function getProdsParametros(){
        //lista cantidad de causas por tipo entre fechas
        if($this->getInt('ini') && $this->getInt('fin')){
            
            $datos = $this->_index->getProdsParam(
                                                  $this->getInt('ini'),
                                                  $this->getInt('fin')
                                                  );

            echo json_encode($datos);
        
        }
        
    }
}