<?php

include ('../connection/connection.php');

function obtenerProductosTeclas($pdo) {

   

    try {

        $stmt = $pdo->prepare ("SELECT * FROM productos WHERE categoriaProducto = :categoriaProducto");

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