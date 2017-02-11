<?php

class History extends CI_Model {

    //mock data array
	var $data = array(
        array('id' => '1', 'type' => 'Purchase', 
            'data' => 'Part A1 bought for $13.99', 
            'cost' =>13.99 , 'sold' =>0 , 'datetime' => '14:49:26 09-02-2017'),
        array('id' => '2', 'type' => 'Assembly', 
            'data' => 'Bot A built', 
            'cost' =>12, 'sold' =>30, 'datetime' => '14:49:26 09-02-2017'),
        array('id' => '3', 'type' => 'Shipment', 
            'data' => 'Shipped part B3 to GrapeFruit team', 
            'cost' =>19.99, 'sold' =>25.99, 'datetime' => '14:49:26 09-02-2017'),
        array('id' => '4', 'type' => 'Shipment', 
            'data' => 'Shipped part deadbeef to 42 Wallaby Way Sydney', 
            'cost' =>45.00, 'sold' =>25.99, 'datetime' => '14:49:26 09-02-2017'),
        array('id' => '5', 'type' => 'Shipment', 
            'data' => 'Shipped bot W1 to Umbrella Corp.', 
            'cost' =>17.77, 'sold' =>150.00, 'datetime' => '14:49:26 09-02-2017'),
        array('id' => '6', 'type' => 'Assembly', 
            'data' => 'Bot C built', 
            'cost' =>12, 'sold' =>30, 'datetime' => '14:49:26 09-02-2017'),
        array('id' => '7', 'type' => 'Assembly', 
            'data' => 'Bot R built', 
            'cost' =>12, 'sold' =>30, 'datetime' => '14:49:26 09-02-2017'),
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

    //returns all records matching the $value by default against the 'type' property
	public function get($value, $type = 'type')
	{
        $records = array();
		foreach ($this->data as $record)
            if ($record[$type] == $value)
                $records[] = $record;
	    return $records;
	}

    //return all records
	public function all()
	{
		return $this->data;
	}

    //calculate the total cost so far
    public function cost() {
        $sum = 0;
		$data = $this->data();
		foreach ($data as $trans) {
            $sum += $trans['cost'];
        }
        return $sum;
    }

    //calculate the total sales so far
    public function sales() {
        $sum = 0;
		$data = $this->data();
		foreach ($data as $trans) {
            $sum += $trans['sold'];
        }
        return $sum;
    }
}
