<?php

class gestoresModel extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getGestores(){

        $sj = $this->_db->query("SELECT Id_usu,
                                CAST(AES_DECRYPT(Rut_usu,'".ENCRYPT_KEY."')AS char(100)) AS Rut_usu,
                                CAST(AES_DECRYPT(Nom_usu,'".ENCRYPT_KEY."')AS char(100)) AS Nom_usu, 
                                Nom_role,
                                Id_estusu       
                                FROM usuario u
                                LEFT JOIN role r ON (r.Id_role = u.Id_role)
                                WHERE u.Id_role NOT IN (1,2)
                                ORDER BY Nom_usu ASC");
                return $sj->fetchAll();
    }
    
    public function verSiPoseeCli($idusu = false){
        
        $id = (int) $idusu;
        $paraB = $this->_db->query("SELECT Id_usu
                                    FROM usuario
                                    WHERE Id_usu = $id
                                        AND Id_usu 
                                            IN (
                                                SELECT Id_usu 
                                                FROM usuario_cliente
                                                WHERE Id_usu = $id
                                                )
                                    ");
        if ($paraB->rowCount() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function getAllPerGest(){
        
        $pers = $this->_db->query(
                "SELECT Id_emp,
                       CAST(AES_DECRYPT(Rut_emp,'".ENCRYPT_KEY."')AS char(100)) AS Rut_emp,
                       CAST(AES_DECRYPT(Nom1_emp,'".ENCRYPT_KEY."')AS char(100)) AS Nom1_emp,
                       CAST(AES_DECRYPT(Nom2_emp,'".ENCRYPT_KEY."')AS char(100)) AS Nom2_emp,
                       CAST(AES_DECRYPT(Ape1_emp,'".ENCRYPT_KEY."')AS char(100)) AS Ape1_emp,
                       CAST(AES_DECRYPT(Ape2_emp,'".ENCRYPT_KEY."')AS char(100)) AS Ape2_emp 
                FROM empleado                
                WHERE Id_emp NOT IN (SELECT Id_emp FROM usuario)
                AND Id_emp NOT IN (1,2)
                ");
                return $pers->fetchAll();        
    }
    
    public function getAllRolesGest(){
        
        $sql = $this->_db->query("SELECT * 
                                FROM role 
                                WHERE Id_role = 3
                                ORDER BY Id_role ASC");
        return $sql->fetchAll();
    }
    
    public function getAllEstGest(){
        
        $sql = $this->_db->query("SELECT * 
                                FROM est_usu
                                ORDER BY Id_estusu ASC");
        return $sql->fetchAll();
    }
    
    public function verificarUsuarioGestor($usuario = false){
        //verifica si ya existe el usuario en la base de datos
        $id = $this->_db->query(
                        "SELECT Id_usu, 
                                Cod_usu 
                        FROM usuario 
                        WHERE Usu_usu = AES_ENCRYPT('$usuario', '".ENCRYPT_KEY."')"
                );
        return $id->fetch();
    }
    
    public function verificarEmailGestor($email = false){
        //verifica si ya existe el usuario en la base de datos
        $id = $this->_db->query(
                        "SELECT Id_usu 
                        FROM usuario 
                        WHERE Email_usu = AES_ENCRYPT('$email', '".ENCRYPT_KEY."')"
                );
        return $id->fetch();
    }
    
        public function registrarUsuarioGestor(
                                                $run, 
                                                $nombre, 
                                                $usuario, 
                                                $password, 
                                                $email=false, 
                                                $role=false, 
                                                $estusu=false, 
                                                $emp=false
                                               ){
        
        $random = (int) rand(1787108629, 9999999999);
        
        $this->_db->prepare(
                "INSERT INTO usuario VALUES" . 
                "(NULL, 
                   AES_ENCRYPT(:Rut_usu, '".ENCRYPT_KEY."'), 
                   AES_ENCRYPT(:Nom_usu, '".ENCRYPT_KEY."'),                   
                   :Pass_usu, 
                   AES_ENCRYPT(:Usu_usu, '".ENCRYPT_KEY."'),
                   AES_ENCRYPT(:Email_usu, '".ENCRYPT_KEY."'),
                   :Cod_usu,
                   :Id_role, 
                   :Id_estusu,
                   :Id_activar,
                   :Id_emp)"
                )
                ->execute(array(
                    ':Rut_usu' => $run,                    
                    ':Nom_usu' => $nombre,
                    ':Pass_usu' => Hash::getHash('sha1', $password, HASH_KEY),
                    ':Usu_usu' => $usuario,
                    ':Email_usu' => $email,
                    ':Cod_usu' => $random,
                    ':Id_role' => $role,
                    ':Id_estusu' => $estusu,
                    ':Id_activar' => 2,
                    ':Id_emp' => $emp
                ));
    }
    
    public function activarGestor($id, $codigo){
        
        $this->_db->query(
                "UPDATE usuario SET Id_activar = 1 " .
                "WHERE Id_usu = $id AND Cod_usu = '$codigo'"
                );
    }
    
    public function getUsuarioGestor($id, $codigo){
        
        $usuario = $this->_db->query(
                "SELECT * 
                 FROM usuario c 
                 WHERE Id_usu = $id 
                   AND Cod_usu = '$codigo'"
                );
        return $usuario->fetch();// devuelve los datos en un array
    }
//------------------------------------------------------------------------------    
//Permisos gestor
    public function eliminarPermisoGestor($usuarioID=false, $permisoID=false){
        
        $this->_db->query(
                "delete from usuario_permiso where " .
                "Id_usu = $usuarioID and Id_perm = $permisoID"
                );
    }
    
    public function editarPermisoGestor($usuarioID=false, $permisoID=false, $valor=false){
        
         $this->_db->query(
                "replace into usuario_permiso set " .
                "Id_usu = $usuarioID , Id_perm = $permisoID , Valor_perm_usu = '$valor'"
                );
    }
    
    public function getPermisosUsuarioGestor($usuarioID=false){
        
        $acl = new ACL($usuarioID);
        return $acl->getPermisos();//devolverá los permisos de este usuario que enviemos($usuarioID)
    }
    
    public function getPermisosRoleGestor($usuarioID=false){
        
        $acl = new ACL($usuarioID);
        return $acl->getPermisosRole();
    }
    
    public function getDatosUsuarioGestor($usuarioID){
        
        $usuario = $this->_db->query(
                "SELECT p.Id_emp,
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
                LEFT JOIN empleado p ON (p.Id_emp=u.Id_emp) 
                LEFT JOIN role r ON (u.Id_role=r.Id_role) 
                LEFT JOIN est_usu e ON (u.Id_estusu=e.Id_estusu)
                WHERE u.Id_usu= $usuarioID"
                );
                return $usuario->fetch();
    }
//------------------------------------------------------------------------------
//Asignar Condominio
    
    public function getDatosGestor($id = false) {
        
        $dl = $this->_db->query("SELECT CAST(AES_DECRYPT(Nom_usu,'".ENCRYPT_KEY."')AS char(100)) AS Nom_usu, 
                                    Nom_role
                                    FROM usuario u
                                    LEFT JOIN role r ON (r.Id_role = u.Id_role)
                                    WHERE Id_usu = $id"
                                   );
        return $dl->fetch();
    }

//------------------------------------------------------------------------------

    public function getDatosUsuGestor($usuarioID){
        
        $usuario = $this->_db->query(
                "SELECT p.Id_emp,
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
                LEFT JOIN empleado p ON (p.Id_emp=u.Id_emp) 
                LEFT JOIN role r ON (u.Id_role=r.Id_role) 
                LEFT JOIN est_usu e ON (u.Id_estusu=e.Id_estusu)
                WHERE u.Id_usu= $usuarioID"
                );
                return $usuario->fetch();
    }
    
    public function editUsuGestor(
                                    $idu=false,
                                    $rut=false,
                                    $nom=false,
                                    $usu=false,
                                    $pass=false,
                                    $email=false,
                                    $rol=false,
                                    $est=false,
                                    $per=false
                                 ){
        
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
                    Pass_usu = :pass, 
                    Email_usu = AES_ENCRYPT(:email, '".ENCRYPT_KEY."'),
                    Id_role = :rol, 
                    Id_estusu = :est,
                    Id_emp = :emp
                WHERE Id_usu = :id
                ")->execute(array(
            ':id' => $id,
            ':rut' => $rut,
            ':nom' => $nom,
            ':usu' => $usu,
            ':pass' => Hash::getHash('sha1', $pass, HASH_KEY),
            ':email' => $email,
            ':rol' => $rol,
            ':est' => $est,
            ':emp' => $per
                    
        ));
    }
    
    public function elimUsuGestor($usuarioID=false){
        
//        $this->_db->prepare("SET @urut = :rut")
//        ->execute(array(
//            ':rut' => Session::get('rut_usu')
//            ));
//        
        $this->_db->query(
                "DELETE FROM usuario WHERE " .
                "Id_usu = $usuarioID and Id_role = 3"
                );
    }
}
?>
