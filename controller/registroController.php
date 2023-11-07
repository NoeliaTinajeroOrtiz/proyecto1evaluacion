<?php

include ('../connection/connection.php');

try {

    $stmt = $pdo->prepare ("INSERT INTO usuario (id, username, mail, telefono, dni, password)
                            VALUES (null, :username, :mail, :telefono, :dni, :password)");

    $nombre = $_POST['username'];
    $mail = $_POST['mail'];
    $telefono = $_POST['telefono'];
    $dni = $_POST['dni'];
    $password = $_POST['password'];


    $stmt->bindParam(':username', $nombre);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':dni', $dni);
    $stmt->bindParam(':password', $password);

    $stmt->execute();

    echo ("Registro completado");
    header("Location: ../view/formulario_login.php");

} catch (PDOException $e){

    require("../errors/Error.php");

}


?>