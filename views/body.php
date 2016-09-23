<?php

$home_controller = new HomeController();
$instance_controller = new InstanceController();

$customizations = ['downvote', 'add-options', 'secret-options', 'time-limit', 'wildcards', 'changes'];

$url_key = $instance_controller->createInstance();
if(!$url_key){
	$url_key = $home_controller->getURLKey();
}
$slv_instance = $home_controller->getSLVInstance($url_key);

$foo = 'bar';

?>

<?= $home_controller->getHeader() ?>

<div class="body center">
	<div id="New" class="tabcontent content-new" <?= (!is_int($slv_instance['id'])) ? "style='display: block;'" : "" ?>>
		<form method="post" name="new-poll">
			<div class="content-new-option" id="options">
				<h2 class="new-option-headers">1. Choose your options!</h2>
				<input name="choice1" data-slot="1" type="text" placeholder="Chipotle">
				<input name="choice2" data-slot="2" type="text" placeholder="Del Taco">
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


	<div id="Current" class="tabcontent content-current" <?= (is_int($slv_instance['id'])) ? "style='display: block;'" : "" ?>>
		<h1>Super Lunch Vote Battle Results</h1>
		<div class="current-results">
			<div class="results-col results-option column-half">
				<?php foreach($slv_instance['choices'] as $choice){ ?>
				<div class="result" data-id="<?= $choice->id ?>"><?= $choice->name ?></div>
				<?php } ?>
			</div>
			<div class="results-col results-count column-half">
				<?php foreach($slv_instance['choices'] as $choice){ ?>
					<div class="result" data-id="<?= $choice->id ?>">0</div>
				<?php } ?>
			</div>
		</div>
		<div class="results-share">
			<h2 class="results-header">Invite friends to the battle with this link</h2>
			<div class="url-container">
				slvlite.dev/?slv=<?= $url_key ?>
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


