<?php 

include ('../connection/connection.php');

try {

    $stmt = $pdo -> prepare ("SELECT * FROM usuario WHERE mail = :mail");
    $stmt -> bindParam (':mail' , $_POST['mailLogin']);
    $stmt -> execute();    

    if ($stmt -> rowCount() == 1) {        
       
            echo "Login correcto";
            header("Location: ../view/paginaprincipal.php");
        
        
    } else {
        echo "Login incorrecto";
        header("Location: ../view/formulario_login.php");
    }

} catch (PDOException $e) {

    echo $e;
    require("../errors/Error.php");
    
}

    


?>