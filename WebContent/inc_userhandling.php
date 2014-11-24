<?php
	session_start();
	$uid = $_SESSION['uid'];
	if (!isset($uid)) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($username == 'foretag@gmail.com' && $password == 'pass123') {
			$uid = 'apa';
			$_SESSION['uid'] = 'apa';
		} else {
			include('inc_login.php');
			die();
		}
	} else {
		if (isset($_GET['logout'])) {
			session_unset();
			unset($uid);
			header('Location: index.php');
			die();
		}
	}
?>