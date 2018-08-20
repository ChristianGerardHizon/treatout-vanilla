<?php 
	include '../../../library/config.php';
	include '../../../classes/user.php';

	$users = new User($connection);

	if($_POST['password'] == $_POST['confirmpassword']) {

		$register = $users->register($_POST['name'], $_POST['email'], md5($_POST['password']));

	} else {

		echo "Please match passwords.";
	}

?>