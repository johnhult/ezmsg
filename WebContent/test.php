<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>EzMsg</title>
		<link rel="stylesheet" href="css/ezmsg-fonts.css">
		<link rel="stylesheet" href="css/badge.css">
		<link rel="stylesheet" href="css/ezmsg-colors-base.css">
		<link rel="stylesheet" href="css/ezmsg-colors-3.css">
		<link rel="stylesheet" href="css/ezmsg.css">
		<script src="resources/jquery-1.10.2.min.js"></script>
		<script src="resources/masonry.pkgd.min.js"></script>
		<script src="js/ezmsg.js"></script>
	</head>
<?php
	include('inc_ezmsg.php');
?>
	<body>
		<div class="content">
			<div class="js-masonry" data-masonry-options='{ "columnWidth": 128, "itemSelector": ".m-item", "gutter": 10 }'>
				<div class="m-item square color-1-0 w2 logo"><div class="fulltext">ToTalk</div></div>
				<div class="m-item square button color-2-0 persons skip-3 action-slide" data-slide-id="slider-persons"><div>Personer</div></div>
				<div class="m-item square button color-3-0 groups action-slide" data-slide-id="slider-groups"><div>Grupper</div></div>
<!--  				<div class="m-item square button color-4-0 settings action-slide" data-slide-id="slider-settings"><div>Inställningar</div></div> -->
				<div class="m-item square button color-5-0 logout"><div>Logga ut</div></div>
			</div>
		</div>
		<div class="content">
			<div class="slider">
				<div class="slider-tab slider-persons">
					<div class="js-masonry" data-masonry-options='{ "columnWidth": 128, "itemSelector": ".m-item", "gutter": 10 }'>
						<div class="m-item color-2-1 wf header">Personer</div>
<?php
	foreach (EzMsg::getAllPersons() as $person) {
		echo '<div class="m-item profile ' . $person['color'] . '" id="p-' . $person['id'] . '">';
		echo '<img class="round margin" src="p/' . $person['picture'] . '" alt="' . $person['name'] . '"><h3>' . $person['name'] . '</h3>';
?>
							<div class="message-area">
								<div class="messages">
									<div class="me">Hej</div>
									<div class="them">Hej</div>
									<div class="me">Vad gör du?</div>
									<div class="me">Jag har tråkigt</div>
									<div class="them">Ok, jag pillar med CSS</div>
								</div>
							</div>
<?php
		echo '</div>';
	}
?>
						
					</div>
				</div>				
				<div class="slider-tab slider-groups">
					<div class="js-masonry" data-masonry-options='{ "columnWidth": 128, "itemSelector": ".m-item", "gutter": 10 }'>
						<div class="m-item color-3-1 wf header">Grupper</div>
<?php
	foreach (EzMsg::getAllGroups() as $group) {
		$color = $group['color'];
		$id = $group['id'];
		echo '<div class="m-item ' . $color . '-3 w4">';
		echo '<div class="fulltext">' . $group['name'] . '</div>';
		echo '</div>';
		echo '<div class="m-item square button members ' . $color . '-2" data-id="g-' . $id . '"><div>Medlemmar</div></div>';
		echo '<div class="m-item square button documents ' . $color . '-2" data-id="g-' . $id . '"><div>Dokument</div></div>';
		echo '<div class="m-item square button pictures ' . $color . '-2" data-id="g-' . $id . '"><div>Bilder</div></div>';
		echo '<div class="m-item square button videos ' . $color . '-2" data-id="g-' . $id . '"><div>Filmer</div></div>';
		echo '<div class="m-item skip-2 w6 h0 data ' . $color . '-2 g-' . $id . '"></div>';
	}
?>
					</div>
				</div>
				<div class="slider-tab slider-settings">
					<div class="js-masonry" data-masonry-options='{ "columnWidth": 128, "itemSelector": ".m-item", "gutter": 10 }'>
						<div class="m-item color-4-1 wf header">Inställningar</div>
					</div>
				</div>
			</div>
			<div id="hover"></div>
		</div>
		<div class="data" id="data-overlay">
			<div class="overlay">
				<div class="name"></div><div class="actions">
					<span class="action-send" data-content="data-send"></span>
				</div>
			</div>
		</div>
		<script src="js/ezmsg.js"></script>
	</body>
</html>
