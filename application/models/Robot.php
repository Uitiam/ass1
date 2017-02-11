<?php

class Robot extends CI_Model {

	// The data comes from http://www.quotery.com/top-100-funny-quotes-of-all-time/?PageSpeed=noscript
    var $robots = array(
        array('bot'=> 'motley', 'price'=> '25'),
        array('type'=> 'butler', 'model'=> '100'),
        array('type'=> 'motley', 'model'=> '25'),
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single quote
	public function get($value, $type = 'bot')
	{
        records = array()
        foreach($this->robots as $record){
            if(records[$type]) == $value){
                $records[] = $record;
            }

            return $records;    
        }
		return null;
	}

	// retrieve all of the quotes
	public function all()
	{
		return $this->robots;
	}

}
