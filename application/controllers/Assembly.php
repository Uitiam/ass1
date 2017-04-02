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

        $hSource= $this->part->getHeads();//get heads
        $tSource = $this->part->getTorsos();//get torso
        $lSource = $this->part->getLegs();//get legs
        $heads = array();
        $torso = array();
        $legs = array();
        foreach ($hSource as $record)
        {
            $heads[] = array ('id' => $record['CACode'], 'src' => '/parts/'.$record['fullModel'].'.jpeg', 'title' => $record['fullModel']);
        }
        foreach ($tSource as $record)
        {
            $torso[] = array ('id' => $record['CACode'], 'src' => '/parts/'.$record['fullModel'].'.jpeg', 'title' => $record['fullModel']);
        }
        foreach ($lSource as $record)
        {
            $legs[] = array ('id' => $record['CACode'], 'src' => '/parts/'.$record['fullModel'].'.jpeg', 'title' => $record['fullModel']);
        }
        $this->data['heads'] = $heads;
        $this->data['torso'] = $torso;
        $this->data['legs'] = $legs;

        $this->data['robotHead'] = array($heads[0]);
        $this->data['robotTorso'] = array($torso[0]);
        $this->data['robotLegs'] = array($legs[0]);

        $this->render();
    }

    /*
     *Return function
     */
     public function returnPart($code){
         return $this->output
                     ->set_content_type('application/json')
                     ->set_output(json_encode(array(
                             'msg' => 'Part Returned',
                     )));
     }

     /*
      *BUild Robot
      */
      public function buildRobot($part1, $part2, $part3){


          return $this->output
                      ->set_content_type('application/json')
                      ->set_output(json_encode(array(
                              'msg' => 'Bot Built',
                      )));
      }

}
