<?php
	session_start();
	$uid = $_SESSION['uid'];
	$isAdmin = $_SESSION['isAdmin'];
	if (!isset($uid)) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user = EzMsg::getUserInformation($username, $password);
		if (isset($user)) {
			$uid = $user['id'];
			$isAdmin = $user['admin'];
			$_SESSION['uid'] = $uid;
			$_SESSION['isAdmin'] = $isAdmin;
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