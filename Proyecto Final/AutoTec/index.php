<?php

    include_once('./php/config.php');
    session_start();

    if(isset($_POST['log']))
    {
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
                $_SESSION['user_id'] = $result['Nombre'];
                echo '<p class="success">¡Felicitaciones, estás conectado!</p>';
                header('Location: Automoviles.php');
            } else {
                echo '<p class="error">¡La combinación de nombre de usuario y contraseña está mal!</p>';
            }        
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión te esperamos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style principal.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel = "stylesheet" href ="./css/registro.css">
    <script src="js/header.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href ="./css/HojaEstilos.css">
</head>
<body id="cuerpo">

    <form class="formulario" method="POST" action="./index.php" name="Login" id="formulario">
        <h1>Login</h1>
        <div class="contenedor">
            <div class ="input-contenedor" id="grupo_correo">
                <i class="fas fa-envelope icon"></i>
                <input type="email" name = "email" placeholder="Correo" required class="input__text">
                <i class="formulario_validacion-estado fas fa-exclamation-circle"></i>
                <p class="formulario_input-error">Introduce un correo electronico</p>
            </div>
            <div class ="input-contenedor" id="grupo_contraseña">
                <i class="fas fa-key icon"></i>
                <input type="password"  name = "password" placeholder="Contraseña" required class="input__text">
                <i class="formulario_validacion-estado fas fa-exclamation-circle"></i>
                <p class="formulario_input-error">Introduce una contraseña valido</p>
            </div>
            <input type="submit" value ="Iniciar Sesión" class="button" name="log" href="./php/islogin.php">
           <p>¿No tienes cuenta? <a class="link" href="Registro.html">Registrate</a></p>
        </div>
    </form>
</body>
</html>