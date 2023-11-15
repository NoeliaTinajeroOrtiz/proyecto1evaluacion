<?php

include ('../connection/connection.php');

function obtenerServiciosReparacion($pdo) {

   

    try {

        $stmt = $pdo->prepare ("SELECT * FROM servicios WHERE nombreServicio = :nombreServicio");

        $nombreServicio = 'reparacion de pc';
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