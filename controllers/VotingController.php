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

	public static function saveVote($choice_id){
		$vote_exists = Vote::find('all', array('conditions' => array('choice_id = ?', $choice_id)));
		if(!$vote_exists || empty($vote_exists)) {
			$vote = new Vote( array(
				'choice_id' => $choice_id,
				'count'     => 1
			) );
			return $vote->save();
		}
		if($vote_exists[0]->count == null){
			return false;
		}
		$new_count = $vote_exists[0]->count + 1;
		$vote_exists[0]->count = $new_count;
		$vote_exists[0]->save();
	}

	public static function removeVote($choice_id){
		$vote = Vote::find('all', array('conditions' => array('choice_id = ?', $choice_id)));
		$new_count = $vote[0]->count - 1;
		$vote->count = $new_count;
		$vote->save();
	}

	public function endVoting(){
		//TODO: Function to disable further voting on an SLV instance
	}

	public function applyOptions(){
		//TODO: Apply various options to an SLV instance
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