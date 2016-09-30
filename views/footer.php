<?php
	// More stuff for PHP may go here
?>
		<div class="footer">
			<h4 class="slv-header">&copy; Nicholas Mejia 2016</h4>
			<h4 class="slv-header">Made for "10K Apart: Inspiring the web with Just 10k"</h4>
		</div>
	</div>
	<script type="text/javascript" src="assets/js/script.js"></script><script>
	(function() {
		document.getElementById("New").classList.remove('no-js');
		document.getElementById("Current").classList.remove('no-js');
		document.getElementById("Social").classList.remove('no-js');
		document.getElementById("OptionButton").classList.remove('no-js-button');

		var extratabclasses = document.getElementsByClassName('extra-input');
		while(extratabclasses.length > 0){
			extratabclasses[0].parentNode.removeChild(extratabclasses[0])
		}
	})();
</script>
</body>