<?php 
    require_once "CRUD/connection.php";

    if (isset($_POST)) {
        $usernameLogin = trim($_POST["usernameLogin"]);
        $pass = $_POST["pass"];
    }

    $sql = "SELECT * FROM usuarios WHERE username = '$usernameLogin'";
    $res = mysqli_query($connect, $sql);

    if ($res && mysqli_num_rows($res) == 1) {
        $usuario = mysqli_fetch_assoc($res);

        if (password_verify($pass, $usuario["pass"])) {
            $_SESSION["usuario"] = $usuario;
            header("Location: welcome.php");
        } else {
            $_SESSION["error_login"] = "Login incorrecto";
            header("Location: ./formulario_login.php");
        }
    } else {
        $_SESSION["error_login"] = "Login incorrecto";
        header("Location: ./formulario_login.php");
    }


?>