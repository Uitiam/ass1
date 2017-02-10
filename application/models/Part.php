<?php

/**
 * @author isaac
 */
class Part extends CI_Model {

	var $parts = array(
        array('model'=> 'A', 'part'=> 'a1', 'type' => 1,
            'src'=>'parts/a1.jpeg', 'stock' => 1, 'title' =>'A 1 Part!'),
        array('model'=> 'A', 'part'=> 'a2', 'type' => 2,
            'src'=>'parts/a2.jpeg', 'stock' => 1, 'title' =>'A 2 Part!'),
        array('model'=> 'A', 'part'=> 'a3', 'type' => 3,
            'src'=>'parts/a3.jpeg', 'stock' => 1, 'title' =>'A 3 Part!'),

        array('model'=> 'B', 'part'=> 'b1', 'type' => 1,
            'src'=>'parts/b1.jpeg', 'stock' => 1, 'title' =>'B 1 Part!'),
        array('model'=> 'B', 'part'=> 'b2', 'type' => 2,
            'src'=>'parts/b2.jpeg', 'stock' => 1, 'title' =>'B 2 Part!'),
        array('model'=> 'B', 'part'=> 'b3', 'type' => 3,
            'src'=>'parts/b3.jpeg', 'stock' => 1, 'title' =>'B 3 Part!')
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single quote
	public function get($value, $type = 'type')
	{
        $records = array();
		foreach ($this->parts as $record)
            if ($record[$type] == $value)
                $records[] = $record;
	    return $records;
	}

	// retrieve all of the quotes
	public function all()
	{
		return $this->parts;
	}

}
