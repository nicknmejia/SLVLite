<?php

class HomeController{

	protected $instance_id;
	public $new_poll_start;
	public $current_start;

	public function Init(){
		$this->instance_id = $_GET['instance'];
		if($this->instance_id){
			$this->current_start = true;
			return $this->getVoterInstance();
		}
		else{
			$this->new_poll_start = true;
			return null;
		}
	}

	public function getHeader(){
		include 'views/header.php';
		return null;
	}

	public function getFooter(){
		include 'views/footer.php';
		return null;
	}

	public function getSLVInstance(){
		$current_votes = [];
		$instance = Session::find('all', array('conditions' => array('url = ?', $_GET['slv'])));
		$choices = Choice::find('all', array('conditions' => array('session_id = ?', $instance->id)));
		foreach($choices as $choice){
			$current_votes[] = Vote::find('all', array('conditions' => array('choice_id = ?', $choice->id)));
		}

		$data = [
			'id' => $instance->id,
			'options' => $instance->options,
			'choices' => $choices,
			'votes'   => $current_votes,
		];

		return $data;
	}

	public static function getSLVQuote(){
		$id = rand(1,15);
		$quote = Quote::find($id);
		return $quote->quote;
	}

}