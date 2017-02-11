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

		$all = $this->history->all();
        $assembly = $this->history->get('Assembly');
        $purchase = $this->history->get('Purchase');
        $shipment = $this->history->get('Shipment');

		$historyOut = array();
		foreach ($all as $trans)
            $historyOut[] = array ('type' => $trans['type'], 'data' => $trans['data'],
                'cost' => $trans['cost'], 'sold' => $trans['sold'], 'datetime' => $trans['datetime']);

		$assemblyOut = array();
		foreach ($assembly as $trans)
            $assemblyOut[] = array ('type' => $trans['type'], 'data' => $trans['data'],
                'cost' => $trans['cost'], 'sold' => $trans['sold'], 'datetime' => $trans['datetime']);

		$purchaseOut = array();
		foreach ($purchase as $trans)
            $purchaseOut[] = array ('type' => $trans['type'], 'data' => $trans['data'],
                'cost' => $trans['cost'], 'sold' => $trans['sold'], 'datetime' => $trans['datetime']);

		$shipmentOut = array();
		foreach ($shipment as $trans)
            $shipmentOut[] = array ('type' => $trans['type'], 'data' => $trans['data'],
                'cost' => $trans['cost'], 'sold' => $trans['sold'], 'datetime' => $trans['datetime']);

		$this->data['history'] = $historyOut;
		$this->data['shipment'] = $shipmentOut;
		$this->data['purchase'] = $purchaseOut;
		$this->data['assembly'] = $assemblyOut;

		$this->render();
	}
}
