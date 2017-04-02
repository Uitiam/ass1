<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends Application
{

    function __construct()
    {
        parent::__construct();
    }

    private $page = array();

    //get the requested page number with 20 records
    //defaults to all entries
    private function getPage($page, $type = 'a') {
        if($type == 'a')
            $vals = $this->historyModel->all();
        else 
            $vals = $this->historyModel->get($type);
        $total = intval(count($vals) / 20) + 1;
        
        $this->page['first'] = 1;
        $this->page['page'] = $page;
        $this->page['prev'] = $page - 1;
        $this->page['next'] = $page + 1;
        $this->page['last'] = $total;

        if($page < 2){
            $this->page['prev'] = 1;
        }
        if($page + 1 > $total){
            $this->page['next'] = $total;
        }


        if($page > $total){
            $this->load->helper('url');
            redirect("/history/index/$total");
            return;
        } else if ($page < 1){
            $this->load->helper('url');
            redirect("/history/index/1");
            return;
        }

        $start = ($page - 1) * 20;
        $limited = array_slice($vals, $start, 20);
        $result = array();
        foreach ($limited as $trans)
            $result[] = array ('type' => $trans['actionType'], 'data' => $trans['description'],
                'part' => $trans['partType'], 'datetime' => $trans['creationTime'], 'sale' => $trans['sale']);
        return $result;
    }

    private function addPageIndexs(){
        $this->data['first'] = '/history/index/'.$this->page['first'];
        $this->data['prev'] = '/history/index/'.$this->page['prev'];
        $this->data['page'] = $this->page['page'];
        $this->data['next'] = '/history/index/'.$this->page['next'];
        $this->data['last'] = '/history/index/'.$this->page['last'];
    }

    public function index($page = -1)
    {
        if($page == -1){
            $this->load->helper('url');
            redirect('/history/index/1');
            return;
        }
        // this is the view we want shown
        $this->data['pagebody'] = 'history';
        $this->data['history'] = $this->getPage($page);
        $this->data['limiter'] = 'All';
        $this->data['listing'] = 'Full History';
        $this->addPageIndexs();
        $this->render();
    }

    public function buy($page = -1){
        if($page == -1){
            $this->load->helper('url');
            redirect('/history/buy/1');
            return;
        }
        $this->data['pagebody'] = 'history';
        $this->data['history'] =  $this->getPage($page, 'p');
        $this->data['limiter'] = 'Purchase';
        $this->data['listing'] = 'Purchased Items';
        $this->addPageIndexs();
        $this->render();
    }


    public function sell($page = -1){
        if($page == -1){
            $this->load->helper('url');
            redirect('/history/sell/1');
            return;
        }
        $this->data['pagebody'] = 'history';
        $this->data['history'] =  $this->getPage($page, 's');
        $this->data['limiter'] = 'Sell';
        $this->data['listing'] = 'Sold Items';
        $this->addPageIndexs();
        $this->render();
    }

    public function build($page = -1){
        if($page == -1){
            $this->load->helper('url');
            redirect('/history/build/1');
            return;
        }
        $this->data['pagebody'] = 'history';
        $this->data['history'] =  $this->getPage($page, 'b');
        $this->data['limiter'] = 'Build';
        $this->data['listing'] = 'Built Items';
        $this->addPageIndexs();
        $this->render();
    }

    public function recycle($page = -1){
        if($page == -1){
            $this->load->helper('url');
            redirect('/history/recycle/1');
            return;
        }
        $this->data['pagebody'] = 'history';
        $this->data['history'] =  $this->getPage($page, 'r');
        $this->data['limiter'] = 'Recycle';
        $this->data['listing'] = 'Recycled Items';
        $this->addPageIndexs();
        $this->render();
    }
}
