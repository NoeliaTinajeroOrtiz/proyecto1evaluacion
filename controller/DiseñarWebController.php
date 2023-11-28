<?php

//include ('../connection/connection.php');
include('../model/DiseñarWebModel.php');

$orden = "nombre_asc"; // Establece el valor predeterminado
$results = obtenerServiciosDiseñarWeb($pdo,$orden);

//$pdo = null;


?>