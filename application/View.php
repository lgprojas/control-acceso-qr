<?php
require_once ROOT . 'libs' . DS . 'smarty' . DS . 'libs' . DS . 'Smarty.class.php';

class View extends Smarty{
    
    private $_request;
    private $_js;
    private $_css;
    private $_jsb;
    private $_cssb;
    private $_acl;
    //$this->_aclcli
    private $_rutas;
    private $_jsPlugin;
    private $_cssPlugin;

    public function __construct(Request $peticion, ACL $_acl) {
        parent::__construct();
        $this->_request = $peticion;
        $this->_js = array();
        $this->_css = array();
        $this->_jsb = array();
        $this->_cssb = array();
        $this->_acl = $_acl;//inicializamos $_acl
        //$this->_aclcli = $_aclcli;//inicializamos $_aclcli
        $this->_rutas = array();
        $this->_jsPlugin = array();
        $this->_cssPlugin = array();
        
        $modulo = $this->_request->getModulo();
        $controlador = $this->_request->getControlador();
        
        if($modulo){//verificamos si hay un módulo
            
            $this->_rutas['view'] = ROOT . 'modules' . DS . $modulo . DS . 'views' . DS . $controlador . DS;//ruta vistas modules
            $this->_rutas['js'] = BASE_URL . 'modules/' . $modulo. '/views/' . $controlador . '/js/';
            $this->_rutas['css'] = BASE_URL . 'modules/' . $modulo. '/views/' . $controlador . '/css/';
        }else{
            $this->_rutas['view'] = ROOT . 'views' . DS . $controlador . DS;//ruta vistas modules
            $this->_rutas['js'] = BASE_URL . 'views/' . $controlador . '/js/';
            $this->_rutas['css'] = BASE_URL . 'views/' . $controlador . '/css/';
        
        }
    }
    
    public function renderizar($vista, $item = false, $noLayout = false){
         //para que trabaje la libreria smarty--
        $this->template_dir = ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS;//template por defecto en smarty
        $this->config_dir = ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'configs' . DS;
        $this->cache_dir = ROOT . 'tmp' . DS . 'cache' . DS;
        $this->compile_dir = ROOT . 'tmp' . DS . 'template' . DS;
         //para que trabaje la libreria smarty--
        //menu
        //if(Session::get('autenticado')){
            $home = array(0 => array(
                                  'id' => 'Home',
                                  'title' => ' Home',
                                  'enlace' => BASE_URL,
                                  'imagen' => 'glyphicon glyphicon-home',
                                  'children' => Array()
                                  ),
                       );

            $menu_ad = array(
                        0 => array(
                                                              'id' => 'scan-qr',
                                                              'title' => 'Scan QR',
                                                              'enlace' => '#' ,
                                                              'imagen' => 'glyphicon glyphicon-tasks',
                                                              'children' => array(
                                                                                  0 => array(
                                                                                            'title' => 'Scan QR',
                                                                                            'enlace' => BASE_URL . 'codeqr/',
                                                                                            'children' => Array(),
                                                                                             ),
                                                                                  1 => array(
                                                                                            'title' => 'Scan QR Select Cam',
                                                                                            'enlace' => BASE_URL . 'codeqr/selectcam/',
                                                                                            'children' => Array(),
                                                                                             ),
                                                                                )
                                                                ),
                        1 => array(
                                                              'id' => 'reportes',
                                                              'title' => 'Reportes',
                                                              'enlace' => '#' ,
                                                              'imagen' => 'glyphicon glyphicon-tasks',
                                                              'children' => array(
                                                                                  0 => array(
                                                                                            'title' => 'Reportes 1',
                                                                                            'enlace' => BASE_URL . 'dashboard/',
                                                                                            'children' => Array(),
                                                                                             ),
                                                                                  1 => array(
                                                                                            'title' => 'Reportes 2',
                                                                                            'enlace' => BASE_URL . 'dashboard/',
                                                                                            'children' => Array(),
                                                                                             ),
                                                                                )
                                                                ),
                        2 => array(
                                                              'id' => 'buscar',
                                                              'title' => 'Buscar',
                                                              'enlace' => BASE_URL . 'buscar' ,
                                                              'imagen' => 'glyphicon glyphicon-tasks',
                                                              'children' => array(), 
                                                                ),
                        3 => array(
                                  'id' => 'administrar',
                                  'title' => 'Administrar',
                                  'enlace' => '#' ,
                                  'imagen' => 'glyphicon glyphicon-tasks',
                                  'children' => array(
                                                      0 => array(
                                                              'id' => 'Referen',
                                                              'title' => 'Referenciales',
                                                              'enlace' => '#' ,
                                                              'imagen' => 'glyphicon glyphicon-tasks',
                                                              'children' => array(
                                                                                  0 => array(
                                                                                            'title' => 'Tipo tribunal',
                                                                                            'enlace' => BASE_URL . 'ref/ttrib/',
                                                                                            'children' => Array(),
                                                                                             ),
                                                                                  1 => array(
                                                                                            'title' => 'Ciudad',
                                                                                            'enlace' => BASE_URL . 'ref/ciu/',
                                                                                            'children' => Array(),
                                                                                             ),
                                                                                )
                                                                ),
                                                      1 => array(
                                                                'title' => 'Empresa',
                                                                'enlace' => BASE_URL . 'empresa/',
                                                                'children' => Array(),
                                                                 ),                                                     
                                                      2 => array(
                                                                'title' => 'Tribunal',
                                                                'enlace' => BASE_URL . 'transa/trib/',
                                                                'children' => Array(),
                                                                 ),
                                                      3 => array(
                                                                'title' => 'Libro/Tipo',
                                                                'enlace' => BASE_URL . 'transa/librotipo/',
                                                                'children' => Array(),
                                                                 ),
                                                      4 => array(
                                                                'title' => 'Corte',
                                                                'enlace' => BASE_URL . 'transa/corte/',
                                                                'children' => Array(),
                                                                 ),
                                                      5 => array(
                                                              'id' => 'Historicos',
                                                              'title' => 'Históricos',
                                                              'enlace' => '#' ,
                                                              'imagen' => 'glyphicon glyphicon-tasks',
                                                              'children' => array(
                                                                                  0 => array(
                                                                                            'title' => 'Clientes',
                                                                                            'enlace' => BASE_URL . 'historial/hiscli/',
                                                                                            'children' => Array(),
                                                                                             ),
                                                                                  1 => array(
                                                                                            'title' => 'Empleados',
                                                                                            'enlace' => BASE_URL . 'historial/hisemp/',
                                                                                            'children' => Array(),
                                                                                             ),
                                                                                )
                                                                ),
                                                      8 => array(
                                                                'title' => 'Config.',
                                                                'enlace' => BASE_URL . 'config/',
                                                                'children' => Array(),
                                                                 ),
                                                    ),
                                            ),
                        4 => array(
                                  'id' => 'config',
                                  'title' => 'Config',
                                  'enlace' => '#' ,
                                  'imagen' => 'glyphicon glyphicon-wrench',
                                  'children' => array(
                                                      0 => array(
                                                                'title' => 'ACL',
                                                                'enlace' => '#',
                                                                'children' => Array(
                                                                                    0 => array(
                                                                                               'title' => 'Lista permisos',
                                                                                               'enlace' => BASE_URL . 'acl/permisos',
                                                                                               'children' => Array(),
                                                                                               ),
                                                                                    1 => array(
                                                                                               'title' => 'Lista roles',
                                                                                               'enlace' => BASE_URL . 'acl/roles',
                                                                                               'children' => Array(),
                                                                                               ),
                                                                                    ),
                                                                 ),
                                                      1 => array(
                                                                'title' => 'ACL Cliente',
                                                                'enlace' => '#',
                                                                'children' => Array(
                                                                                    0 => array(
                                                                                               'title' => 'Lista permisos',
                                                                                               'enlace' => BASE_URL . 'aclcli/permisos',
                                                                                               'children' => Array(),
                                                                                               ),
                                                                                    1 => array(
                                                                                               'title' => 'Lista roles',
                                                                                               'enlace' => BASE_URL . 'aclcli/roles',
                                                                                               'children' => Array(),
                                                                                               ),
                                                                                    ),
                                                                 ),
                                      ),
                              ),
                );
            
        $menu_su = array(
                        0 => array(
                                                              'id' => 'scan-qr',
                                                              'title' => 'Scan QR',
                                                              'enlace' => '#' ,
                                                              'imagen' => 'glyphicon glyphicon-tasks',
                                                              'children' => array(
                                                                                  0 => array(
                                                                                            'title' => 'Scan QR',
                                                                                            'enlace' => BASE_URL . 'codeqr/',
                                                                                            'children' => Array(),
                                                                                             ),
                                                                                  1 => array(
                                                                                            'title' => 'Scan QR Select Cam',
                                                                                            'enlace' => BASE_URL . 'codeqr/selectcam/',
                                                                                            'children' => Array(),
                                                                                             ),
                                                                                )
                                                                ),  
                        1 => array(
                                                              'id' => 'reportes',
                                                              'title' => 'Reportes',
                                                              'enlace' => '#' ,
                                                              'imagen' => 'glyphicon glyphicon-tasks',
                                                              'children' => array(
                                                                                  0 => array(
                                                                                            'title' => 'Reportes 1',
                                                                                            'enlace' => BASE_URL . 'dashboard/',
                                                                                            'children' => Array(),
                                                                                             ),
                                                                                  1 => array(
                                                                                            'title' => 'Reportes 2',
                                                                                            'enlace' => BASE_URL . 'dashboard/',
                                                                                            'children' => Array(),
                                                                                             ),
                                                                                )
                                                                ),
                        2 => array(
                                                              'id' => 'buscar',
                                                              'title' => 'Buscar',
                                                              'enlace' => BASE_URL . 'buscar' ,
                                                              'imagen' => 'glyphicon glyphicon-tasks',
                                                              'children' => array(), 
                                                                ),
            );
                      
        
        $_params = array(
             'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
             'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
             'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
             'ruta_icons' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/bootstrap-icons/',
            'home' => $home,
            'menu_ad' => $menu_ad,
            'menu_su' => $menu_su,
            'item' => $item,
            'js' => $this->_js,
            'jsb' => $this->_jsb,
            'js_plugin' => $this->_jsPlugin,
            'css_plugin' => $this->_cssPlugin,
            'css' => $this->_css,
            'cssb' => $this->_cssb,
            'root' => BASE_URL,
            'configs' => array(
                'app_name' => APP_NAME,
                'app_slogan' => APP_SLOGAN,
                'app_company' => APP_COMPANY
            )
         );
        
        //echo '<pre>'; print_r($this->_rutas); exit;// test View
      
        if(is_readable($this->_rutas['view'] . $vista . '.tpl')){      
            if($noLayout){
                $this->template_dir = $this->_rutas['view'];
                $this->display($this->_rutas['view'] . $vista . '.tpl');
                exit;
            }
            $this->assign('_contenido', $this->_rutas['view'] . $vista . '.tpl');//por defecto vista index.tpl en views global
        }else{
            throw new Exception('Error de vista');
        }
        
        $this->assign('_acl', $this->_acl);//enviamos el objeto Acl a las vistas por method assign
        $this->assign('_layoutParams', $_params);
        $this->display('template.tpl');
    }
    
    public function setJs(array $js){//llama los .js en views especificas
        
        if(is_array($js) && count($js)){
            for($i=0;$i < count($js);$i++){
                $this->_js[] =  $this->_rutas['js']. $js[$i] . '.js';
            }
        }else{
            throw new Exception('Error de js');
        }
    }
    
    public function setJsb(array $jsb){
        
        if(is_array($jsb) && count($jsb)){
            for($i=0;$i < count($jsb);$i++){
                $this->_jsb[] =  $this->_rutas['js']. $jsb[$i] . '.js';
            }
        }else{
            throw new Exception('Error de js');
        }
    }
    
    public function setJsPlugin(array $js){
        
        if(is_array($js) && count($js)){
            for($i=0; $i < count($js); $i++){
                $this->_jsPlugin[] = BASE_URL . 'public/js/' . $js[$i] . '.js';
            }
        }else{
            throw new Exception('Error de js Plugin');
        }
    }

    public function setCssPlugin(array $css){
        
        if(is_array($css) && count($css)){
            for($i=0; $i < count($css); $i++){
                $this->_cssPlugin[] = BASE_URL . 'public/css/' . $css[$i] . '.css';
            }
        }else{
            throw new Exception('Error de css Plugin');
        }
    }

    
    public function setCss(array $css){//llama los .js en views especificas
        
        if(is_array($css) && count($css)){
            for($i=0;$i < count($css);$i++){
                $this->_css[] =  $this->_rutas['css']. $css[$i] . '.css';
            }
        }else{
            throw new Exception('Error de css');
        }
    }
    
    public function setCssb(array $cssb){
        
        if(is_array($cssb) && count($cssb)){
            for($i=0;$i < count($cssb);$i++){
                $this->_cssb[] =  $this->_rutas['css']. $cssb[$i] . '.css';
            }
        }else{
            throw new Exception('Error de css');
        }
    }
    
}
    
?>
