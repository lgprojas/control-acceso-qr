<?php

class loginModel extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getUsuario($usuario, $password){
        
        $datos = $this->_db->query(
                "SELECT Id_usu,
                        CAST(AES_DECRYPT(Rut_usu,'".ENCRYPT_KEY."')AS char(100)) AS Rut_usu,
                        CAST(AES_DECRYPT(Nom_usu,'".ENCRYPT_KEY."')AS char(100)) AS Nom_usu,
                        CAST(AES_DECRYPT(Usu_usu,'".ENCRYPT_KEY."')AS char(100)) AS Usu_usu,
                        Pass_usu,
                        CAST(AES_DECRYPT(Email_usu,'".ENCRYPT_KEY."')AS char(100)) AS Email_usu,
                        Id_role,
                        Id_estusu,
                        Id_activar,
                        Id_emp,
                        Id_entidad
                 FROM usuario
                 WHERE Usu_usu = AES_ENCRYPT('$usuario', '".ENCRYPT_KEY."') 
                 AND Pass_usu = '" . Hash::getHash('sha1', $password, HASH_KEY) ."'               
                ");
        
        return $datos->fetch();
    }
    
    public function getNomEmpresa($idempresa=false) {
        
        $sql = $this->_db->query("
                                    SELECT Nom_empresa
                                    FROM empresa
                                    WHERE Id_empresa = $idempresa
                                   ");        
        $sq= $sql->fetch(PDO::FETCH_ASSOC);
        return $sq['Nom_empresa'];
    }

}
?>
