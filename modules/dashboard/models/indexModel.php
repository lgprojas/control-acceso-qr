<?php

class indexModel extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getCantMovPorMes($year=false) {

        $bd = $this->_db->query("
        SELECT Nom_mes, T1.Total 
        FROM mes m 
        LEFT JOIN (
                SELECT MONTH(Fch_mov) Mes, COUNT(Id_mov) AS Total 
                FROM movimiento  
                WHERE YEAR(Fch_mov) = $year
                GROUP BY Mes
                ) T1 ON (T1.Mes = m.Id_mes) 
        ");
        return $bd->fetchAll();     
    }
    
    public function getMovs($year=false,$condmes=NULL) {
        //Movimientos de entrada
        $bd = $this->_db->query("
                        SELECT SUM(if(Id_entidad = 1, 1, 0)) AS MallPuertaDelMar, 
                                       SUM(if(Id_entidad = 2, 1, 0)) AS Sodimac,
                                       SUM(if(Id_entidad = 3, 1, 0)) AS Inacesa, 
                                       SUM(if(Id_entidad = 4, 1, 0)) AS Samsung,
                                       SUM(if(Id_entidad = 5, 1, 0)) AS FarmaciaSanJuan, 
                                       SUM(if(Id_entidad = 6, 1, 0)) AS NuevaCostaneraCowork
                                FROM movimiento m
                                LEFT JOIN vehiculo v ON(v.Id_vehi=m.Id_vehi)
                                LEFT JOIN empleado e ON(e.Id_emp=v.Id_emp)
                                WHERE YEAR(Fch_mov) = $year
                                    $condmes
                                
                        ");
        return $bd->fetchAll();     
    }
    
//    public function getMovs($year=false) {
//        //Movimientos de entrada
//        $bd = $this->_db->query("
//            SELECT Nom_entidad, COUNT(Id_mov) AS Total
//            FROM movimiento m
//            LEFT JOIN vehiculo v ON(v.Id_vehi=m.Id_vehi)
//            LEFT JOIN empleado em ON(em.Id_emp=v.Id_emp)
//            LEFT JOIN entidad e ON (e.Id_entidad=em.Id_entidad)
//            WHERE YEAR(Fch_mov) = $year
//                AND Id_tmov = 1
//            ORDER BY e.Id_entidad ASC
//            ");
//        return $bd->fetchAll();     
//    }
    
    public function getCantCausasPorMesEstado($year=false) {

        $bd = $this->_db->query("
        SELECT Nom_mes, T1.Total, T1.Sininiciar
        FROM mes m 
        LEFT JOIN (
                SELECT MONTH(Fch_causa) Mes, 
                       COUNT(Id_causa) AS Total, 
                       SUM(if(Id_estcausa = 1, 0, 1)) AS Sininiciar
                FROM causa 
                WHERE YEAR(Fch_causa) = $year
                GROUP BY Mes
                ) T1 ON (T1.Mes = m.Id_mes) 
        ");
        return $bd->fetchAll();     
    }
    
    public function getCantCausasYearMesTipo($year=false,$condmes=NULL) {

        $bd = $this->_db->query("
        SELECT Nom_mes, T1.Suprema, 
                        T1.Apelaciones,
                        T1.Civil,
                        T1.Laboral,
                        T1.Penal,
                        T1.Cobranza,
                        T1.Familia,
                        T1.PoliciaLocal
        FROM mes m 
        LEFT JOIN (
                SELECT MONTH(Fch_causa) Mes, 
                       SUM(if(Id_comp = 1, 1, 0)) AS Suprema, 
                       SUM(if(Id_comp = 2, 1, 0)) AS Apelaciones,
                       SUM(if(Id_comp = 3, 1, 0)) AS Civil, 
                       SUM(if(Id_comp = 4, 1, 0)) AS Laboral,
                       SUM(if(Id_comp = 5, 1, 0)) AS Penal, 
                       SUM(if(Id_comp = 6, 1, 0)) AS Cobranza,
                       SUM(if(Id_comp = 7, 1, 0)) AS Familia, 
                       SUM(if(Id_comp = 8, 1, 0)) AS PoliciaLocal
                FROM causa 
                WHERE YEAR(Fch_causa) = $year
                    $condmes
                GROUP BY Mes
                ) T1 ON (T1.Mes = m.Id_mes) 
        ");
        return $bd->fetchAll();     
    }
    

    
    public function getProdsParam($ini=false,$fin=false) {

        $bd = $this->_db->query("SELECT Nom_prod,
                                        SUM(Cant_venta) AS cantidad
                                    FROM venta v
                                    LEFT JOIN producto p ON(p.Id_prod=v.Id_prod)
                                    WHERE YEAR(Fch_venta) BETWEEN $ini AND $fin
                                    GROUP BY v.Id_prod");
        return $bd->fetchAll();     
    }
    
}

