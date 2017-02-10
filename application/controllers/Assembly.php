<?php
/**
*@author Maitiu
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends Application
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
		$this->data['pagebody'] = 'assembly';

		$hSource= $this->part->get(1);
        $tSource = $this->part->get(2);
        $lSource = $this->part->get(3);
		$heads = array();
        $torso = array();
        $legs = array();
		foreach ($hSource as $record)
		{
			$heads[] = array ('src' => $record['src'], 'title' => $record['title']);
		}
        foreach ($tSource as $record)
		{
			$torso[] = array ('src' => $record['src'], 'title' => $record['title']);
		}
        foreach ($lSource as $record)
		{
			$legs[] = array ('src' => $record['src'], 'title' => $record['title']);
		}
		$this->data['heads'] = $heads;
        $this->data['torso'] = $torso;
        $this->data['legs'] = $legs;

        $this->data['robotHead'] = array($heads[0]);
        $this->data['robotTorso'] = array($torso[0]);
        $this->data['robotLegs'] = array($legs[0]);

		$this->render();
	}

}
