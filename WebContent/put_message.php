<?php
	header("Content-Type: text/html; charset=utf-8");
	include('inc_userhandling.php');
	if(!isset($uid)) {
		die();
	}
	$toUid = $_POST['uid'];
	$message = $_POST['message'];
	if(isset($toUid) && isset($message)) {
		EzMsg::newMessageForUser($uid, $toUid, $message);
	} else {
		echo 'Anrop till nytt meddelande var felaktigt, uid = ' . $toUid . ', message = ' . $message;
	}
?>

