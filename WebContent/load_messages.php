<?php
	header("Content-Type: text/html; charset=utf-8");
	include('inc_userhandling.php');
	if(!isset($uid)) {
		die();
	}
	$toUser = $_GET['toUser'];
	$lastMessage = $_GET['lastMessage'];
	$newMessages = $_GET['newMessages'];
	if(isset($toUser)) {
		echo '[';
		foreach (EzMsg::getMessagesForUser($uid, $toUser, $lastMessage) as $message) {
			if ($addComma) {
				echo ',';
			}
			echo '{"from":"' . $message['from'] . '", "time":"' . $message['time'] . '", "counter": "' . $message['counter'] . '", "message":' . json_encode($message['message']) . '}';
			$addComma = true;
		}
		echo ']';
	} else if (isset($newMessages)) {
		echo 'hå';
		echo '[';
		foreach (EzMsg::getUnreadMessageFor($uid) as $message) {
			if ($addComma) {
				echo ',';
			}
			echo '{"from":"' . $message['from'] . '", "counter":"' . $message['counter'] . '"}';
			$addComma = true;
		}
		echo ']';
	}
?>

