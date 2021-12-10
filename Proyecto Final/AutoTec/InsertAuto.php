<?php 
	include_once './php/config.php';
	
	if(isset($_POST['guardar']))
	{
		$Marca=$_POST['marca'];
		$Modelo=$_POST['modelo'];
		$Anio=$_POST['anio'];
		$Motor=$_POST['motor'];

		/*if(!empty($Marca) && !empty($Modelo) && !empty($Anio) && !empty($Motor)){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{*/
				$consulta_insert=$connection->prepare('INSERT INTO Automoviles(Marca,Modelo,Anio,Motor) VALUES(:marca,:modelo,:anio,:motor)');
				$consulta_insert->execute(array(
					':marca' =>$Marca,
					':modelo' =>$Modelo,
					':anio' =>$Anio,
					':motor' =>$Motor
				));
				header('Location: Automoviles.php');
			/*}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}*/
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="./css/HojaEstilosAutomoviles.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD BASICO AUTOMOVILES</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="marca" placeholder="Marca" class="input__text">
				<input type="text" name="modelo" placeholder="Modelo" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="anio" placeholder="Anio" class="input__text">
				<input type="text" name="motor" placeholder="Motor" class="input__text">
			</div>
			<div class="btn__group">
				<a href="Automoviles.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
