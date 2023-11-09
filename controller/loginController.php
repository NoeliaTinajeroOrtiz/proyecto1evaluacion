<?php 

include ('../connection/connection.php');


try {

    $stmt = $pdo -> prepare ("SELECT * FROM usuario WHERE mail = :mail");

    $mailLogin = $_POST['mailLogin'];

    $stmt -> bindParam (':mail' , $mailLogin);
    $stmt -> execute();    

    if ($stmt -> rowCount() == 1) {        
       
            echo "Login correcto";
            $_SESSION["usuario"] = $stmt -> fetch();
            header("Location: ../index.php");
            setcookie ("mail" , $mailLogin , time() + 2 * 24 * 60 * 60);
        
        
    } else {
        echo "Login incorrecto";
        header("Location: ../view/formulario_login.php");
    }

} catch (PDOException $e) {

    echo $e;
    require("../errors/Error.php");
    
}

 


?>