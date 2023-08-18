<?php

class indexModel extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getEmpresa($empresa=false){

        $sj = $this->_db->query("SELECT Nom_empresa 
                                    FROM empresa
                                    WHERE Id_empresa = $empresa");
        return $sj->fetch();
    }
    
    
}
?>
