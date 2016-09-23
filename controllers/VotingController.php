<?php

class VotingController{

	public $session;

	public function createSLVInstance($choices, $options){
		$session_array = [
			'url_string' => $this->generate_random_string(),
			'options'    => serialize($options),
		];
		$this->session = new Session($session_array);
		$this->session->save();
		foreach($choices as $choice){
			$choice_array = [
				'session_id' => $this->session->id,
				'slug'       => strtolower($choice),
				'name'       => $choice,
			];
			$choice = new Choice($choice_array);
			$choice->save();
		}
		return $session_array['url_string'];
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