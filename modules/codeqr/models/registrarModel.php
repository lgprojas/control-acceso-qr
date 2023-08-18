<?php

class registrarModel extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getDatosEmpVehi($cod=false){

        $sj = $this->_db->query("SELECT * 
                                 FROM vehiculo v
                                 LEFT JOIN empleado e ON (e.Id_emp = v.Id_emp)
                                 LEFT JOIN modelo mo ON (mo.Id_modelo=v.Id_modelo)
                                 LEFT JOIN marca ma ON (ma.Id_marca=mo.Id_marca)
                                 LEFT JOIN entidad en ON (en.Id_entidad=e.Id_entidad)
                                 LEFT JOIN relacion_entidad re ON (re.Id_rentidad=e.Id_rentidad)
                                 WHERE Pat_vehi = '$cod'
                                    ");
        return $sj->fetch();
    }
    
    public function getPatente($cod=false){
       
        $tp = $this->_db->query("SELECT Id_vehi FROM vehiculo WHERE Pat_vehi='$cod'");
        return $tp->fetch();
    }
    
    public function getTipoObsVehi(){
        //selecciona los tipos de observaciones
        
         $e = $this->_db->query("SELECT * 
                                 FROM tipo_observacion
                                ");
        return $e->fetchAll();
    }
    
    public function verificarIdVehi($idvehi=false){
        
        $ver = $this->_db->query(
                "SELECT Id_vehi
                FROM vehiculo 
                WHERE Id_vehi = $idvehi 
                ");
        return $ver->fetch();
    }
    
    
    public function getPatVehi($idvehi=false){
        
        $sql = $this->_db->query("SELECT Pat_vehi
                                    FROM vehiculo
                                    WHERE Id_vehi = $idvehi
                                ");
        $sq= $sql->fetch(PDO::FETCH_ASSOC);
        return $sq['Pat_vehi'];
    }
    
    public function addNewMovVehi(
                                    $fchmov=false,
                                    $nota=NULL, 
                                    $idtmov=false,
                                    $idvehi=false,
                                    $idusu=false
                                  ){    
                
        $sql = $this->_db->prepare(
                "INSERT INTO movimiento VALUES" . 
                "(NULL, NOW(), :Fchr_mov, :Nota_mov, :Id_tmov, :Id_vehi, :Id_usu)"               
                )
                ->execute(array(
                    ':Fchr_mov' => $fchmov,
                    ':Nota_mov' => !empty($nota) ? $nota : NULL,
                    ':Id_tmov' => $idtmov,
                    ':Id_vehi' => $idvehi,
                    ':Id_usu' => $idusu
                ));
        
        if ($sql) { 
            return true;
        }
        
    }
    
    public function addNewObs(
                                    $fchobs=false,
                                    $nota=false, 
                                    $tobsvehi=false,
                                    $idvehi=false,
                                    $idusu=false
                                  ){    
                
        $sql = $this->_db->prepare(
                "INSERT INTO observacion_vehiculo VALUES" . 
                "(NULL, NOW(), :Fchsit_obsvehi, :Nota_obsvehi, :Id_vehi, :Id_tobsvehi, :Id_usu)"               
                )
                ->execute(array(
                    ':Fchsit_obsvehi' => $fchobs,
                    ':Nota_obsvehi' => !empty($nota) ? $nota : NULL,
                    ':Id_vehi' => $idvehi,
                    ':Id_tobsvehi' => $tobsvehi,
                    ':Id_usu' => $idusu
                ));
        
        if ($sql) { 
            return true;
        }
        
    }
    
    
    
    
    
    
    
    
    public function verificarCodCiu($cod=false){
        
        $ver = $this->_db->query(
                "SELECT Cod_ciu 
                FROM ciudad 
                WHERE Cod_ciu = '$cod' 
                ");
        return $ver->fetch();
    }
    
    
    
    public function getRegs(){
        
         $t = $this->_db->query("select * from region");
        return $t->fetchAll();
    }
    
    public function getCiu($id = false){
       
        $idc = (int) $id;
        $tp = $this->_db->query("SELECT * 
                                 FROM ciudad c
                                 LEFT JOIN region r ON (r.Id_reg = c.Id_reg)
                                 WHERE Id_ciu={$idc}");
        return $tp->fetch();
    }
    
    public function editarCiu($id=false, $reg=false, $nom=false){
        
        $idc = (int) $id;
        $this->_db->prepare("UPDATE ciudad SET Nom_ciu = :nom, Id_reg = :idreg WHERE Id_ciu = :id")
        ->execute(array(
            ':id' => $idc,
            ':nom' => $nom,
            ':idreg' => $reg
        ));
    }
    
    public function eliminarCiu($id = false){
        
        $idc = (int) $id;
        $this->_db->query("delete from ciudad " .
                          "where Id_ciu=$idc");
    }
}
?>
