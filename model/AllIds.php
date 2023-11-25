<?php

include ('../connection/connection.php');

function obtenerProductosPorIds($pdo, $idsProductos) {
    // Convertir los IDs de los productos a una cadena separada por comas
    $idsProductosStr = implode(",", $idsProductos);
    
    // Consultar la base de datos para obtener los detalles de los productos
    $query = "SELECT * FROM productos WHERE idProducto IN ($idsProductosStr)";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $productos;
}

function obtenerServiciosPorIds($pdo, $idsServicios) {
    // Convertir los IDs de los servicios a una cadena separada por comas
    $idsServiciosStr = implode(",", $idsServicios);
    
    // Consultar la base de datos para obtener los detalles de los servicios
    $query = "SELECT * FROM servicios WHERE idServicio IN ($idsServiciosStr)";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $servicios;
}

?>