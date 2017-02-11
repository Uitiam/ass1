<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parts extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'parts';

		// build the list of authors, to pass on to our view
		$source = $this->part->all();
		$parts = array();
		foreach ($source as $record)
		{
            $parts[] = array ('src' => $record['src'], 'title' => $record['title'], 'UID'=> $record['UID'],
            'CA'=> $record['CA'], 'PlantCode'=>$record['PlantCode'], 'datetime'=>$record['datetime']);
		}
		$this->data['parts'] = $parts;

		$this->render();
	}

}
