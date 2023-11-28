<?php

include ('../connection/connection.php');

function obtenerProductosTeclas($pdo,$orden) {

   

    try {

        $sql = "SELECT * FROM productos WHERE categoriaProducto = :categoriaProducto";

         // Agregar la cláusula ORDER BY según el valor de $orden
        switch ($orden) {
            case 'nombre_asc':
                $sql .= " ORDER BY nombreProducto ASC";
                break;
            case 'nombre_desc':
                $sql .= " ORDER BY nombreProducto DESC";
                break;
            case 'precio_asc':
                $sql .= " ORDER BY precioProducto ASC";
                break;
            case 'precio_desc':
                $sql .= " ORDER BY precioProducto DESC";
                break;
            default:
                // Opción por defecto si no se selecciona ninguna opción
                break;
    }
        $stmt = $pdo->prepare($sql);
        $categoriaProducto = 'teclas';
        $stmt -> bindParam (':categoriaProducto' , $categoriaProducto);
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