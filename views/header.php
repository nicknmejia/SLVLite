<?php
	// Get some stuff here maybe
	$quote =HomeController::getSLVQuote();
?>
<head>
	<title>Super Lunch Vote Lite</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<div class="container center">
		<div class="header center">
			<div class="titles">
				<h1 class="title-slv slv-header">Super Lunch Vote</h1>
				<h1 class="title-lite slv-header">Lite</h1>
				<h2 class="title-quote slv-header">"<?= $quote ?>"</h2>
			</div>
			<div class="navigation">
				<div class="new-vote tablinks" onclick="tabToggle(event, 'New')">
					<h2 class="nav-button-header slv-header">New Poll | </h2>
				</div>
				<div class="current-vote tablinks" onclick="tabToggle(event, 'Current')">
					<h2 class="nav-button-header slv-header">Current Poll | </h2>
				</div>
				<div class="social-media tablinks" onclick="tabToggle(event, 'Social')">
					<h2 class="nav-button-header slv-header">Share</h2>
				</div>
			</div>
		</div>
