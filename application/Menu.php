<?php

class Menu
{
    private $_acl;
    
    public function __construct() 
    {
        $this->_acl = new ACL();
    }

    public function getMenu($seccion, $categoria)
    {
        $menus = array(
            'sitio' => array(
                'principal' => array(
                    array(
                        'id' => 'inicio', 
                        'titulo' => 'Inicio', 
                        'enlace' => BASE_URL,
                        'permiso' => false
                        )
                    ),
                
                'fundacion' => array(
                    array(
                        'id' => 'noticias', 
                        'titulo' => 'Noticias', 
                        'enlace' => BASE_URL . 'fundacion/noticias',
                        'permiso' => false
                        ),
                    array(
                        'id' => 'articulos', 
                        'titulo' => 'Art&iacute;culos', 
                        'enlace' => BASE_URL . 'fundacion/articulos',
                        'permiso' => false
                        )
                    )
             ),
            
            'administracion' => array(
                    'principal' => array(
                        array(
                            'id' => 'panel',
                            'titulo' => 'Panel',
                            'enlace' => BASE_URL . 'admin',
                            'permiso' => 'admin_access'
                        ),
                        array(
                            'id' => 'personal',
                            'titulo' => 'Personal',
                            'enlace' => BASE_URL . 'personal',
                            'permiso' => 'admin_access'
                        ),                        
                        array(
                            'id' => 'usuarios',
                            'titulo' => 'Usuarios',
                            'enlace' => BASE_URL . 'usuarios',
                            'permiso' => 'admin_access'
                        ),
                        array(
                            'id' => 'acl',
                            'titulo' => 'ACL',
                            'enlace' => BASE_URL . 'acl',
                            'permiso' => 'admin_access'
                        ),
                        array(
                            'id' => 'Articulos',
                            'titulo' => 'Art&iacute;culos',
                            'enlace' => BASE_URL . 'articulos',
                            'permiso' => 'admin_access'
                        ),
                        array(
                            'id' => 'contenidos',
                            'titulo' => 'Contenidos',
                            'enlace' => BASE_URL . 'contenido',
                            'permiso' => 'admin_access'
                        )
                    )
            )
        );
        
        $result = array();
        
        // -------------------
        
        if(array_key_exists($categoria, $menus)){
            if(array_key_exists($menu, $menus[$categoria])){
                for($i = 0; $i < count($menus[$categoria][$menu]); $i++){
                    if($menus[$categoria][$menu][$i]['permiso'] == false){
                        // si el elemento permiso esta en falso no lo verifica, lo pasa 
                        $result[] = $menus[$categoria][$menu][$i];
                    }
                    else{
                        if($this->_acl->permiso($menus[$categoria][$menu][$i]['permiso'])){
                            $result[] = $menus[$categoria][$menu][$i];
                        }
                    }
                }
            }
        }
        
        // -------------------
        
        return $result;
    }
}
?>
