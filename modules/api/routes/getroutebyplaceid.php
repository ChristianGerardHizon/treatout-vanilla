<?php
	
	include '../../../library/config.php';

	$id = $_GET['place_id'];

	$query = "SELECT * FROM routes r WHERE place_id = ? INNER JOIN transportation t ON r.trans_id = t.trans_id";

	$query = $connection->prepare($query);

	$query->execute([$id]);

	$data =  $query->fetchAll(PDO::FETCH_OBJ);

	echo json_encode($data);

?>