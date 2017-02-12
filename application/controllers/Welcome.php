<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
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
    $this->data['pagebody'] = 'landing';
    $this->load->model('robot');

    //Get and display information

    //Number of parts in inventory
    $this->data['numparts'] = $this->getPartsNumber();

    //Number of assembled robots
    $this->data['numbots'] = $this->getAssembledBots();

    //Total spent on robot parts
    $this->data['spent'] = $this->totalSpent();

    //Total dollars earned
    $this->data['earned'] = $this->totalEarned();

    $this->drawGraph();

    $this->render();
  }

  //displays the total number of parts in inventory
  public function getPartsNumber() 
  {
    return $this->part->partCount();
  }

  //displays the number of assembled robots
  public function getAssembledBots() 
  {
    return $this->robot->botCount();
  }

  //total spend on parts
  public function totalSpent() 
  {
    return $this->history->cost();
  }

  //total earned from selling robots or parts
  public function totalEarned() 
  {
    return $this->history->sales();
  }

  public function drawGraph() 
  {
    $JSONobj = json_encode($this->history->all());
    return $JSONobj;
  }
}

?>