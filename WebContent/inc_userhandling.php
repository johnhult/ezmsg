<?php
	include('inc_ezmsg.php');
	session_start();
	$uid = $_SESSION['user.uid'];
	if (!isset($uid)) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user = EzMsg::getUserInformation($username, $password);
		if (isset($user)) {
			$uid = $user['id'];
			$isAdmin = $user['admin'];
			$picture = $user['picture'];
			$_SESSION['user.uid'] = $uid;
			$_SESSION['user.admin'] = $isAdmin;
			$_SESSION['user.picture'] = $picture;
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
		} else {
			$isAdmin = $_SESSION['user.admin'];
			$picture = $_SESSION['user.picture'];
		}
	}
?>