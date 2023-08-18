<?php

class aclModel extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getRole($roleID){
        
        $role = $this->_db->query("select * from role where Id_role=$roleID");
        return $role->fetch();
    }
    
    public function getRoles(){
       
        $role = $this->_db->query("select * from role");
        return $role->fetchAll();
    }
    
    public function getPermisosAll(){
        
        $permisos = $this->_db->query("SELECT * FROM permiso ORDER BY Nom_perm ASC");
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        
        for($i=0; $i<count($permisos); $i++){
            if($permisos[$i]['Key_perm']==''){continue;}
            $data[$permisos[$i]['Key_perm']] = array(
                'key' => $permisos[$i]['Key_perm'],
                'valor' => 'x',
                'nombre' => $permisos[$i]['Nom_perm'],
                'id' => $permisos[$i]['Id_perm']
            );
        }
        
        return $data;
    }
    
    public function getPermisosRole($roleID){
        
        $data = array();
        $permisos = $this->_db->query("SELECT * 
               FROM role_permiso rp
               LEFT JOIN permiso p ON (p.Id_perm = rp.Id_perm)
               WHERE Id_role = $roleID  
               ORDER BY Nom_perm ASC ");
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        
        for($i=0; $i<count($permisos); $i++){
            $key = $this->getPermisoKey($permisos[$i]['Id_perm']);
            
            if($key == ''){continue;}
            
            if($permisos[$i]['Valor_perm_role'] == 1){
                $v = 1;
            }else{
                $v = 0;
            }
            $data[$key] = array(
                'key' => $key,
                'valor' => $v,
                'nombre' => $this->getPermisoNombre($permisos[$i]['Id_perm']),
                'id' => $permisos[$i]['Id_perm']
            );
        }
        
        //los permisos que tengan valor x y que existan para el role($data[$key]) se van a sustituir con $v
        //indicando si estan habilitados o denegados con array_merge
        //array_merge hace una suma de los array y si existe coincidencia en las llaves sustituye
        $data = array_merge($this->getPermisosAll(), $data);
        return $data;
    }
    
    public function eliminarPermisoRole($roleID, $permisoID){
        
        $this->_db->query("delete from role_permiso " .
                          "where Id_role=$roleID and Id_perm=$permisoID");
                
    }
    
    public function editarPermisoRole($roleID, $permisoID, $valor){
        
        $this->_db->query("replace into role_permiso " .
                          "set Id_role=$roleID, Id_perm=$permisoID, Valor_perm_role='$valor'");
    }
    
    public function getPermisoKey($permisoID){//devuelve el campo Id_key aa_aa
        $permisoID = (int) $permisoID;
        
        $key = $this->_db->query(
                "select Key_perm from permiso " .
                "where Id_perm = {$permisoID}"
                );
        $key = $key->fetch();
        return $key['Key_perm']; //retorna la llave(campo Id_key) del permiso que pedimos
    }
    
    public function getPermisoNombre($permisoID){//devuelve el campo Id_key aa_aa
        $permisoID = (int) $permisoID;
        
        $key = $this->_db->query(
                "select Nom_perm from permiso " .
                "where Id_perm = {$permisoID}"
                );
        $key = $key->fetch();
        return $key['Nom_perm']; //retorna la llave(campo Id_key) del permiso que pedimos
    }
    
    public function insertarRole($role){
        
        $this->_db->query("INSERT INTO role VALUES (null, '{$role}')");
        
    }
    
    public function editarRole($id, $nombre){
        
        $id = (int) $id;
        $this->_db->prepare("UPDATE role SET Nom_role = :nombre WHERE Id_role = :id")
        ->execute(array(
            ':id' => $id,
            ':nombre' => $nombre
        ));
    }

//-----------------------------------------------------------------------------    
     public function getPermisos(){
       
        $permisos = $this->_db->query("SELECT * FROM permiso ORDER BY Nom_perm ASC ");
        return $permisos->fetchAll();
    }
    
    public function getPermiso($id){
       
        $id = (int) $id;
        $permisos = $this->_db->query("select * from permiso where Id_perm={$id}");
        return $permisos->fetch();
    }
    
    public function insertarPermiso($permiso, $key){
        
        $this->_db->query("INSERT INTO permiso VALUES (null, '{$permiso}', '{$key}')");
        
    }
    
    public function editarPermiso($id, $nombre, $key){
        
        $id = (int) $id;
        $this->_db->prepare("UPDATE permiso SET Nom_perm = :nombre, Key_perm = :key WHERE Id_perm = :id")
        ->execute(array(
            ':id' => $id,
            ':nombre' => $nombre,
            ':key' => $key
        ));
    }
}
?>
