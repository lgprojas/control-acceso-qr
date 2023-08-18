<?php

class registroModel extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function verificarUsuario($usuario = false){
        //verifica si ya existe el usuario en la base de datos
        $id = $this->_db->query(
                        "SELECT Id_usu, 
                                Cod_usu 
                        FROM usuario 
                        WHERE Usu_usu = AES_ENCRYPT('$usuario', '".ENCRYPT_KEY."')"
                );
        return $id->fetch();
    }
    
    public function verificarEmail($email = false){
        //verifica si ya existe el usuario en la base de datos
        $id = $this->_db->query(
                        "SELECT Id_usu 
                        FROM usuario 
                        WHERE Email_usu = AES_ENCRYPT('$email', '".ENCRYPT_KEY."')"
                );
        return $id->fetch();
    }

    public function getDatosEmpRegistro($emp=false,$entidad=false){
       
        $u = $this->_db->query("
            SELECT Rut_emp, Nom_emp
            FROM empleado 
            WHERE Id_emp = $emp
                AND Id_entidad = $entidad
                ");
        
        $u->setFetchMode(PDO::FETCH_ASSOC);
        return $u->fetch();
    }
    
    public function registrarUsuario($run, 
                                    $nombre, 
                                    $usuario, 
                                    $password, 
                                    $email, 
                                    $role, 
                                    $emp, 
                                    $entidad=1
                                    ){

        $random = rand(111111111, 999999999);
        
//        $this->_db->prepare("SET @urut = :rut")
//        ->execute(array(
//            ':rut' => Session::get('rut_usu')
//            ));
        
        $this->_db->prepare(
                "INSERT INTO usuario VALUES" . 
                "(null, 
                   AES_ENCRYPT(:Rut_usu, '".ENCRYPT_KEY."'), 
                   AES_ENCRYPT(:Nom_usu, '".ENCRYPT_KEY."'),
                   AES_ENCRYPT(:Usu_usu, '".ENCRYPT_KEY."'),                   
                   :Pass_usu, 
                   AES_ENCRYPT(:Email_usu, '".ENCRYPT_KEY."'),
                   NOW(),
                   :Cod_usu,                   
                   :Id_role, 
                   :Id_estusu,
                   :Id_activar,
                   :Id_emp, 
                   :Id_entidad
                   )")
                ->execute(array(
                    ':Rut_usu' => $run,                    
                    ':Nom_usu' => $nombre,
                    ':Usu_usu' => $usuario,
                    ':Pass_usu' => Hash::getHash('sha1', $password, HASH_KEY),
                    ':Email_usu' => $email,
                    ':Cod_usu' => $random,
                    ':Id_role' => $role,
                    ':Id_estusu' => 2,
                    ':Id_activar' => 2,
                    ':Id_emp' => $emp,
                    ':Id_entidad' => $entidad
                ));
    }
    
    //Emailing Activar cuenta
    public function getEmailUsuActivar($id=false){
        
        $sql = $this->_db->query("
        SELECT 
        CAST(AES_DECRYPT(Email_emp,'".ENCRYPT_KEY."')AS char(150)) AS Email
        FROM usuario u
        LEFT JOIN empleado e ON (e.Id_emp=u.Id_emp)
        WHERE Id_usu = $id
                                ");
        $sq= $sql->fetch(PDO::FETCH_ASSOC);
        return $sq['Email'];
    }
    
    public function getDatosUsuToEmailActivar($idemp=false){
        
        $id = (int) $idemp;
        $sql = $this->_db->query("
        SELECT Nom_emp         
        FROM usuario u
        LEFT JOIN empleado e ON (e.Id_emp=u.Id_emp)
        WHERE Id_usu = $id
                                ");
        return $sql->fetch();
        
    }
    
    public function getUsuarioRegistrado($id = false, $codigo = false){
        
        $usuario = $this->_db->query(
                                "SELECT * 
                                 FROM usuario c 
                                 WHERE Id_usu = $id 
                                   AND Cod_usu = '$codigo'"
                );
        return $usuario->fetch();// devuelve los datos en un array
    }
    
    public function activarUsuario($id, $codigo){
        
        $this->_db->query(
                "UPDATE usuario SET Id_estusu = 1, Id_activar = 1 " .
                "WHERE Id_usu = $id AND Cod_usu = '$codigo'"
                );
    }
    
    public function getAllEmp(){

        $per = $this->_db->query(
                "SELECT *                    
                FROM empleado
                WHERE Id_emp NOT IN (SELECT Id_emp FROM usuario)
                ");
                return $per->fetchAll();
    }
    
    public function getAllPerJson($cond = false, $relusu=0){

        $per = $this->_db->query(
                "SELECT *                  
                FROM empleado
                WHERE Id_emp NOT IN (SELECT Id_emp FROM usuario)
                ");
                return $per->fetchAll();
    }
    
    public function getAllRJson($confcond=false){

        $per = $this->_db->query(
                "SELECT Id_role AS a,
                        Nom_role AS b               
                FROM role
                WHERE Id_role NOT IN ($confcond)                   
                ");
                return $per->fetchAll();
    }
    
    public function getAllRoles(){
        
        $roles = $this->_db->query(
                "SELECT * 
                 FROM role
                 WHERE Id_role NOT IN (1,2)
                 ");
                return $roles->fetchAll();
    }
    
    public function getAllRolesG(){
        
        $roles = $this->_db->query(
                "SELECT * FROM role WHERE Id_role NOT IN (1,2)"
                );
                return $roles->fetchAll();
    }
    
    public function getAllEstUsu(){
        
        $estusu = $this->_db->query(
                "SELECT * FROM est_usu"
                );
                return $estusu->fetchAll();
    }
}

?>
