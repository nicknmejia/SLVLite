<?php

class InstanceController{

	public function createInstance() {
		if ( isset( $_POST['choice1'] ) && isset( $_POST['choice2'] ) ) {
			$choices = [ ];
			$options = [ ];
			foreach ( $_POST as $type => $post ) {
				if ( $post != 'on' ) {
					array_push( $choices, $post );
				} else {
					$options[ $type ] = $post;
				}
			}
			$voting_controller = new VotingController();
			$url_key           = $voting_controller->createSLVInstance( $choices, $options );

			return $url_key;
		}

	}

	public function createVoteObject($choice_id, $url_key){
		VotingController::saveVote($choice_id);
		$this->set_user_cookies($url_key);
	}

	public static function checkIfUserVoted($url_key){
		$cookie_data = unserialize($_COOKIE['voted']);
		if(!$cookie_data){
			return false;
		}
		elseif($cookie_data['user_ip'] == $_SERVER['REMOTE_ADDR'] && $cookie_data['url_key'] == $url_key){
			return true;
		}
		else{
			return false;
		}
	}

	private function set_user_cookies($url_key){
		$cookie_data = [
			'user_ip'       => $_SERVER['REMOTE_ADDR'],
			'voted'         => true,
			'slv_instance'  => $url_key,
		];

		setcookie('voted', serialize($cookie_data), time()+60*60*24*30);
	}
}