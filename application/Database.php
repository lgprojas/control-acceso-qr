<?php

class Database extends PDO{
    
    public function __construct() {
        parent::__construct(
                'mysql:host=' . DB_HOST .
                ';dbname=' . DB_NAME .
                ';charset=' . DB_CHAR,
                DB_USER,
                DB_PASS,
                array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . DB_CHAR . ' COLLATE utf8mb4_unicode_ci'
                ));
                //"SET NAMES 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' "
    }
}
?>
