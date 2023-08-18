<?php

class selectcamController extends codeqrController {
    
    private $_index;
    
    public function __construct() {
        parent::__construct();
        $this->_index =  $this->loadModel('selectcam');
        
    }
    
    public function index() {

        $this->_view->setJsb(array('adapter.min'));
        $this->_view->setJsb(array('vue.min'));
        $this->_view->setJsb(array('instascan.min'));
        
        $this->_view->renderizar('index', 'index');
    }
    
}