<?php

include ('../connection/connection.php');

try {

    $stmt = $pdo->prepare ("INSERT INTO usuario (id, nombre, mail, telefono, dni, password)
                            VALUES (null, :nombre, :mail, :telefono, :dni, :password)");

    $stmt->bindParam(':nombre', $_POST['username']);
    $stmt->bindParam(':mail', $_POST['mail']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    $stmt->bindParam(':dni', $_POST['dni']);
    $stmt->bindParam(':password', $_POST['password']);

    $stmt->execute();

    echo ("Registro completado");
    header("Location: ../view/formulario_login.php");

} catch (PDOException $e){
    echo $e;
    require("../errors/Error.php");

}


?>