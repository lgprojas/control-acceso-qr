<?php

class ACL{
    
    private $_db;//guardamos un objeto de la BD
    private $_id;//guardamos la id del usuario para lista de acceso
    private $_role;//guardamos el role con el cual estamos trabajando
    private $_permisos;//permisos ya procesados
    
    //si se desea trabajar con usuario en particular
    public function __construct($id = false) {
        if ($id){
            $this->_id = (int) $id;
        }else{
            if(Session::get('id_usuario')){//si hay inicio de sesión de usuario
                $this->_id = Session::get('id_usuario');//el id se va establecer en el valor
            }else{
                $this->_id = 0;//acceso restringido = 0 
            }
        } 
        
        $this->_db = new Database();
        $this->_role = $this->getRole();//lo llenamos con el construct
        $this->_permisos = $this->getPermisosRole();
        $this->compilarAcl();
    }
    
    public function compilarAcl(){
        //convina los arreglos de los permisos del role con los permisos de usuario
        
        //array_merge: toma el $this->_permiso el cual fue llenado en el constructor con los permisos del role
        //va sustituir los valores del arreglo del role con valores del arreglo del usuario
        //todas las claves en el arreglo role van a ser sustituida por los permisos del usuario
     $this->_permisos = array_merge($this->_permisos, $this->getPermisosUsuario());
        
    }


    public function getRole(){
        //devuelve el role del id que inicia sesión
        $sql = $this->_db->query(
                "select Id_role from usuario " .
                "where Id_usu = {$this->_id}"
                );
        $role = $sql->fetch();
        return $role['Id_role'];
    }
    
    public function getPermisosRoleId(){
        //devuelve los ids permisos relacionados con el role
        $sql =  $this->_db->query(
                "select Id_perm from role_permiso " .
                "where Id_role = '{$this->_role}'"
                );
       $ids = $sql->fetchAll(PDO::FETCH_ASSOC);
       
       $id = array();
       //creando un arreglo indexado con todos los ids permisos 
       //de la tabla permisos_role con relacionados al Id_role
       for($i =0; $i < count($ids); $i++){
           $id[] = $ids[$i]['Id_perm'];
       }
       return $id;
    }
    
    public function getPermisosRole(){
        //devuelve los permisos del role ya procesados
        //creamos un arreglo con información de permisos habilitados, si es heredado, etc.
        $sql = $this->_db->query(
                "select * from role_permiso " .
                "where Id_role = '{$this->_role}'"
                );
                
        $permisos = $sql->fetchAll(PDO::FETCH_ASSOC);
        $data = array();
        
        for($i = 0; $i < count($permisos); $i++){
          
            $key = $this->getPermisoKey($permisos[$i]['Id_perm']);
            if($key == ''){continue;}//en el caso que campo este vacio y no vaya hacer un hoyo en la seguridad
            
            if($permisos[$i]['Valor_perm_role'] == 1){
                $v = true;
            }else{
                $v = false;
            }
            
            $data[$key] = array( // arreglo asociativo con los mismos nombre de las llaves de los permisos
            'key' => $key,
            'permiso' => $this->getPermisoNombre($permisos[$i]['Id_perm']),
            'valor' => $v,
            'heredado' => true, //usado para saber si el usuario esta utilizando un permiso heredado del role o directamente desde la tabla permisos_usuario
            'id' => $permisos[$i]['Id_perm']
                );
            //echo "<pre>"; print_r($data); echo "</pre>";exit;
        }
        
        return $data;//retornamos $data, contiene los permisos del ROLE****
    }
    
    public function getPermisoKey($permisoID){//devuelve el campo Id_key aa_aa
        $permisoID = (int) $permisoID;

            $sql = $this->_db->query(
                    "select Key_perm from permiso " .
                    "where Id_perm = $permisoID"
                    );
            $key = $sql->fetch(PDO::FETCH_ASSOC);
            return $key['Key_perm']; //retorna la llave(campo Id_key) del permiso que pedimos

    }
    
    public function getPermisoNombre($permisoID){//devuelve el campo Id_key aa_aa
        $permisoID = (int) $permisoID;
        
        $sql = $this->_db->query(
                "select Nom_perm from permiso " .
                "where Id_perm = {$permisoID}"
                );
        $key = $sql->fetch(PDO::FETCH_ASSOC);
        return $key['Nom_perm']; //retorna la llave(campo Id_key) del permiso que pedimos

    }
    
    public function getPermisosUsuario(){
        
        $ids = $this->getPermisosRoleId();//guardamos el array que contiene todos los id de permisos par ale Role del usuario
        
        if(count($ids)){//verificamos se contiene para que no de error en la query
        // buscamos los permisos que tiene asignado el usuario
        $sql = $this->_db->query(
                "select * from usuario_permiso " .
                "where Id_usu = {$this->_id} " .
                "and Id_perm in (" . implode(",", $ids) . ")"//implode pondrá los ids separados por coma entre las ""
                );//traera todos los permisos disponibles para ese usuario
        
        $permisos = $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $permisos = array();
        }
        //hará lo mismo que $data de getPermisosRole()
        //diferencia que traera el valor del usuario
        $data = array();
        
        for($i=0;$i<count($permisos);$i++){
          
            $key = $this->getPermisoKey($permisos[$i]['Id_perm']);
            if($key == ''){continue;}//en el caso que campo este vacio y no vaya hacer un hoyo en la seguridad
            
            if($permisos[$i]['Valor_perm_usu'] == 1){
                $v = true;
            }else{
                $v = false;
            }
            
            $data[$key] = array( // arreglo asociativo con los mismos nombre de las llaves de los permisos
            'key' => $key,
            'permiso' => $this->getPermisoNombre($permisos[$i]['Id_perm']),
            'valor' => $v,
            'heredado' => false, //usado para saber si el usuario esta utilizando un permiso heredado del role o directamente desde la tabla permisos_usuario
            'id' => $permisos[$i]['Id_perm']
                );
        }
        
        return $data;
    }
    
    public function getPermisos(){
        
        if(isset($this->_permisos) && count($this->_permisos))
            return $this->_permisos;
    }
    
    public function permiso($key){
        //utilizarlo en las vistas para tomar decisiones de acuerdo a si un usuario
        //si tiene cierto permiso o no lo tiene
        if(array_key_exists($key, $this->_permisos)){
            if($this->_permisos[$key]['valor'] == true || $this->_permisos[$key]['valor'] == 1){
                return true;
            }
        }
        
        return false;
    }
    
    public function acceso($key){
        // acceso($key, $codigoParaErrores)
        //utilizado en los controladores
        if($this->permiso($key)){
            Session::tiempo();//comienza a correr tiempo sesion
            return;
        }
        
        header("location:" . BASE_URL . "errores/index/access/5050");
        exit;//Corta el run para no ejecutar el método
    }
            
}
?>