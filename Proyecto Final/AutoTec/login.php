<?php

include('./php/config.php');
session_start();

    $Email = $_POST['email'];
    $Password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM Clientes WHERE Email=:email");
    $query->bindParam("email", $Email, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo '<p class="error">¡La combinación de contraseña de nombre de usuario es incorrecta!</p>';
    } else {
        if (password_verify($Password, $result['Password'])) {
            $_SESSION['user_id'] = $result['Id_cliente'];
            echo '<p class="success">¡Felicitaciones, estás conectado!</p>';
            header('Location: Automoviles.php');
        } else {
            echo '<p class="error">¡La combinación de nombre de usuario y contraseña está mal!</p>';
        }
    }

?>