<?php 
	include '../../../library/config.php';

	$statement = $connection->prepare("INSERT INTO places(place_id, rate_min, rate_max, type) VALUES ( :placeid, :ratemin, :ratemax, :type)");
		$result = $statement->execute(
			array(
				':placeid' => 	$_POST['place_id'],
				':ratemin'	=>	$_POST["minrate"],
				':ratemax'	=>	$_POST["maxrate"],
				':type' => $_POST['type']
			)
	);

	$output = array();

	if($statement){

		$output['msg'] = 'Data successfully inserted!';

	} else {

		$output['msg'] = 'Error inserting data!';

	}

 
	echo json_encode($output);


?>