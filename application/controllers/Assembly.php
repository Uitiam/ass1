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
        $tvar = 2;
        foreach ($hSource as $record)
        {
            $heads[] = array ('id' => $record['id'], 'CACode' => $record['CACode'], 'src' => '/parts/'.$record['fullModel'].'.jpeg', 'title' => $record['fullModel']);
        }
        foreach ($tSource as $record)
        {
            $torso[] = array ('id' => $record['id'], 'CACode' => $record['CACode'], 'src' => '/parts/'.$record['fullModel'].'.jpeg', 'title' => $record['fullModel']);
        }
        foreach ($lSource as $record)
        {
            $legs[] = array ('id' => $record['id'], 'CACode' => $record['CACode'], 'src' => '/parts/'.$record['fullModel'].'.jpeg', 'title' => $record['fullModel']);
        }

        $noPart[] = array ('id' => 0, 'src'=>"/parts/none.jpg", 'title' =>"/parts/none.jpg");
        $this->data['heads'] = $heads;
        $this->data['torso'] = $torso;
        $this->data['legs'] = $legs;

        if(!empty($heads)){
            $this->data['robotHead'] = array($heads[0]);
        } else {
            $this->data['robotHead'] = $noPart;
        }
        if(!empty($torso)){
            $this->data['robotTorso'] = array($torso[0]);
        } else {
            $this->data['robotTorso'] = $noPart;
        }
        if(!empty($legs)){
            $this->data['robotLegs'] = array($legs[0]);
        } else {
            $this->data['robotLegs'] = $noPart;
        }
        $this->render();
    }

    /*
     *Return function
     */
     public function returnHead($id, $type){

         $this->part->recycleHead($id, $type);
         return $this->output
                     ->set_content_type('application/json')
                     ->set_output(json_encode(array(
                             'msg' => 'Part Returned',
                     )));
     }

     /*
      *Return function
      */
      public function returnTorso($id, $type){

          $this->part->recycleTorso($id, $type);
          return $this->output
                      ->set_content_type('application/json')
                      ->set_output(json_encode(array(
                              'msg' => 'Part Returned',
                      )));
      }

      /*
       *Return function
       */
       public function returnLegs($id, $type){

           $this->part->recycleLegs($id, $type);
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

         // $this->render();
        $this->robot->addRobot($part1, $part2, $part3);
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array(
                            'msg' => 'Bot Built',
                    )));

       }
}
