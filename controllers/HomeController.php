<?php

class HomeController{

	protected $instance_id;
	public $new_poll_start;
	public $current_start;

	public function getHeader(){
		include 'views/header.php';
		return null;
	}

	public function getFooter(){
		include 'views/footer.php';
		return null;
	}

	public function getURLKey(){
		if(isset($_GET['slv']) || isset($_POST['slv'])){
			return (isset($_POST['url_key'])) ? $_POST['slv'] : $_GET['slv'] ;
		}
		return false;
	}

	public function getSLVInstance($url_key){
		$current_votes = [];
		$instance = Session::find('all', array('conditions' => array('url_string = ?', $url_key)));
		$choices = Choice::find('all', array('conditions' => array('session_id = ?', $instance[0]->id)));
		foreach($choices as $choice){
			$current_votes[] = Vote::find('all', array('conditions' => array('choice_id = ?', $choice->id)));
		}

		$data = [
			'id' => $instance[0]->id,
			'options' => $instance[0]->options,
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