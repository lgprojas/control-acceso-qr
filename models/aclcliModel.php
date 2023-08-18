<?php

class aclcliModel extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getRoleCli($roleID){
        
        $role = $this->_db->query("select * from rolecli where Id_rolecli=$roleID");
        return $role->fetch();
    }
    
    public function getRolesCli(){
       
        $role = $this->_db->query("select * from rolecli");
        return $role->fetchAll();
    }
    
    public function getPermisosAllCli(){
        
        $permisos = $this->_db->query("SELECT * FROM permisocli ORDER BY Nom_permcli ASC");
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        
        for($i=0; $i<count($permisos); $i++){
            if($permisos[$i]['Key_permcli']==''){continue;}
            $data[$permisos[$i]['Key_permcli']] = array(
                'key' => $permisos[$i]['Key_permcli'],
                'valor' => 'x',
                'nombre' => $permisos[$i]['Nom_permcli'],
                'id' => $permisos[$i]['Id_permcli']
            );
        }
        
        return $data;
    }
    
    public function getPermisosRoleCli($roleID){
        
        $data = array();
        $permisos = $this->_db->query("SELECT * 
               FROM rolecli_permiso rp
               LEFT JOIN permisocli p ON (p.Id_permcli = rp.Id_permcli)
               WHERE Id_rolecli = $roleID  
               ORDER BY Nom_permcli ASC ");
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        
        for($i=0; $i<count($permisos); $i++){
            $key = $this->getPermisoKeyCli($permisos[$i]['Id_permcli']);
            
            if($key == ''){continue;}
            
            if($permisos[$i]['Valor_perm_rolecli'] == 1){
                $v = 1;
            }else{
                $v = 0;
            }
            $data[$key] = array(
                'key' => $key,
                'valor' => $v,
                'nombre' => $this->getPermisoNombreCli($permisos[$i]['Id_permcli']),
                'id' => $permisos[$i]['Id_permcli']
            );
        }
        
        //los permisos que tengan valor x y que existan para el role($data[$key]) se van a sustituir con $v
        //indicando si estan habilitados o denegados con array_merge
        //array_merge hace una suma de los array y si existe coincidencia en las llaves sustituye
        $data = array_merge($this->getPermisosAllCli(), $data);
        return $data;
    }
    
    public function existePermisoRoleCli($roleID,$permID){
        
        $sql = $this->_db->query("SELECT Id_permcli 
                                   FROM rolecli_permiso 
                                   WHERE Id_rolecli=$roleID
                                       AND Id_permcli=$permID
                                  ");
        return $sql->fetch();
    }
    
    public function insertarPermisoRoleCli($roleID, $permisoID, $valor){
        
        $this->_db->query("INSERT INTO rolecli_permiso 
                           VALUES ('{$roleID}', '{$permisoID}', '{$valor}')
            ");
        
    }
    
    public function eliminarPermisoRoleCli($roleID, $permisoID){
        
        $this->_db->query("delete from rolecli_permiso " .
                          "where Id_rolecli=$roleID and Id_permcli=$permisoID");
                
    }
    
    public function editarPermisoRoleCli($roleID, $permisoID, $valor){
        
        $this->_db->query("UPDATE rolecli_permiso 
                          SET Valor_perm_rolecli='$valor'
                          WHERE Id_rolecli=$roleID AND Id_permcli=$permisoID    
                ");
    }
    
    public function getPermisoKeyCli($permisoID){//devuelve el campo Id_key aa_aa
        $permisoID = (int) $permisoID;
        
        $key = $this->_db->query(
                "select Key_permcli from permisocli " .
                "where Id_permcli = {$permisoID}"
                );
        $key = $key->fetch();
        return $key['Key_permcli']; //retorna la llave(campo Id_key) del permiso que pedimos
    }
    
    public function getPermisoNombreCli($permisoID){//devuelve el campo Id_key aa_aa
        $permisoID = (int) $permisoID;
        
        $key = $this->_db->query(
                "select Nom_permcli from permisocli " .
                "where Id_permcli = {$permisoID}"
                );
        $key = $key->fetch();
        return $key['Nom_permcli']; //retorna la llave(campo Id_key) del permiso que pedimos
    }
    
    public function insertarRoleCli($role){
        
        $this->_db->query("INSERT INTO rolecli VALUES (null, '{$role}')");
        
    }
    
    public function editarRoleCli($id, $nombre){
        
        $id = (int) $id;
        $this->_db->prepare("UPDATE rolecli SET Nom_rolecli = :nombre WHERE Id_rolecli = :id")
        ->execute(array(
            ':id' => $id,
            ':nombre' => $nombre
        ));
    }

//-----------------------------------------------------------------------------    
     public function getPermisosCli(){
       
        $permisos = $this->_db->query("SELECT * FROM permisocli ORDER BY Nom_permcli ASC ");
        return $permisos->fetchAll();
    }
    
    public function getPermisoCli($id){
       
        $id = (int) $id;
        $permisos = $this->_db->query("select * from permisocli where Id_permcli={$id}");
        return $permisos->fetch();
    }
    
    public function insertarPermisoCli($permiso, $key){
        
        $this->_db->query("INSERT INTO permisocli VALUES (null, '{$permiso}', '{$key}')");
        
    }
    
    public function editarPermisoCli($id, $nombre, $key){
        
        $id = (int) $id;
        $this->_db->prepare("UPDATE permisocli SET Nom_permcli = :nombre, Key_permcli = :key WHERE Id_permcli = :id")
        ->execute(array(
            ':id' => $id,
            ':nombre' => $nombre,
            ':key' => $key
        ));
    }
}
?>
