<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends Application
{

    function __construct()
    {
        parent::__construct();
    }

    private function getPage($page, $type = 'a') {
        if($type == 'a')
            $vals = $this->historyModel->all();
        else 
            $vals = $this->historyModel->get($type);
        $start = ($page - 1) * 20;
        $limited = array_slice($vals, $start, 20);
        $result = array();
        foreach ($limited as $trans)
            $result[] = array ('type' => $trans['actionType'], 'data' => $trans['description'],
                'part' => $trans['partType'], 'datetime' => $trans['creationTime'], 'sale' => $trans['sale']);
        return $result;
    }

    public function index($page = 1)
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'history';

        $this->data['history'] = $this->getPage($page);
        $this->render();
    }

    public function buy($page = 1){
        $this->data['pagebody'] = 'historySingle';
        $this->data['history'] =  $this->getPage($page, 'p');
        $this->data['limiter'] = 'Purchase';
        $this->data['listing'] = 'Purchased Items';
        $this->render();
    }


    public function sell($page = 1){
        $this->data['pagebody'] = 'historySingle';
        $this->data['history'] =  $this->getPage($page, 's');
        $this->data['limiter'] = 'Sell';
        $this->data['listing'] = 'Sold Items';
        $this->render();
    }

    public function build($page = 1){
        $this->data['pagebody'] = 'historySingle';
        $this->data['history'] =  $this->getPage($page, 'b');
        $this->data['limiter'] = 'Build';
        $this->data['listing'] = 'Built Items';
        $this->render();
    }

    public function recycle($page = 1){
        $this->data['pagebody'] = 'historySingle';
        $this->data['history'] =  $this->getPage($page, 'r');
        $this->data['limiter'] = 'Recycle';
        $this->data['listing'] = 'Recycled Items';
        $this->render();
    }
}
