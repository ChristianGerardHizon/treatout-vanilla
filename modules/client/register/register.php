<?php 
	include '../../../library/config.php';
	include '../../../classes/user.php';

	$users = new User($connection);

	$output = array();

	if($_POST['password'] == $_POST['confirmpassword']) {

		$register = $users->register($_POST['name'], $_POST['email'], md5($_POST['password']));


		if($register) {

				$output = array('response' => "Account created succssfuly.");
	
		} else {

			$output = array('response' => "Whoops! Looks like there's something wrong..");
		}

	} else {

		 $output = array('response' => "Please match password");
	}

	echo json_encode($output);
?>	