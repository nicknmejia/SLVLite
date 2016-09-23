<?php

class InstanceController{
	public function createInstance(){
		if(isset($_POST['choice1']) && isset($_POST['choice2'])){
			$choices = [];
			$options = [];
			foreach($_POST as $type => $post){
				if($post != 'on'){
					array_push($choices, $post);
				}
				else{
					$options[$type] = $post;
				}
			}
			$voting_controller = new VotingController();
			$voting_controller->createSLVInstance($choices, $options);

		}
	}
}