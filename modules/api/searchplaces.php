1<?php 
	include '../../library/config.php';
	include '../../classes/places.php';

	$place = new Places($connection);

	$output = array();

	if( !empty($_GET['searchvalue']) && !empty($_GET['minrate']) && !empty($_GET['maxrate']) ) {


		$place = $place->search($_GET['searchvalue'], $_GET['minrate'], $_GET['maxrate']);

		if($place) {

			array_push($output, array(

				'data' => $place

			));

		} else {

			array_push($output, array(

				'data' => "No results find." 

			));
		}

	} else {

			array_push($output, array(

				'data' => "Please try again." 

			));
		
	}


	echo json_encode($output);

?>