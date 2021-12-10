<?php 

	include_once './php/config.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$connection->prepare('DELETE FROM Automoviles WHERE Id_Automovil=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: Automoviles.php');
	}else{
		header('Location: Automoviles.php');
	}
 ?>