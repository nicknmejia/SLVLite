<?php

$home_controller = new HomeController();
$instance_controller = new InstanceController();

$customizations = ['downvote', 'add-options', 'secret-options', 'time-limit', 'wildcards', 'changes'];

$url_key = $instance_controller->createInstance();
if(!$url_key){
	$url_key = ($home_controller->getURLKey()) ? $home_controller->getURLKey() : $_POST['url_key'];
}
$slv_instance = $home_controller->getSLVInstance($url_key);

$user_voted = $instance_controller->checkIfUserVoted($url_key);

if(isset($_POST['choice'])){
	if($user_voted){
		$already_voted = "You already voted!";
	}
	else{
		$instance_controller->createVoteObject($_POST['choice'], $url_key);
		$slv_instance = $home_controller->getSLVInstance($url_key);
	}
}

$foo = 'bar';

?>

<?= $home_controller->getHeader() ?>

<div class="body center">
	<div id="New" class="tabcontent content-new no-js" <?= (!is_int($slv_instance['id'])) ? "style='display: block;'" : "" ?>>
		<form method="post" name="new-poll">
			<div class="content-new-option" id="options">
				<h2 class="new-option-headers"><span class="num-1">1.</span> Add Some Places/Things to Eat</h2>
				<input name="choice1" data-slot="1" type="text" placeholder="Greasy Ethel's">
				<input name="choice2" data-slot="2" type="text" placeholder="The Big Bite">
				<input class="extra-input" name="choice3" data-slot="2" type="text" placeholder="Lunch Masters">
				<input class="extra-input" name="choice4" data-slot="2" type="text" placeholder="The Masticators">
				<input class="extra-input" name="choice5" data-slot="2" type="text" placeholder="Sloppy Joe's">
			</div>
			<div id="OptionButton" class="option-add-button no-js-button" onclick="addOption()">
				+ Add More
			</div>

<!--			<div class="content-customize">-->
<!--				<h2 class="new-option-headers"><span class="num-2">2.</span> Mod your lunchvote</h2>-->
<!--				<div class="options-col-1">-->
<!--					<div class="input-option">-->
<!--						5 Min Time Limit-->
<!--						<input name="time-limit" type="checkbox" id="cb1" />-->
<!--						<label for="cb1" class="check-box"></label>-->
<!--					</div>-->
<!--					<div class="input-option">-->
<!--						Downvoting Allowed-->
<!--						<input name="downvote" type="checkbox" id="cb2" />-->
<!--						<label for="cb2" class="check-box"></label>-->
<!--					</div>-->
<!--					<div class="input-option">-->
<!--						Vote Changing Allowed-->
<!--						<input name="changes" type="checkbox" id="cb3" />-->
<!--						<label for="cb3" class="check-box"></label>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="options-col-2">-->
<!--					<input name="time-limit" type="checkbox"> 5 Minute Limit-->
<!--					<input name="wildcards" type="checkbox"> Add Wildcards-->
<!--					<input name="changes" type="checkbox"> Allow Vote Changes-->
<!--				</div>-->
<!--			</div>-->

			<div class="content-submit">
				<h2 class="new-option-headers"><span class="num-3">2.</span> Create your super lunch vote</h2>
				<input type="submit" class="option-submit-button" value="Jam the Vote">
			</div>
		</form>
	</div>


	<div id="Current" class="tabcontent content-current  no-js" <?= (is_int($slv_instance['id'])) ? "style='display: block;'" : "" ?>>
		<h1>Super Lunch Vote Battle Results</h1>
		<?= ($user_voted) ? "<h1>" . $already_voted . "</h1>": "";  ?>
		<div class="current-results">
			<?php $i = 0; ?>
			<?php foreach($slv_instance['choices'] as $choice){ ?>
			<form <?php if($choice->name == ""){ echo "style='display: none;'";} ?> method="post" name="choice-<?= $choice->id ?>">
				<input type="hidden" name="url_key" value="<?= $url_key ?>">
				<div class="choice">

					<div class="results-col results-option column-half">
						<div class="result" data-id="<?= $choice->id ?>"><?= $choice->name ?></div>
						<input type="hidden" name="choice" value="<?= $choice->id ?>">
					</div>

					<div class="results-col results-count column-half">
						<div class="result" data-id="<?= $choice->id ?>"><?= ($slv_instance['votes'][$i][0]->count != 0) ? $slv_instance['votes'][$i][0]->count : "0" ;?></div>
					</div>
					<input type="submit" class="option-submit-button" value="Vote!">
				</div>
			</form>
				<?php $i++ ?>
			<?php } ?>

		</div>
		<div class="results-share">
			<h2 class="results-header">Invite friends to the battle with this link</h2>
			<h5>Click the text to select all, then hit ctrl + v / cmd + v</h5>
			<div class="url-container">
				<input onClick="this.setSelectionRange(0, this.value.length)" type="text" id="copyTarget" value="<?= $_SERVER['HTTP_HOST'] ?>/?slv=<?= $url_key ?>">
			</div>
		</div>
	</div>


	<div id="Social" class="tabcontent content-social no-js">
		<h1>Invite More People</h1>
		<div class="icons">
			<a onclick="window.open('http://www.facebook.com/sharer.php?u=<?= $_SERVER['HTTP_HOST'] ?>/?slv=<?= $url_key ?>', 'newwindow', 'width=300, height=250'); return false;" href="#"><div class="icon" id="facebook"><img class="sm-icon" src="assets/img/facebook.svg"/></div></a>
			<a onclick="window.open('http://twitter.com/home?status=http%3A//<?= $_SERVER['HTTP_HOST'] ?>/?slv=<?= $url_key ?>', 'newwindow', 'width=300, height=250'); return false;" href="#"><div class="icon" id="twitter"><img class="sm-icon" src="assets/img/twitter.svg"/></div></a>
			<a href="mailto:someone@example.com?Subject=Hello%20again&body=You have been invited to the Super Lunch Vote lunch battle!  Click this link to place your vote for lunch: <?= $_SERVER['HTTP_HOST'] ?>/?slv=<?= $url_key ?>" target="_top"><div class="icon" id="mail"><img class="sm-icon" src="assets/img/envelope.svg"/></div></a>
		</div>
<!--		<div class="slack">-->
<!--			<h2>Add Our Slack Extension</h2>-->
<!--			<div class="slack-icon"></div>-->
<!--		</div>-->
	</div>
</div>


<?= $home_controller->getFooter() ?>


