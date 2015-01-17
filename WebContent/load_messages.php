<?php
	header("Content-Type: text/html; charset=utf-8");
	include('inc_userhandling.php');
	if(!isset($uid)) {
		die();
	}
	$toUser = $_GET['toUser'];
	if(isset($toUser)) {
		echo '[';
		foreach (EzMsg::getMessagesForUser($uid, $toUser) as $message) {
			if ($addComma) {
				echo ',';
			}
			echo '{"from":"' . $message['from'] . '", "time":"' . $message['time'] . '", "message":"' . $message['message'] . '"}';
			$addComma = true;
		}
		echo ']';
	} else {
		throw new Exception('Anrop till meddelanden var felaktigt');
	}
?>

