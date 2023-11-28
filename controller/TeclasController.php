<?php

//include ('../connection/connection.php');
include('../model/TeclasModel.php');

$orden = "nombre_asc"; // Establece el valor predeterminado 
$results = obtenerProductosTeclas($pdo,$orden);

//$pdo = null;


?>