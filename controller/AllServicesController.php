<?php

//include ('../connection/connection.php');
include('../model/AllServicesModel.php');

$orden = "nombre_asc"; // Establece el valor predeterminado
$results = obtenerServicios($pdo,$orden);



//$pdo = null;


?>