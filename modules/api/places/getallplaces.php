<?php
	
	include '../../../library/config.php';

	$query = "SELECT * FROM places";

	$query = $connection->prepare($query);

	$query->execute();

	$data =  $query->fetchAll(PDO::FETCH_OBJ);

	echo json_encode($data);

?>