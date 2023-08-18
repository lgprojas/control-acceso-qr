<?php

class Bootstrap{
    
    public static function run(Request $peticion){
        
        $modulo = $peticion->getModulo();        
        $controller = $peticion->getControlador() . 'Controller';//envía la peticion de index a getControlador() en Request donde cortara de la url el controlador solicitado y lo deja en la variable controller
        if($controller == '_errorpagesController'){$controller = 'errorController';}
        //$rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';//forma ruta del controlador a llamar
        $metodo = $peticion->getMetodo();//envía la peticion a getMetodo() y rescata el metodo de la url
        $args = $peticion->getArgs();//envía la peticion a getArgs() y rescata los argumentos de la url
        
        if($modulo){
            $rutaModulo = ROOT . 'controllers' . DS . $modulo . 'Controller.php';
            
            if(is_readable($rutaModulo)){
                
                require_once $rutaModulo;
                $rutaControlador = ROOT . 'modules' . DS . $modulo . DS . 'controllers' . DS . $controller . '.php';//forma ruta del controlador a llamar

            }else{
                throw new Exception('Error de base de módulo');
            }
        }else{
            $rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';//forma ruta del controlador a llamar                 
        }
        
        
        //echo $rutaControlador;exit;//prueba si la ruta funciona bien, osea es un test
        
        if(is_readable($rutaControlador)){ //si el archivo existe y es leible
            require_once $rutaControlador;//llama la ruta del controlador
            $controller = new $controller;//instancia controlador llamado
            
            if(is_callable(array($controller, $metodo))){//si controlador tiene el metodo solicitado
                $metodo = $peticion->getMetodo();//coloca el metodo de la url en $metodo
            
            }else{
                $metodo = 'index';//en caso contrario llama al metodo por defecto 'index'
            }
            
            if(isset($args)){//si existen argumentos
                call_user_func_array(array($controller, $metodo), $args);//los pone en un array
                           
            }else{
                call_user_func(array($controller, $metodo));
            }
            
            
        }else{
            //throw new Exception('No encontrado');
            header('Location: '.BASE_URL.'error/');
            exit;
        }
    }
}
?>
