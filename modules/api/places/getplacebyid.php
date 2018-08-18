<?php

	include '../../../library/config.php';

	$query = $connection->prepare( "SELECT rate_min,rate_max FROM places WHERE place_id = ?" );

	$query->execute([$_GET['place_id']]); 

	$data =  $query->fetchAll(PDO::FETCH_OBJ);

	echo json_encode($data);

?>


