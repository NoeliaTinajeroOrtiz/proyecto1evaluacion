<?php

//include ('../connection/connection.php');
include('../model/InstalarModel.php');

$orden = "nombre_asc"; // Establece el valor predeterminado
$results = obtenerServiciosInstalar($pdo,$orden);

//$pdo = null;


?>