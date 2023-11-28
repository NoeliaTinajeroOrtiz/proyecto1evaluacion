<?php

//include ('../connection/connection.php');
include('../model/MantenimientoModel.php');

$orden = "nombre_asc"; // Establece el valor predeterminado
$results = obtenerServiciosMantenimiento($pdo,$orden);

//$pdo = null;


?>