<?php

/**
 * @author isaac
 */
class Part extends CI_Model {

    //mock data array
	var $parts = array(
        array('model'=> 'A', 'part'=> 'a1', 'type' => 1,
            'UID' => 100, 'CA'=>4567, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/a1.jpeg', 'stock' => 1, 'title' =>'A 1 Part'),
        array('model'=> 'A', 'part'=> 'a2', 'type' => 2,
            'UID' => 101, 'CA'=>4568, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/a2.jpeg', 'stock' => 1, 'title' =>'A 2 Part'),
        array('model'=> 'A', 'part'=> 'a3', 'type' => 3,
            'UID' => 102, 'CA'=>4569, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/a3.jpeg', 'stock' => 1, 'title' =>'A 3 Part'),

        array('model'=> 'B', 'part'=> 'b1', 'type' => 1,
            'UID' => 103, 'CA'=>4570, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/b1.jpeg', 'stock' => 1, 'title' =>'B 1 Part'),
        array('model'=> 'B', 'part'=> 'b2', 'type' => 2,
            'UID' => 104, 'CA'=>4571, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/b2.jpeg', 'stock' => 1, 'title' =>'B 2 Part'),
        array('model'=> 'B', 'part'=> 'b3', 'type' => 3,
            'UID' => 105, 'CA'=>4572, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/b3.jpeg', 'stock' => 1, 'title' =>'B 3 Part'),

        array('model'=> 'C', 'part'=> 'c1', 'type' => 1,
            'UID' => 106, 'CA'=>4573, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/c1.jpeg', 'stock' => 1, 'title' =>'C 1 Part'),
        array('model'=> 'C', 'part'=> 'c2', 'type' => 2,
            'UID' => 107, 'CA'=>4574, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/c2.jpeg', 'stock' => 1, 'title' =>'C 2 Part'),
        array('model'=> 'C', 'part'=> 'c3', 'type' => 3,
            'UID' => 108, 'CA'=>4575, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/c3.jpeg', 'stock' => 1, 'title' =>'C 3 Part'),


        array('model'=> 'M', 'part'=> 'm1', 'type' => 1,
            'UID' => 109, 'CA'=>4576, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/m1.jpeg', 'stock' => 1, 'title' =>'M 1 Part'),
        array('model'=> 'M', 'part'=> 'm2', 'type' => 2,
            'UID' => 110, 'CA'=>4577, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/m2.jpeg', 'stock' => 1, 'title' =>'M 2 Part'),
        array('model'=> 'M', 'part'=> 'm3', 'type' => 3,
            'UID' => 111, 'CA'=>4578, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/m3.jpeg', 'stock' => 1, 'title' =>'M 3 Part'),


        array('model'=> 'R', 'part'=> 'r1', 'type' => 1,
            'UID' => 112, 'CA'=>4579, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/r1.jpeg', 'stock' => 1, 'title' =>'R 1 Part'),
        array('model'=> 'R', 'part'=> 'r2', 'type' => 2,
            'UID' => 113, 'CA'=>4580, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/r2.jpeg', 'stock' => 1, 'title' =>'R 2 Part'),
        array('model'=> 'R', 'part'=> 'r3', 'type' => 3,
            'UID' => 114, 'CA'=>4581, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/r3.jpeg', 'stock' => 1, 'title' =>'R 3 Part'),

        array('model'=> 'W', 'part'=> 'w1', 'type' => 1,
            'UID' => 115, 'CA'=>4582, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/w1.jpeg', 'stock' => 1, 'title' =>'W 1 Part'),
        array('model'=> 'W', 'part'=> 'w2', 'type' => 2,
            'UID' => 116, 'CA'=>4583, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/w2.jpeg', 'stock' => 1, 'title' =>'W 2 Part'),
        array('model'=> 'W', 'part'=> 'w3', 'type' => 3,
            'UID' => 117, 'CA'=>4584, 'PlantCode'=> 'P112', 'datetime'=> '14:49:26 09-02-2017',
            'src'=>'parts/w3.jpeg', 'stock' => 1, 'title' =>'W 3 Part')
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

    //returns the total number of parts in stock
    public function partCount(){
        return count($this->parts);
    } 

    //returns all records matching the $value by default against the 'type' property
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
