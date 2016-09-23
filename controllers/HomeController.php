<?php
include 'models/Quote.php';
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

	public function getVoterInstance(){
		// TODO: Add SQLite query for getting SLV instance data
		$data = false;
		return $data;
	}

	public static function getSLVQuote(){
		$id = rand(1,15);
		$quote = Quote::find($id);
		return $quote->quote;
	}

}