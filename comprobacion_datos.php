<?php 


if (isset($_POST["submit"])) {
    require_once("connection/connection.php");


    //Recoger los datos
    $nombre = isset($_POST["username"]) ? mysqli_real_escape_string($connect, $_POST["username"]) : false;
    $mail = isset($_POST["mail"]) ? mysqli_real_escape_string($connect, trim($_POST["mail"])) : false;
    $telefono = isset($_POST["telefono"]) ? mysqli_real_escape_string($connect, $_POST["telefono"]) : false;
    $dni = isset($_POST["dni"]) ? mysqli_real_escape_string($connect, $_POST["dni"]) : false;
    $pass = isset($_POST["password"]) ? mysqli_real_escape_string($connect, $_POST["password"]) : false;
    //var_dump($_POST);

    $arrayErrores = array();
    //Hacemos validadores necesarios
    if (!empty($nombre) && !is_numeric($nombre)) {
        $usernameValidado = true;
        log_message("El nombre de usuario es correcto","INFO",$ruta);

    } else {
        $usernameValidado = false;
        $arrayErrores["username"] = "El username no es valido";
        log_message("El nombre de usuario no es correcto","ERROR",$ruta);
    }

    if (!empty($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $mailValidado = true;
        log_message("El email de usuario es correcto","INFO",$ruta);

    } else {
        $mailValidado = false;
        $arrayErrores["mail"] = "El mail no es valido";
        log_message("El email de usuario no es correcto","ERROR",$ruta);
    }
    if (!empty($telefono) && is_numeric($telefono)) {
        $telefonoValidado = true;
        log_message("El teléfono de usuario es correcto","INFO",$ruta);

    } else {
        $telefonoValidado = false;
        $arrayErrores["telefono"] = "El telefono no es valido";
        log_message("El telefono de usuario no es correcto","ERROR",$ruta);
    }
    if (!empty($dni)) {
        $dniValidado = true;
        log_message("El dni de usuario es correcto","INFO",$ruta);

    } else {
        $dniValidado = false;
        $arrayErrores["dni"] = "El dni no es valido";
        log_message("El dni de usuario no es correcto","ERROR",$ruta);
    }

    if (!empty($pass)) {
        $passValidado = true;
        log_message("La contraseña de usuario es correcto","INFO",$ruta);

    } else {
        $passValidado = false;
        $arrayErrores["password"] = "El password no es valido";
        log_message("La contraseña de usuario no es correcto","ERROR",$ruta);
    }

    $guardarUsuario = false;
    if(count($arrayErrores) == 0) {
        $guardarUsuario = true;
        
        $passSegura = password_hash($pass, PASSWORD_BCRYPT, ["cost" => 4]);
        //password_verify($pass, $passSegura);

        $sql = "INSERT INTO usuario VALUES(null, '$nombre', '$mail','$telefono','$dni', '$passSegura');";
        $guardar = mysqli_query($connect, $sql);

        if ($guardar) {
            $_SESSION["completado"] = "Registro completado";
        } else {
            $_SESSION["errores"]["general"] = "Fallo en el registro";
        }
    } else {
        $_SESSION["errores"] = $arrayErrores;
    }
    header("Location: ../index.php");
}
?>