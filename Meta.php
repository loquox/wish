<?php 

//Representa la estructura de las metas
require 'Database.php';

class Meta
{
    function __construct(){
        
    }
    
    public static function getAll(){
        $consulta = "SELECT * FROM meta";
        try{
            //Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            //Ejecutar sentencia preparada
            $comando->execute();
            
            return $comando->fetchAll(PDO::FETCH_ASSOC);
                       
        }catch (PDOException $e){
            echo 'Fallo la conexion :' . $e->getMessage();
            
            return false;
        }
    }
     
    
}