<?php

//include ('../connection/connection.php');
include('../model/PerifericosModel.php');

$orden = "nombre_asc"; // Establece el valor predeterminado 
$results = obtenerProductosPerifericos($pdo,$orden);

//$pdo = null;


?>