<?php

class VotingController{

	public function createSLVInstance($choices, $options){
		$session_array = [
			'url_string' => $this->generate_random_string(),
			'options'    => serialize($options),
		];
		$session = new Session($session_array);
		$session->save();
		foreach($choices as $choice){
			$choice_array = [
				'session_id' => $session->id,
				'slug'       => strtolower($choice),
				'name'       => $choice,
			];
			$choice = new Choice($choice_array);
			$choice->save();
		}
		return true;
	}

	public function saveVote(){

	}

	public function removeVote(){

	}

	public function endVoting(){

	}

	public function applyOptions(){

	}



	private function generate_random_string($length = 15) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

}