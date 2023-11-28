<?php

//include ('../connection/connection.php');
include('../model/PartesdelOrdenadorModel.php');

$orden = "nombre_asc"; // Establece el valor predeterminado 
$results = obtenerProductosByCategoria($pdo,$orden);

//$pdo = null;


?>