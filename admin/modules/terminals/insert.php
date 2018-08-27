<?php
	include '../../../library/config.php';

	$data = [
			'place_id' => $_POST['place_id'],
			'trans_id' => $_POST['trans_id'],
			'fare_rate_min' => $_POST['fare_rate_min'],
			'fare_rate_max' => $_POST['fare_rate_max'],
			'description' => $_POST['description'],
			'latitude_start'	=> $_POST['latitude_start'],
			'longitude_start' => $_POST['longitude_start']
		];

		$q1 = "INSERT INTO routes(place_id, trans_id, fare_rate_min, fare_rate_max, description, latitude_start, longitude_start) VALUES (:place_id, :trans_id, :fare_rate_min, :fare_rate_max, :description, :latitude_start, :longitude_start)";
		
		$stmt= $connection->prepare($q1);
		$res = $stmt->execute($data);
		if($res) {
			$output = array(
				"reponse"				=>	"Terminal successfully created!"
			);
			echo json_encode($output);
		} else {
			$output = array(
				"reponse"				=>	"Error inserting data!"
			);
			echo json_encode($output);
		} 
?>