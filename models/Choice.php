<?php

class Choice extends ActiveRecord\Model{
	static $attr_accessible = array('session_id','slug','name');
}