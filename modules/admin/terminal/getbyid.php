<?php
	
	include '../../../library/config.php';

	$query = "SELECT * FROM routes r INNER JOIN transportation t ON r.trans_id = t.trans_id WHERE r.place_id = $_GET['place_id']";

	$query = $connection->prepare($query);

	$query->execute([$_GET['place_id']]);

	$data =  $query->fetchAll(PDO::FETCH_OBJ);

	echo json_encode($data);

?>