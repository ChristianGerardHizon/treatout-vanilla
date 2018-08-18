<?php

	include '../../../library/config.php';

	$id = $_GET['place_id'];

	$query = $connection->prepare("SELECT * FROM places WHERE place_id = ?" );

	$query->execute([$id]); 

	$count = $query->rowCount();

	if($count == 0) {

	$data = [

		'place_id' => $id
			
	];

	$sql = "INSERT INTO places (place_id) VALUES (:place_id)";

	$stmt = $connection->prepare($sql);

	$res = $stmt->execute($data);

	if($res) {

			$output = array(

				"reponse"				=>	"Place succcessfuly inserted!"

			);

			echo json_encode($output);

		} else {


			$output = array(

				"reponse"				=>	"Error inserting data!"

			);

			echo json_encode($output);

		} 


	}



?>
