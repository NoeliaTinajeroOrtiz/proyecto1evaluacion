<?php

//include ('../connection/connection.php');
include('../model/AllProductsModel.php');


$orden = "nombre_asc"; // Establece el valor predeterminado 
$results = obtenerProductos($pdo,$orden);


//$pdo = null;


?>