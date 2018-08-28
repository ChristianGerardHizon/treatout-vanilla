<?php
	include '../../../library/config.php';

	$statement = $connection->prepare("UPDATE places SET rate_max = :maxrate, rate_min = :minrate WHERE place_id = :placeid");
		$result = $statement->execute(
			array(
				':maxrate' =>	$_POST['maxrate'],
				':minrate' =>	$_POST['minrate'],
				':placeid' => $_POST['placeid']
			)
		);


	$output = array();

	if($statement){

		$output['msg'] = 'Successfully updated!';

	} else {

		$output['msg'] = 'Error updating data!';

	}

 
	echo json_encode($output);


?>