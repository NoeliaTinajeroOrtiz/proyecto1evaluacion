<?php

//include ('../connection/connection.php');
include('../model/ComprobaryMejorarModel.php');

$orden = "nombre_asc"; // Establece el valor predeterminado
$results = obtenerServiciosComprobaryMejorar($pdo,$orden);

//$pdo = null;


?>