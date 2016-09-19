<?php

$home_controller = new HomeController();
$home_controller->Init();
?>

<?= $home_controller->getHeader() ?>

<div class="body center">
	<div id="New" class="tabcontent content-new" <?= ($home_controller->new_poll_start) ? "style='display: block;'" : "" ?>>
		<form method="post" name="new-poll">
			<div class="content-new-option" id="options">
				<h2 class="new-option-headers">1. Choose your options!</h2>
				<input name="choice1" data-slot="1" type="text" placeholder="Chipotle">
				<input name="choice2" data-slot="2" type="text" placeholder="Del Taco">
				<input name="choice3" data-slot="3" type="text" placeholder="Panda Express">
			</div>
			<div class="option-add-button" onclick="addOption()">
				+ Add More
			</div>

			<div class="content-customize">
				<h2 class="new-option-headers">2. Customize it!</h2>
				<div class="options-col-1">
					<input name="downvote" type="checkbox"> Allow Downvote
					<input name="add-options" type="checkbox"> Allow Adding Options
					<input name="secret-options" type="checkbox"> Make Options Secret
				</div>
				<div class="options-col-2">
					<input name="time-limit" type="checkbox"> 5 Minute Limit
					<input name="wildcards" type="checkbox"> Add Wildcards
					<input name="changes" type="checkbox"> Allow Vote Changes
				</div>
			</div>

			<div class="content-submit">
				<h2 class="new-option-headers">3. Jam the Vote!</h2>
				<input type="submit" class="option-submit-button" value="Create Your Super Lunch Vote!">
			</div>
		</form>
	</div>


	<div id="Current" class="tabcontent content-current" <?= ($home_controller->current_start) ? "style='display: block;'" : "" ?>>
		<h1>Super Lunch Vote Battle Results</h1>
		<div class="current-results">
			<div class="results-col results-option column-half">
				<div class="result">The Food Compound</div>
				<div class="result">The Bloated Tick</div>
				<div class="result">Pho-get about it!</div>
			</div>
			<div class="results-col results-count column-half">
				<div class="result">4</div>
				<div class="result">9</div>
				<div class="result">1</div>
			</div>
		</div>
	</div>


	<div id="Social" class="tabcontent content-social">
		<h1>Invite More People</h1>
		<div class="icons">
			<div class="icon" id="facebook">F</div>
			<div class="icon" id="twitter">T</div>
			<div class="icon" id="mail">M</div>
		</div>
		<div class="slack">
			<h2>Add Our Slack Extension</h2>
			<div class="slack-icon"></div>
		</div>
	</div>
</div>


<?= $home_controller->getFooter() ?>


