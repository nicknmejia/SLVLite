<?php

class Session extends ActiveRecord\Model{
	static $attr_accessible = array('id','url_string','options');
}