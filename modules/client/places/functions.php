<?php 

function allplaces() {

    include('../library/config.php');
	$statement = $connection->prepare("SELECT * FROM places");
	$statement->execute();
	$result = $statement->fetchAll();
	echo json_encode($result);
}

function getPlaceById($id) {

	include('../library/config.php');
	$statement = $connection->prepare("SELECT * FROM places WHERE place_id = $id");
	$statement->execute();
	$result = $statement->fetchAll();
	echo json_encode($result);
}



?>