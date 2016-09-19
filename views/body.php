<?php

$home_controller = new HomeController();
$home_controller->Init();
?>

<?= $home_controller->getHeader() ?>

<div class="body center">
	<div id="New" class="tabcontent content-new" <?= ($home_controller->new_poll_start) ? "style='display: block;'" : "" ?>>

		<div class="content-new-option" id="options">
			<h2 class="new-option-headers">1. Choose your options!</h2>
			<input type="text" placeholder="Chipotle">
			<input type="text" placeholder="Del Taco">
			<input type="text" placeholder="Panda Express">
		</div>
		<div class="option-add-button" onclick="addOption()">
			+ Add More
		</div>

		<div class="content-customize">
			<h2 class="new-option-headers">2. Customize it!</h2>
			<div class="options-col-1">
				<input type="checkbox"> Option 1
				<input type="checkbox"> Option 2
				<input type="checkbox"> Option 3
			</div>
			<div class="options-col-2">
				<input type="checkbox"> Option 4
				<input type="checkbox"> Option 5
				<input type="checkbox"> Option 6
			</div>
		</div>

		<div class="content-submit">
			<h2 class="new-option-headers">3. Jam the Vote!</h2>
			<div class="option-submit-button">
				Create Your Super Lunch Vote!
			</div>
		</div>

	</div>
	<div id="Current" class="tabcontent content-current" <?= ($home_controller->current_start) ? "style='display: block;'" : "" ?>>
		<h1>Shows the current poll</h1>
	</div>
	<div id="Social" class="tabcontent content-social">
		<h1>Shows the social media options</h1>
	</div>
</div>


<?= $home_controller->getFooter() ?>


