<?php

class Vote extends ActiveRecord\Model{
	static $attr_accessible = array('choice_id');
}