<?php
//Clase para la instacia de PDO

require_once 'mysql_login.php';

class  Database { 
    
    //Única instancia de la clase
    private static $db = null;
    
    //Instancia de PDO
    private static $pdo;
    
    final private function __construct(){
        try{
            //Crear nueva conexió PDO
            self::getDb();
        }catch(PDOException $e){
            //Manejo de excepciones
        }
    }
    
    public static function getInstance(){
        
        if (self::$db === null){
            self::$db = new self();
        }
        return self::$db;
    }
    
    public function getDb(){
        if (self::$pdo == null){
            self::$pdo = new PDO(
                'mysql:daname='. DATABASE .
                ';host=' . HOSTNAME .   
                ';port:63343;' ,
                USERNAME,
                PASSWORD,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_ECEPTION);
        
        }
        
        return self::$pdo;
    }
    
    final protected function __clone()
    {
        
    }
    
    function _destructor(){
        self::$pdp = null;
    }
    
    
}

?>