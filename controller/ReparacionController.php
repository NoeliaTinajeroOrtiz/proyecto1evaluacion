<?php

//include ('../connection/connection.php');
include('../model/ReparacionModel.php');

$orden = "nombre_asc"; // Establece el valor predeterminado
$results = obtenerServiciosReparacion($pdo,$orden);

//$pdo = null;


?>