<?php
	include_once './php/config.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$connection->prepare('SELECT * FROM Automoviles WHERE Id_Automovil=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: Automoviles.php');
	}


	if(isset($_POST['Guardar']))
	{
		$Marca=$_POST['marca'];
		$Modelo=$_POST['modelo'];
		$Anio=$_POST['anio'];
		$Motor=$_POST['motor'];
		$id=(int) $_GET['id'];

		$consulta_update=$connection->prepare('UPDATE Automoviles SET  
		Marca=:marca,
		Modelo=:modelo,
		Anio=:anio,
		Motor=:Motor
		WHERE Id_Automovil=:id;'
		);
		$consulta_update->execute(array(
		':marca'=>$Marca,
		':modelo'=>$Modelo,
		':anio'=>$Anio,
		':Motor'=>$Motor,
		':id'=>$id
		));
		header('Location: Automoviles.php');	
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/HojaEstilosAutomoviles.css">
</head>
<body>
	<div class="contenedor">
		<h2>Editar Vehículo</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="marca" placeholder="Marca" value="<?php if($resultado) echo $resultado['Marca']; ?>" class="input__text">
				<input type="text" name="modelo" placeholder="Modelo" value="<?php if($resultado) echo $resultado['Modelo']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="anio" placeholder="Año" value="<?php if($resultado) echo $resultado['Anio']; ?>" class="input__text">
				<input type="text" name="motor" placeholder="Motor" value="<?php if($resultado) echo $resultado['Motor']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="Automoviles.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="Guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
