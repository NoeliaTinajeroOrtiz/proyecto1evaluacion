<?php

include ('../connection/connection.php');

function obtenerServiciosDiseñarWeb($pdo,$orden) {

   

    try {

        $sql = "SELECT * FROM servicios WHERE nombreServicio = :nombreServicio";

         // Agregar la cláusula ORDER BY según el valor de $orden
        switch ($orden) {
            case 'nombre_asc':
                $sql .= " ORDER BY nombreServicio ASC";
                break;
            case 'nombre_desc':
                $sql .= " ORDER BY nombreServicio DESC";
                break;
            case 'precio_asc':
                $sql .= " ORDER BY precioServicio ASC";
                break;
            case 'precio_desc':
                $sql .= " ORDER BY precioServicio DESC";
                break;
            default:
                // Opción por defecto si no se selecciona ninguna opción
                break;
    }
        $stmt = $pdo->prepare($sql);
        $nombreServicio = 'diseñar tu web';
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