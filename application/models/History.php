<?php

class History extends CI_Model {
	var $data = array(
		array('id' => '1', 'type' => 'Purchase', 'data' => 'Part abcdef bought for $13.99', 'datetime' => '14:49:26 09-02-2017'),
		array('id' => '2', 'type' => 'Assembly', 'data' => 'Bot A2 built', 'datetime' => '14:49:26 09-02-2017'),
		array('id' => '3', 'type' => 'Shipments', 'data' => 'Shipped part deadbeef to 42 Wallaby Way Sydney', 'datetime' => '14:49:26 09-02-2017'),
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single quote
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	// retrieve all of the quotes
	public function all()
	{
		return $this->data;
	}

}
