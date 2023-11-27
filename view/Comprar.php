<?php
include ('../connection/connection.php');

if (isset($_SESSION["usuario"])) {

    // Get user ID from session
    $userId = $_SESSION['usuario']['id'];

    // Check if there are products in the cart
    if (isset($_SESSION["carritoProductos"]) && count($_SESSION["carritoProductos"]) > 0) {

        // Get product IDs from the cart
        $productIds = $_SESSION["carritoProductos"];

         // Insert products into the database
         foreach ($productIds as $productId) {

            // Get product details from the database
            $stmt = $pdo->prepare ("SELECT * FROM productos WHERE idProducto = :productId");
            $stmt->bindParam(':productId', $productId);
            $stmt->execute();
            $results = $stmt->fetch(PDO::FETCH_ASSOC);          
            
            // Insert product into the user's purchased table
            
            $insertSql = $pdo->prepare("INSERT INTO compras (compraId, user_id, producto_id, nombre, descripcion, precio)
            VALUES (null, :userId, :productId, :nombre, :descripcion, :precio)");

            $insertSql->bindParam(':userId', $userId);
            $insertSql->bindParam(':productId', $productId);
            $insertSql->bindParam(':nombre', $results['nombreProducto']);
            $insertSql->bindParam(':descripcion', $results['descripcionProducto']);
            $insertSql->bindParam(':precio', $results['precioProducto']);

            $insertSql->execute();
         }
    }

    // Check if there are services in the cart
    if (isset($_SESSION["carritoServicios"]) && count($_SESSION["carritoServicios"]) > 0) {
        // Get service IDs from the cart
        $serviceIds = $_SESSION["carritoServicios"];

        // Insert services into the database
        foreach ($serviceIds as $serviceId) {

            // Get service details from the database
            $stmt = $pdo->prepare ("SELECT * FROM servicios WHERE idServicio = :serviceId");
            $stmt->bindParam(':serviceId', $serviceId);
            $stmt->execute();
            $results = $stmt->fetch(PDO::FETCH_ASSOC);

            // Insert service into the user's purchased table
            $insertSql = $pdo->prepare("INSERT INTO compras (compraId, user_id, servicio_id, nombre, descripcion, precio)
            VALUES (null, :userId, :serviceId, :nombre, :descripcion, :precio)");

            $insertSql->bindParam(':userId', $userId);
            $insertSql->bindParam(':serviceId', $serviceId);
            $insertSql->bindParam(':nombre', $results['nombreServicio']);
            $insertSql->bindParam(':descripcion', $results['descripcionServicio']);
            $insertSql->bindParam(':precio', $results['precioServicio']);

            $insertSql->execute();
        }
    }

    // Clear the cart
    $_SESSION["carritoProductos"] = array();
    $_SESSION["carritoServicios"] = array();

    // Redirect to the empty cart page
    header("Location: CestaView.php");

}else {

    // User is not logged in, redirect to login page
    header("Location: formulario_login.php");
    exit;
}

?>