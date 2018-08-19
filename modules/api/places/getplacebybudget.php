<?php
	
	include '../../../library/config.php';

	$min = $_GET['min'];

	$max = $_GET['max'];

	$query = "SELECT * FROM places WHERE rate_min >= ? OR rate_max <= ? ";

	$query = $connection->prepare($query);

	$query->execute([$min,$max]);

	$data =  $query->fetchAll(PDO::FETCH_OBJ);

	echo json_encode($data);

?>