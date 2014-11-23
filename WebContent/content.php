<?php
	header("Content-Type: text/html; charset=utf-8");
	include('inc_ezmsg.php');
	include('inc_output.php');
	$content = $_GET['content'];
	try {
		if ($content == 'members') {
			getMembersForGroup ();
		}
	} catch (Exception $e) {
		echo '<div class="error"><h4>Ett fel har uppstått:</h4><p>' . $e->getMessage() . '</p></div>';
	}

	function getMembersForGroup() {
		$groupId = $_GET ['groupId'];
		if (isset($groupId)) {
			foreach (EzMsg::getAllPersons ($groupId) as $person) {
				printPerson($person);
			}
		} else {
			throw new Exception('Anrop till hämta medlemmar i grupp var felaktigt');
		}
	}
?>
