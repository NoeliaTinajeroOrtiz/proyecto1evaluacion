<?php

include ('../connection/connection.php');
include('./model/AllProductsModel.php');


$results = obtenerProductos($pdo);

//$pdo = null;


?>