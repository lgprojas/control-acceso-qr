<?php

Class Hash{
   
    public static function getHash($algoritmo, $data, $key){
        // nombre algoritmo para cifrar+mensaje a cifrar+clave secreta compartida que se usará para generar el mensaje cifrado de la variante HMAC.
        $hash = hash_init($algoritmo, HASH_HMAC, $key);
        hash_update($hash, $data);//le envía $hash y $data
        
        return hash_final($hash);//devuelve la encriptación
    }
}
?>
