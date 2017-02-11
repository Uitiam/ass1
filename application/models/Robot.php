<?php

class Robot extends CI_Model {

    //mock data array
    var $robots = array(
        array('bot'=> 'motley', 'price'=> '25'),
        array('bot'=> 'butler', 'price'=> '100'),
        array('bot'=> 'motley', 'price'=> '25'),
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

    //returns all records matching the $value by default agains the 'type' property
	public function get($value, $type = 'bot')
	{
        $records = array();
        foreach($this->robots as $record)
            if($records[$type] == $value)
                $records[] = $record;
        return $records;    
	}

    //returns the total number of robots in stock
    public function botCount(){
        return count($this->robots);
    }

    //returns all the robots
	public function all()
	{
		return $this->robots;
	}


}
