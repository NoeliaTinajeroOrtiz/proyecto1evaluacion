<?php

//include ('../connection/connection.php');
include('../model/SolucionarErroresModel.php');

$orden = "nombre_asc"; // Establece el valor predeterminado
$results = obtenerServiciosSolucionarErrores($pdo,$orden);

//$pdo = null;


?>