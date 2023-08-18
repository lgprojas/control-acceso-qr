<?php

class indexModel extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getMovs($condicion=''){

        $cli = $this->_db->query("SELECT *
                                    FROM movimiento m
                                    LEFT JOIN vehiculo v ON(v.Id_vehi=m.Id_vehi)
                                    LEFT JOIN empleado e ON(e.Id_emp=v.Id_emp) 
                                    LEFT JOIN tipo_movimiento tp ON(tp.Id_tmov=m.Id_tmov)
                                    LEFT JOIN entidad en ON (en.Id_entidad=e.Id_entidad)
                                    WHERE Id_mov IS NOT NULL 
                                    $condicion
                                    GROUP BY Fch_mov DESC
                                    ");
        return $cli->fetchAll();
    }
    
    public function getTipoMovFilt(){
        
         $e = $this->_db->query("SELECT Id_tmov AS a, Nom_tmov AS b 
                                 FROM tipo_movimiento
                                ");
        return $e->fetchAll();
    }
    
    public function getEntidadesFilt(){
        
         $e = $this->_db->query("SELECT Id_entidad AS a, Nom_entidad AS b 
                                 FROM entidad
                                ");
        return $e->fetchAll();
    }
    
}