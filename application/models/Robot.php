<?php

class Robot extends CI_Model {

	// The data comes from http://www.quotery.com/top-100-funny-quotes-of-all-time/?PageSpeed=noscript
	var $top;
    var $torso;
    var $bottom;
    var $worth;

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single quote
	public function getType($which)
	{

		return null;
	}

	// retrieve all of the quotes
	public function all()
	{
		return $this->data;
	}

}
