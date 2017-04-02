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
    private function getPage($page, $type, $sort) {
        if($type == 'a')
            $vals = $this->historyModel->all();
        else 
            $vals = $this->historyModel->get($type);
        $total = intval(count($vals) / 20) + 1;

        if($sort == 'n'){//normal
            usort($vals, function($a, $b){
                return $a['partType'] > $b['partType'];
            });
        } else if ($sort == 'a') {//action
            usort($vals, function($a, $b){
                return $a['actionType'] > $b['actionType'];
            });
        } else if ($sort == 'd') {//date
            usort($vals, function($a, $b){
                return strtotime($a['creationTime']) > strtotime($b['creationTime']);
            });
        }

        $start = ($page - 1) * 20;
        $limited = array_slice($vals, $start, 20);
        $result = array();
        foreach ($limited as $trans)
            $result[] = array ('type' => $trans['actionType'], 'data' => $trans['description'],
                'part' => $trans['partType'], 'datetime' => $trans['creationTime'], 'sale' => $trans['sale']);

        //setup the page links for nav
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
            redirect("/history/index/$total/".$sort);
            return;
        } else if ($page < 1){
            $this->load->helper('url');
            redirect("/history/index/1/".$sort);
            return;
        }

        return $result;
    }

    private function addPageIndexs($sub, $sort){
        $this->data['first'] = $sub.$this->page['first']."/$sort";
        $this->data['prev'] = $sub.$this->page['prev']."/$sort";
        $this->data['page'] = $this->page['page'];
        $this->data['next'] = $sub.$this->page['next']."/$sort";
        $this->data['last'] = $sub.$this->page['last']."/$sort";
    }

    public function index($page = -1, $sort = 'n')
    {
        if($page == -1){
            $this->load->helper('url');
            redirect('/history/index/1/'.$sort);
            return;
        }
        // this is the view we want shown
        $this->data['pagebody'] = 'history';
        $this->data['history'] = $this->getPage($page, 'a', $sort);
        $this->data['limiter'] = 'All';
        $this->data['listing'] = 'Full History';
        $this->addPageIndexs('/history/index/',$sort);
        $this->render();
    }

    public function buy($page = -1, $sort = 'n'){
        if($page == -1){
            $this->load->helper('url');
            redirect('/history/buy/1/'.$sort);
            return;
        }
        $this->data['pagebody'] = 'history';
        $this->data['history'] =  $this->getPage($page, 'p', $sort);
        $this->data['limiter'] = 'Purchase';
        $this->data['listing'] = 'Purchased Items';
        $this->addPageIndexs('/history/buy/',$sort);
        $this->render();
    }


    public function sell($page = -1, $sort = 'n'){
        if($page == -1){
            $this->load->helper('url');
            redirect('/history/sell/1/'.$sort);
            return;
        }
        $this->data['pagebody'] = 'history';
        $this->data['history'] =  $this->getPage($page, 's', $sort);
        $this->data['limiter'] = 'Sell';
        $this->data['listing'] = 'Sold Items';
        $this->addPageIndexs('/history/sell/',$sort);
        $this->render();
    }

    public function build($page = -1, $sort = 'n'){
        if($page == -1){
            $this->load->helper('url');
            redirect('/history/build/1/'.$sort);
            return;
        }
        $this->data['pagebody'] = 'history';
        $this->data['history'] =  $this->getPage($page, 'b', $sort);
        $this->data['limiter'] = 'Build';
        $this->data['listing'] = 'Built Items';
        $this->addPageIndexs('/history/build/',$sort);
        $this->render();
    }

    public function recycle($page = -1, $sort = 'n'){
        if($page == -1){
            $this->load->helper('url');
            redirect('/history/recycle/1/'.$sort);
            return;
        }
        $this->data['pagebody'] = 'history';
        $this->data['history'] =  $this->getPage($page, 'r', $sort);
        $this->data['limiter'] = 'Recycle';
        $this->data['listing'] = 'Recycled Items';
        $this->addPageIndexs('/history/recycle/',$sort);
        $this->render();
    }
}
