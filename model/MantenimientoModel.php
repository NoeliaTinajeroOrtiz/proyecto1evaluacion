<?php

include ('../connection/connection.php');

function obtenerServiciosMantenimiento($pdo) {

   

    try {

        $stmt = $pdo->prepare ("SELECT * FROM servicios WHERE nombreServicio = :nombreServicio");

        $nombreServicio = 'mantenimiento de tu web';
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