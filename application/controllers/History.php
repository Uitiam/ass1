<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends Application
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'history';

        $all = $this->historyModel->all();
        $assembly = $this->historyModel->get('b');
        $purchase = $this->historyModel->get('p');
        $sell = $this->historyModel->get('s');

        $historyOut = array();
        foreach ($all as $trans)
            $historyOut[] = array ('type' => $trans['actionType'], 'data' => $trans['description'],
                'part' => $trans['partType'], 'datetime' => $trans['creationTime'], 'sale' => $trans['sale']);

        $assemblyOut = array();
        foreach ($assembly as $trans)
            $assemblyOut[] = array ('type' => $trans['actionType'], 'data' => $trans['description'],
                'part' => $trans['partType'], 'datetime' => $trans['creationTime']);

        $purchaseOut = array();
        foreach ($purchase as $trans)
            $purchaseOut[]  = array ('type' => $trans['actionType'], 'data' => $trans['description'],
                'part' => $trans['partType'], 'datetime' => $trans['creationTime'], 'sale' => $trans['sale']);

        $shipmentOut = array();
        foreach ($sell as $trans)
            $shipmentOut[] = array ('type' => $trans['actionType'], 'data' => $trans['description'],
                'part' => $trans['partType'], 'datetime' => $trans['creationTime'], 'sale' => $trans['sale']);

        $this->data['history'] = $historyOut;
        $this->data['shipment'] = $shipmentOut;
        $this->data['purchase'] = $purchaseOut;
        $this->data['assembly'] = $assemblyOut;

        $this->render();
    }
}
