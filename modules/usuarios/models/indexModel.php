<?php
//listar los usuario y poner un enlace hacia los permisos de usuario

class indexModel extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getNomEmpresaUsu($empresa=false){
        
        $id = $this->_db->query("SELECT Nom_empresa AS Nom 
                                    FROM empresa 
                                    WHERE Id_empresa = $empresa 
                                ");
        $sql = $id->fetch(PDO::FETCH_ASSOC);
        return $sql['Nom'];
    }
    
    public function getUsuarios($empresa=false, $cond=''){
        
        $usuario = $this->_db->query(
                "SELECT u.Id_usu,
                    CAST(AES_DECRYPT(Nom_usu,'".ENCRYPT_KEY."')AS char(100)) AS Nom_usu,
                    u.Id_role,                    
                    Id_estusu,
                    Nom_role
                 FROM usuario u
                 LEFT JOIN role r ON (r.Id_role=u.Id_role)
                 LEFT JOIN empleado e ON(e.Id_emp=u.Id_emp)
                 WHERE e.Id_emp = u.Id_emp
                 $cond 
                 AND u.Id_empresa = $empresa
                 AND u.Id_role NOT IN (1)
                 GROUP BY u.Id_usu ASC , Nom_usu ASC 
                 ");
                return $usuario->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUsuariosG(){
        
        $usuario = $this->_db->query(
                "SELECT u.*,Nom_role
                 FROM usuario u
                 LEFT JOIN role r ON (r.Id_role=u.Id_role)
                 WHERE u.Id_role NOT IN (1,2,3)
                 ");
                return $usuario->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getDatosUsuario($usuarioID){
        
        $usuario = $this->_db->query(
                "SELECT em.Id_emp,
                       CAST(AES_DECRYPT(Rut_emp,'".ENCRYPT_KEY."')AS char(100)) AS Rut_emp,
                       CAST(AES_DECRYPT(Nom1_emp,'".ENCRYPT_KEY."')AS char(100)) AS Nom1_emp,
                       CAST(AES_DECRYPT(Nom2_emp,'".ENCRYPT_KEY."')AS char(100)) AS Nom2_emp,
                       CAST(AES_DECRYPT(Ape1_emp,'".ENCRYPT_KEY."')AS char(100)) AS Ape1_emp,
                       CAST(AES_DECRYPT(Ape2_emp,'".ENCRYPT_KEY."')AS char(100)) AS Ape2_emp,
                       u.Id_usu,
                       CAST(AES_DECRYPT(Rut_usu,'".ENCRYPT_KEY."')AS char(100)) AS Rut_usu,
                       CAST(AES_DECRYPT(Nom_usu,'".ENCRYPT_KEY."')AS char(100)) AS Nom_usu,
                       CAST(AES_DECRYPT(Usu_usu,'".ENCRYPT_KEY."')AS char(100)) AS Usu_usu,
                       CAST(AES_DECRYPT(Email_usu,'".ENCRYPT_KEY."')AS char(100)) AS Email_usu,
                       u.Id_role,
                       u.Id_estusu,
                       r.*,
                       e.*
                FROM usuario u 
                LEFT JOIN empleado em ON (em.Id_emp=u.Id_emp) 
                LEFT JOIN role r ON (u.Id_role=r.Id_role) 
                LEFT JOIN est_usu e ON (u.Id_estusu=e.Id_estusu)
                WHERE u.Id_usu= $usuarioID"
                );
                return $usuario->fetch();
    }
    
    public function getPers($cond = false, $relusu = false){
        
        $pers = $this->_db->query(
                "SELECT Id_emp,
                       CAST(AES_DECRYPT(Rut_emp,'".ENCRYPT_KEY."')AS char(100)) AS Rut_emp,
                       CAST(AES_DECRYPT(Nom1_emp,'".ENCRYPT_KEY."')AS char(100)) AS Nom1_emp,
                       CAST(AES_DECRYPT(Nom2_emp,'".ENCRYPT_KEY."')AS char(100)) AS Nom2_emp,
                       CAST(AES_DECRYPT(Ape1_emp,'".ENCRYPT_KEY."')AS char(100)) AS Ape1_emp,
                       CAST(AES_DECRYPT(Ape2_emp,'".ENCRYPT_KEY."')AS char(100)) AS Ape2_emp 
                FROM empleado
                WHERE Id_emp NOT IN (SELECT Id_emp FROM usuario)
                ");
                return $pers->fetchAll();        
    }
    
    public function getAllRole(){

        $per = $this->_db->query(
                "SELECT Id_role,
                        Nom_role               
                FROM role         
                WHERE Id_role NOT IN (1,2)
                ");
                return $per->fetchAll();
    }
    
    public function getRolesG(){
        
        $roles = $this->_db->query(
                "SELECT * FROM role WHERE Id_role NOT IN (1,2,3)"
                );
                return $roles->fetchAll();
    }
    
    public function getEstUsu(){
        
        $est = $this->_db->query(
                "select * from est_usu"
                );
                return $est->fetchAll();        
    }
    
    public function editUsuarioEmp(
                                $idu=false,
                                $rut=false,
                                $nom=false,
                                $usu=false,
                                $email=false,
                                $rol=false,
                                $est=false
                                ){
//        
//        $this->_db->prepare("SET @urut = :rut")
//        ->execute(array(
//            ':rut' => Session::get('rut_usu')
//            ));
//        
         $id = (int) $idu;
        $this->_db->prepare(
                "UPDATE usuario 
                SET Rut_usu = AES_ENCRYPT(:rut, '".ENCRYPT_KEY."'),
                    Nom_usu = AES_ENCRYPT(:nom, '".ENCRYPT_KEY."'),
                    Usu_usu = AES_ENCRYPT(:usu, '".ENCRYPT_KEY."'),  
                    Email_usu = AES_ENCRYPT(:email, '".ENCRYPT_KEY."'),
                    Id_role = :rol, 
                    Id_estusu = :est
                WHERE Id_usu = :id
                ")->execute(array(
            ':id' => $id,
            ':rut' => $rut,
            ':nom' => $nom,
            ':usu' => $usu,
            ':email' => $email,
            ':rol' => $rol,
            ':est' => $est
                    
        ));
    }
    
        public function editPassUsuarioEmp(
                                $idu=false,
                                $pass=false
                                ){
//        
//        $this->_db->prepare("SET @urut = :rut")
//        ->execute(array(
//            ':rut' => Session::get('rut_usu')
//            ));
//        
         $id = (int) $idu;
        $this->_db->prepare(
                "UPDATE usuario 
                SET                  
                    Pass_usu = :pass 
                WHERE Id_usu = :id
                ")->execute(array(
            ':id' => $id,
            ':pass' => Hash::getHash('sha1', $pass, HASH_KEY)
        ));
    }

    //permisos usuario emp
    public function getPermisosUsuarioEmp($usuarioID=false){

        $acl = new ACL($usuarioID,1);
        return $acl->getPermisos();//devolverá los permisos de este usuario que enviemos($usuarioID)
    }
    
    public function getPermisosRoleEmp($usuarioID=false){
        
        $acl = new ACL($usuarioID,1);
        return $acl->getPermisosRole();
    }
    
    public function eliminarPermiso($usuarioID=false, $permisoID=false){
        
        $this->_db->query(
                "delete from usuario_permiso where " .
                "Id_usu = $usuarioID and Id_perm = $permisoID"
                );
    }
    
    public function editarPermiso($usuarioID=false, $permisoID=false, $valor=false){
        
         $this->_db->query(
                "replace into usuario_permiso set " .
                "Id_usu = $usuarioID , Id_perm = $permisoID , Valor_perm_usu = '$valor'"
                );
    }
    
    public function elimUsuario($usuarioID=false){
        
        $this->_db->prepare("SET @urut = :rut")
        ->execute(array(
            ':rut' => Session::get('rut_usu')
            ));
        
        $this->_db->query(
                "DELETE FROM usuario WHERE " .
                "Id_usu = $usuarioID AND Id_role NOT IN (1,2) "
                );
    }
}
    
?>
