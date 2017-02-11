<?php

/**
 * @author isaac
 */
class Part extends CI_Model {

    //mock data array
	var $parts = array(
        array('model'=> 'A', 'part'=> 'a1', 'type' => 1,
            'src'=>'parts/a1.jpeg', 'stock' => 1, 'title' =>'A 1 Part'),
        array('model'=> 'A', 'part'=> 'a2', 'type' => 2,
            'src'=>'parts/a2.jpeg', 'stock' => 1, 'title' =>'A 2 Part'),
        array('model'=> 'A', 'part'=> 'a3', 'type' => 3,
            'src'=>'parts/a3.jpeg', 'stock' => 1, 'title' =>'A 3 Part'),

        array('model'=> 'B', 'part'=> 'b1', 'type' => 1,
            'src'=>'parts/b1.jpeg', 'stock' => 1, 'title' =>'B 1 Part'),
        array('model'=> 'B', 'part'=> 'b2', 'type' => 2,
            'src'=>'parts/b2.jpeg', 'stock' => 1, 'title' =>'B 2 Part'),
        array('model'=> 'B', 'part'=> 'b3', 'type' => 3,
            'src'=>'parts/b3.jpeg', 'stock' => 1, 'title' =>'B 3 Part'),

        array('model'=> 'C', 'part'=> 'c1', 'type' => 1,
            'src'=>'parts/c1.jpeg', 'stock' => 1, 'title' =>'C 1 Part'),
        array('model'=> 'C', 'part'=> 'c2', 'type' => 2,
            'src'=>'parts/c2.jpeg', 'stock' => 1, 'title' =>'C 2 Part'),
        array('model'=> 'C', 'part'=> 'c3', 'type' => 3,
            'src'=>'parts/c3.jpeg', 'stock' => 1, 'title' =>'C 3 Part'),


        array('model'=> 'M', 'part'=> 'm1', 'type' => 1,
            'src'=>'parts/m1.jpeg', 'stock' => 1, 'title' =>'M 1 Part'),
        array('model'=> 'M', 'part'=> 'm2', 'type' => 2,
            'src'=>'parts/m2.jpeg', 'stock' => 1, 'title' =>'M 2 Part'),
        array('model'=> 'M', 'part'=> 'm3', 'type' => 3,
            'src'=>'parts/m3.jpeg', 'stock' => 1, 'title' =>'M 3 Part'),


        array('model'=> 'R', 'part'=> 'r1', 'type' => 1,
            'src'=>'parts/r1.jpeg', 'stock' => 1, 'title' =>'R 1 Part'),
        array('model'=> 'R', 'part'=> 'r2', 'type' => 2,
            'src'=>'parts/r2.jpeg', 'stock' => 1, 'title' =>'R 2 Part'),
        array('model'=> 'R', 'part'=> 'r3', 'type' => 3,
            'src'=>'parts/r3.jpeg', 'stock' => 1, 'title' =>'R 3 Part'),

        array('model'=> 'W', 'part'=> 'w1', 'type' => 1,
            'src'=>'parts/w1.jpeg', 'stock' => 1, 'title' =>'W 1 Part'),
        array('model'=> 'W', 'part'=> 'w2', 'type' => 2,
            'src'=>'parts/w2.jpeg', 'stock' => 1, 'title' =>'W 2 Part'),
        array('model'=> 'W', 'part'=> 'w3', 'type' => 3,
            'src'=>'parts/w3.jpeg', 'stock' => 1, 'title' =>'W 3 Part')
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

    //returns the total number of parts in stock
    public function partCount(){
        return count($parts);
    } 

    //returns all records matching the $value by default agains the 'type' property
	public function get($value, $type = 'type')
	{
        $records = array();
		foreach ($this->parts as $record)
            if ($record[$type] == $value)
                $records[] = $record;
	    return $records;
	}

    //returns all the parts
	public function all()
	{
		return $this->parts;
	}

}
