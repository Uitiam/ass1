<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryController extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'history';

		$data = $this->history->all();
		$history = array();
		foreach ($data as $trans)
		{
			$history[] = array ('type' => $trans['type'], 'data' => $trans['data'], 'cost' => $trans['cost'], 'sold' => $trans['sold'], 'datetime' => $trans['datetime']);
		}
		$this->data['history'] = $history;

		$this->render();
	}
}
