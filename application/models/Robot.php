<?php

class Robot extends CI_Model {

    //mock data array
    var $robots = array(
        array('id'=>'1', 'bot'=> 'motley', 'price'=> '25', 'head'=>'m', 'torso'=>'r', 'leg'=>'a'),
        array('id'=>'2', 'bot'=> 'butler', 'price'=> '100','head'=>'m', 'torso'=>'m', 'leg'=>'m'),
        array('id'=>'3', 'bot'=> 'motley', 'price'=> '25', 'head'=>'m', 'torso'=>'r', 'leg'=>'a'),
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
