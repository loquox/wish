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

/**
* Obtiene los datos de una meta con un identificador date_default_timezone_get

*/

  public static function getById($idMeta){
    // Consulta de la meta
    $consulta = "SELECT idMeta,
                         titulo,
                          descripcion,
                          prioridad,
                          fechaLim,
                          categoria
                          FROM meta
                          WHERE idMeta = ?";


                          try {
                            //Preparar sentencia
                            $comando = Database::getInstance()->getDb()->prepare($consulta);
                            //Ejecutar sentencia
                            $comando->execute(array($idMeta));
                            // capturar primera fila del resultado
                            $row = $comando->fetch(PDO::FETCH_ASSOC);
                            return $row;
                          }catch (PDOException $e) {
                            echo 'Fallo la conexion :' . $e->getMessage();
                            return -1;
                          }
}
}
?>
