<?php

class Session{
    
    public static function init(){
        
        session_start();
    }
    
    public static function destroy($clave = false){//destruye una o varias var session
        
        if($clave){
            if(is_array($clave)){//si es un array
                for($i=0;$i<count($clave);$i++){//lo recorrera
                    if(isset($_SESSION[$clave[$i]])){//por cada coincidencia
                        unset($_SESSION[$clave[$i]]);//eliminara esa var de session
                    }
                }
            }else{//si no es un array
                if(isset($_SESSION[$clave])){//verificara esa var
                    unset($_SESSION[$clave]);//la va a destruir
                }
            }
        }else{//si no se envía var
            session_destroy();
        }
    }
    
    public static function set($clave, $valor){
        //recibir nombre variable de sesión
        if(!empty($clave)){//
            $_SESSION[$clave] = $valor;
        }
    }
    
    public static function get($clave){
        //
        if(isset($_SESSION[$clave]))
            return $_SESSION[$clave];
    }
    
    public static function acceso($level){//nivel minimo requerido de acceso
        ///
        if(!Session::get('autenticado')){
            header('location:' . BASE_URL . 'errores/index/access/5050');
            exit;
        }
        
        Session::tiempo();//verificación del tiempo de la sesión en el método
        
        if(Session::getLevel($level)> Session::getLevel(Session::get('level'))){
            //al iniciar sesión se llena la var 'level' aquí se compara con los niveles existentes
            header('location:' . BASE_URL . 'errores/index/access/5050');
            exit;
        }
    }
    
    public static function accesoView($level){
        //
        //para restringir la visualización por ejemplo de un botón
        if(!Session::get('autenticado')){
            return false;
        }
        // permite admin = 1 > 3 pero soy operador
        // permite admin = 1 > 1 pero soy admin
        if(Session::getLevel($level)> Session::getLevel(Session::get('level'))){            
            return false;
        }
        return true;
    }

    public static function getLevel($level){
        
        $role['admin'] = 1;
        $role['jefe'] = 2;
        $role['operador'] = 3;
        
        if(!array_key_exists($level, $role)){
            //si no existe level en role
            throw new Exception('Error de acceso');
        }  else {
            return $role[$level];
        }
    }
    
    public static function accesoEstricto(array $level, $noAdmin = false){
        //permite seleccionar cierto grupos de usuarios para darle permiso
        //$noAdmin grupo de los administradores
        //Para bloquear a los admins se envia true
        
        if(!Session::get('autenticado')){
             header('location:' . BASE_URL . 'errores/index/access/5050');
            exit;
        }
        
        Session::tiempo();
        
        if($noAdmin == false){//verifica si no se envió, si se envia en true no hace esta verif.
            if(Session::get('level') == 'admin'){//si es un administrador permite el acceso
                return;
            }
        }
        
        if(count($level)){//verifica el arreglo
            if(in_array(Session::get('level'), $level)){// verifica si esta en el array
                return;//si existe el level en el array retorna
            }
        }
         header('location:' . BASE_URL . 'errores/index/access/5050');
    }
    
    public static function accesoViewEstricto(array $level, $noAdmin = false){
        
        if(!Session::get('autenticado')){
             return false;
        }
        
        if($noAdmin == false){
            if(Session::get('level') == 'admin'){
                return true;
            }
        }
        
        if(count($level)){
            if(in_array(Session::get('level'), $level)){
                return true;
            }
        }
         return false;
    }
    
    public static function tiempo(){
        //controla el tiempo de la sesión de los usuarios o grupos.
        
        if (!Session::get('tiempo') || !defined('SESSION_TIME')) {//verifica si no esta definido el tiempo sesion
            throw new Exception('No se ha definido el tiempo de sesion');
        }
        
        if(SESSION_TIME == 0){// tiempo de sesión indefinida
            return;
        }
        
        if(time() - Session::get('tiempo') > (SESSION_TIME * 60)){
            Session::destroy();
            header('location:' . BASE_URL . 'errores/index/access/8080');
        }else{
            Session::set('tiempo', time());
        }
    }
    
    public static function setMensaje($mensaje){
        self::set('mensaje', $mensaje);
    }

    public static function setError($mensaje){
        self::set('error', $mensaje);
    }    
}
?>
