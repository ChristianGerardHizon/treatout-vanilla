<?php 

	include '../../../library/config.php';

	$query = "SELECT * FROM transportation";

	$query = $connection->prepare($query);

	$query->execute();

	$data =  $query->fetchAll(PDO::FETCH_OBJ);

?>