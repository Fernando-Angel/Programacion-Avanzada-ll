<?php
	include_once './php/config.php';

	$sentencia_select=$connection->prepare('SELECT * FROM Automoviles ORDER BY Id_Automovil DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$connection->prepare('
			SELECT *FROM Automoviles WHERE Marca LIKE :campo OR Modelo LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administracion de Automoviles</title>
	<link rel="stylesheet" href="./css/HojaEstilosAutomoviles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style principal.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
    <script src="js/header.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body id="cuerpo">
	<header id="head" class="p-0">
		<div class="logo">
		<a href="principal.html"  class="ml-4 mr-5">
			<img src="Images/icono 1.png" width="50px">
		</a>
		<a class="nav-link" href="Automoviles.php" id="carCrash"><i class="fas fa-car-crash p-0"> Agregar Carro</i></a>
		</div>
    <nav>
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"1>Acceso a clientes</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item" href="login.html">Iniciar Sesión</a>
      <a class="dropdown-item" href="Registro.html">Registrarse</a>
        <button class="switch" id="switch" onclick="Mode()">
          <span><i class="fas fa-sun"></i></span>
          <span><i class="fas fa-moon"></i></span>
        </button>
      </div>
    </nav>
  </header>

	<div class="contenedor">
		<h2>CRUD BASICO AUTOMOVILES</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar marca o modelo" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="./InsertAuto.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id</td>
				<td>Marca</td>
				<td>Modelo</td>
				<td>Año</td>
				<td>Motor</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['Id_Automovil']; ?></td>
					<td><?php echo $fila['Marca']; ?></td>
					<td><?php echo $fila['Modelo']; ?></td>
					<td><?php echo $fila['Anio']; ?></td>
					<td><?php echo $fila['Motor']; ?></td>
					<td><a href="./UpdateAuto.php?id=<?php echo $fila['Id_Automovil']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="./DeleteAuto.php?id=<?php echo $fila['Id_Automovil']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>