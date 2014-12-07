<?php
	include('inc_userhandling.php');
	if(!isset($uid)) {
		die();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>ForMessage</title>
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
	include('inc_output.php');
?>
	<body>
		<div class="content">
			<div class="js-masonry" data-masonry-options='{ "columnWidth": 128, "itemSelector": ".m-item", "gutter": 10 }'>
				<div class="m-item square color-1-0 w2 logo"><div class="fulltext">ForMsg</div></div>
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
						<div class="m-item color-2-3 wf header header-persons">Personer<form class="form-wrapper cf"><input type="text" placeholder="Sök personer..." required class="contracting-search-field search-default"><button type="reset">Rensa</button></form></div>
<?php
	foreach (EzMsg::getAllPersons(null) as $person) {
		printPerson($person);
	}
?>
					</div>
				</div>
				<div class="slider-tab slider-groups">
					<div class="js-masonry" data-masonry-options='{ "columnWidth": 128, "itemSelector": ".m-item", "gutter": 10 }'>
						<div class="m-item color-3-3 wf header header-groups">Grupper<form class="form-wrapper cf"><input type="text" placeholder="Sök grupper..." required class="contracting-search-field search-default"><button type="reset">Rensa</button></form></div>
<?php
	foreach (EzMsg::getAllGroups() as $group) {
		$color = $group['color'];
		$id = $group['id'];
		echo '<div class="m-item ' . $color . '-3 w4">';
		echo '<div class="fulltext">' . $group['name'] . '</div>';
		echo '</div>';
		echo '<div class="m-item square button members ' . $color . '-2" data-id="g-' . $id . '" data-slide-id="slider-members-' . $id . '"><div>Medlemmar</div></div>';
		echo '<div class="m-item square button documents ' . $color . '-2" data-id="g-' . $id . '" data-slide-id="slider-documents-' . $id . '"><div>Dokument</div></div>';
		echo '<div class="m-item square button pictures ' . $color . '-2" data-id="g-' . $id . '" data-slide-id="slider-pictures-' . $id . '"><div>Bilder</div></div>';
		echo '<div class="m-item square button videos ' . $color . '-2" data-id="g-' . $id . '" data-slide-id="slider-videos-' . $id . '"><div>Filmer</div></div>';
		echo '<div class="m-item wf h0 scroll-y data ' . $color . '-2 g-' . $id . '">';
		echo '<div class="slider">';
		echo '<div class="slider-tab slider-members-' . $id . ' lazy-loading" data-contentUrl="content.php?content=members&groupId=' . $id . '"><div class="header">Medlemmar</div><div class="loader-target"></div></div>';
		echo '<div class="slider-tab slider-documents-' . $id . ' lazy-loading" data-contentUrl="content.php?content=documents&groupId=' . $id . '"><div class="header">Dokument</div><div class="loader-target"></div></div>';
		echo '<div class="slider-tab slider-pictures-' . $id . ' lazy-loading" data-contentUrl="content.php?content=pictures&groupId=' . $id . '"><div class="header">Bilder</div><div class="loader-target"></div></div>';
		echo '<div class="slider-tab slider-videos-' . $id . ' lazy-loading" data-contentUrl="content.php?content=videos&groupId=' . $id . '"><div class="header">Filmer</div><div class="loader-target"></div></div>';
		echo '</div></div>';
	}
?>
					</div>
				</div>
				<div class="slider-tab slider-settings">
					<div class="js-masonry" data-masonry-options='{ "columnWidth": 128, "itemSelector": ".m-item", "gutter": 10 }'>
						<div class="m-item color-4-3 wf header">Inställningar</div>
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
