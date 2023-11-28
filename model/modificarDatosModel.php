<?php

include ('../connection/connection.php');

try {

    
    $stmt = $pdo->prepare ("UPDATE usuario SET nombre = :nombre, mail = :mail, telefono = :telefono, dni = :dni, password = :password WHERE id = :id");

    $stmt->bindParam(':nombre', $_POST['nuevoUsername']);
    $stmt->bindParam(':mail', $_POST['nuevoMail']);
    $stmt->bindParam(':telefono', $_POST['nuevoTelefono']);
    $stmt->bindParam(':dni', $_POST['nuevoDni']);
    $stmt->bindParam(':password', $_POST['nuevoPassword']);
    $stmt->bindParam(':id', $_SESSION['usuario']['id']);

    $stmt->execute();

    $_SESSION["usuario"]["nombre"] = $_POST['nuevoUsername'];
    $_SESSION["usuario"]["mail"] = $_POST['nuevoMail'];
    $_SESSION["usuario"]["telefono"] = $_POST['nuevoTelefono'];
    $_SESSION["usuario"]["password"] = $_POST['nuevoPassword'];
    $_SESSION["usuario"]["dni"] = $nuevoDni;

    echo ("Cambios completados");
    header("Location: ../view/perfilUsuario.php");

} catch (PDOException $e){
    echo $e;
    require("../errors/Error.php");

}


?>