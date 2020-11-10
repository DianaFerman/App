<?php
require_once('../controlador/db.php');
class nombreModel{
    
    public static function obtenerValor($campo,$valor){
        $consulta=DB::connectReadDB()->prepare('SELECT nombre FROM '.$campo.' WHERE id=:id');
        $consulta->bindParam(':id',intval($valor),PDO::PARAM_INT);
        $consulta->execute();
        $row =$consulta->fetch(PDO::FETCH_ASSOC);
        return $row['nombre'];
    }
    public static function obtenerDietaAleatoria($campo){
        $consulta=DB::connectReadDB()->prepare('SELECT ID FROM '.$campo.' ORDER BY RAND() LIMIT 1');
        $consulta->execute();
        $row =$consulta->fetch(PDO::FETCH_ASSOC);
        return $row['ID'];
    }
}

?>