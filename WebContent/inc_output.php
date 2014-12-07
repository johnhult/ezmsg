<?php
	function printPerson($person) {
		echo '<div class="m-item profile ' . $person ['color'] . '" id="p-' . $person ['id'] . '"><div class="clickTarget">';
		echo '<img class="round margin" src="p/' . $person ['picture'] . '" alt="' . $person ['name'] . '"><h3>' . $person ['name'] . '</h3>';
		echo '</div></div>';
	}
?>
