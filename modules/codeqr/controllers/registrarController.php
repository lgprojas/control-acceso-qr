<?php
class registrarController extends codeqrController {
    
    private $_index;
    
    public function __construct() {
        parent::__construct();
        $this->_index =  $this->loadModel('registrar');
    }
    
    public function index($patente=false) {
        
        if(!Session::get('autenticado')){$this->redireccionar();}
        //$this->_acl->acceso('ver_usu');

        $cod = $this->decrypt($patente);
//        $this->_view->assign('cod', $cod);
        if(!$cod){
            Session::setError("El QR no es válido");
            $this->redireccionar('codeqr/selectcam/');
            exit;
        }
        
        $largo = strlen($cod);
        if(!$largo == 6){
            Session::setError("La longitud no corresponde");
            $this->redireccionar('codeqr/selectcam/');
            exit;
        }        
        
        if (!ctype_alnum($cod)) {
            Session::setError("Los caracteres no corresponden");
            $this->redireccionar('codeqr/selectcam/');
            exit;
        }
        
        if(!$this->_index->getPatente($cod)){
            Session::setError("La patente '$cod' no se encuentra registrada");
            $this->redireccionar('codeqr/selectcam/');
            exit;
        }
        
        $this->_view->assign('cod', $cod);
        $this->_view->assign('datos', $this->_index->getDatosEmpVehi($cod));
        
        $fechahora = date("Y-m-d H:i:s");
        //$salida = date("Y-m-d H:i:s");
        $this->_view->assign('fechahora', $fechahora);
        
        $this->_view->assign('tobsvehi', $this->_index->getTipoObsVehi());

        //datepickertime
        $this->_view->setJsPlugin(array('jquery-ui-1.10.3.custom'));
        $this->_view->setJsPlugin(array('jquery-ui-1.10.3.custom.min'));
        $this->_view->setCssPlugin(array('jquery-ui-1.10.3.custom'));
        
        //datetimepicker
        $this->_view->setCssPlugin(array('jquery-ui-timepicker-addon'));
        $this->_view->setJsPlugin(array('jquery-ui-timepicker-addon'));
        
        
        $this->_view->setJs(array('bootstrap-waitingfor'));
        $this->_view->setJs(array('ajax'));
        
        $this->_view->renderizar('index', 'index');
    }
    
    public function snm() {                         
        
        if(!Session::get('autenticado')){$this->redireccionar();}
        //$this->_acl->acceso('crear_causa');
        
        $idvehi = $this->getSql('idv');
        $fchmov = $this->getSql('fchm');
        $idtmov = $this->getSql('idtm');
        $nota = $this->getSql('nota');
        $idusu = Session::get('id_usuario');
        
        if (!$idvehi){
            $data = ['valor' => "0", 
                     'mssg' => "Error en el registro."
                    ];                
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data);
            exit;
        }
        
        if(!$this->_index->verificarIdVehi($idvehi)){
            $data = ['valor' => "0", 
                     'mssg' => "El vehículo no existe."
                    ];                
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data);
            exit;
        }
        
        if (!$fchmov){
            $data = ['valor' => "0", 
                     'mssg' => "La fecha y hora no son válidas."
                    ];                
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data);
            exit;
        }
        
        if (!$idtmov){
            $data = ['valor' => "0", 
                     'mssg' => "No se puede corroborar el tipo de movimiento."
                    ];                
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data);
            exit;
        }
        
        $respuesta = $this->_index->addNewMovVehi(                                                                                        
                                            $fchmov,
                                            $nota, 
                                            $idtmov,
                                            $idvehi,
                                            $idusu
                        );
        
        $cod = $this->_index->getPatVehi($idvehi);
        
        if ($respuesta == true){
                
            Session::setMensaje("Movimiento registrado correctamente.");  
            $code = $this->encrypt($cod);
            $data = ['valor' => "1",
                     'cod' => "$code"
                    ];                
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data);
            exit;
                
        }else{
            Session::setError("No se pudo registrar correctamente el movimiento.");
            $this->redireccionar('codeqr/registrar/index/'.$this->encrypt($cod));
            exit;
        }
    }
    
    public function sno() {                         
        
        if(!Session::get('autenticado')){$this->redireccionar();}
        //$this->_acl->acceso('crear_causa');
        
        $idvehi = $this->getSql('idv');
        $fcho = $this->getSql('fcho');
        $tobsvehi = $this->getSql('tobsvehi');
        $nota = $this->getSql('nota');
        $idusu = Session::get('id_usuario');
        
        if (!$idvehi){
            $data = ['valor' => "0", 
                     'mssg' => "Error en el registro."
                    ];                
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data);
            exit;
        }
        
        if(!$this->_index->verificarIdVehi($idvehi)){
            $data = ['valor' => "0", 
                     'mssg' => "El vehículo no existe."
                    ];                
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data);
            exit;
        }
        
        if (!$fcho){
            $data = ['valor' => "0", 
                     'mssg' => "La fecha y hora no son válidas."
                    ];                
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data);
            exit;
        }
        
        if (!$tobsvehi){
            $data = ['valor' => "0", 
                     'mssg' => "No se puede corroborar el tipo de observación."
                    ];                
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data);
            exit;
        }
        
        if (!$nota){
            $data = ['valor' => "0", 
                     'mssg' => "Debe ingresar detalles de la observación."
                    ];                
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data);
            exit;
        }
        
        list($fch, $hora) = explode(" ", $fcho);
        list($dia, $mes, $year) = explode("-", $fch);
        $fchobs = $year."-".$mes."-".$dia." ".$hora;
        
        $respuesta = $this->_index->addNewObs(                                                                                        
                                            $fchobs,
                                            $nota, 
                                            $tobsvehi,
                                            $idvehi,
                                            $idusu
                        );
        
        $cod = $this->_index->getPatVehi($idvehi);
        
        if ($respuesta == true){
                
            Session::setMensaje("Observación registrada correctamente.");  
            $code = $this->encrypt($cod);
            $data = ['valor' => "1",
                     'cod' => "$code"
                    ];                
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($data);
            exit;
                
        }else{
            Session::setError("No se pudo registrar correctamente la observación.");
            $this->redireccionar('codeqr/registrar/index/'.$this->encrypt($cod));
            exit;
        }
    }
    
}

