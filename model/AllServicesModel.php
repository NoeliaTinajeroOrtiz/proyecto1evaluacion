<?php

include ('../connection/connection.php');

function obtenerServicios($pdo) {

   

    try {

        $stmt = $pdo->prepare ("SELECT * FROM servicios");
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