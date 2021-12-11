<?php
 
include('./php/config.php');
session_start();
 
/*if (isset($_POST['Registro'])) {*/
 
    $Nombre = $_POST['nombre'];
    $Apellidos = $_POST['apellidos'];
    $Email = $_POST['email'];
    $Sexo = $_POST['genero'];
    $Password = $_POST['password'];
    $password_hash = password_hash($Password, PASSWORD_BCRYPT);
    $Telefono = $_POST['telefono'];
    $CodigoPostal = $_POST['cp'];
 
    $query = $connection->prepare("SELECT * FROM clientes WHERE Email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo '<p class="error">La dirección de correo ya está registrada!</p>';
    }
 
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO clientes (Nombre,Apellidos,Email,Sexo,Password,Telefono,CodigoPostal) 
        VALUES (:nombre,:apellidos,:email,:genero,:password_hash,:telefono,:cp)");
        $query->bindParam("nombre", $Nombre, PDO::PARAM_STR);
        $query->bindParam('apellidos', $Apellidos,PDO::PARAM_STR);
        $query->bindParam('email', $Email,PDO::PARAM_STR);
        $query->bindParam('genero', $Sexo,PDO::PARAM_STR);
        $query->bindParam('password_hash', $password_hash, PDO::PARAM_STR);
        $query->bindParam('telefono', $Telefono,PDO::PARAM_INT);
        $query->bindParam('cp', $CodigoPostal,PDO::PARAM_INT);
        $result = $query->execute();
 
        if ($result) {
            echo '<p class="success">Su registro fué exitoso!</p>';
            header('Location: index.php');
            exit;
        } else {
            echo '<p class="error">Algo salió mal, verifique los datos!</p>';
        }
    }
/*}*/
 
?>