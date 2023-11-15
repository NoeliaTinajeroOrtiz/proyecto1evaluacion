<?php

include ('../connection/connection.php');

function obtenerServiciosInstalar($pdo) {

   

    try {

        $stmt = $pdo->prepare ("SELECT * FROM servicios WHERE nombreServicio = :nombreServicio");

        $nombreServicio = 'instalar drivers y programas';
        $stmt -> bindParam (':nombreServicio' , $nombreServicio);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
       
        

    } catch (PDOException $e){
        echo $e;
        require("../errors/Error.php");
        return false;
    
    }
    
}


?>