<?php

class Robot extends CI_Model {

    //mock data array
    var $robots = array(
        array('id'=>'1', 'bot'=> 'motley', 'price'=> '25', 'head'=>'m', 'torso'=>'r', 'leg'=>'a'),
        array('id'=>'2', 'bot'=> 'butler', 'price'=> '100','head'=>'m', 'torso'=>'m', 'leg'=>'m'),
        array('id'=>'3', 'bot'=> 'motley', 'price'=> '25', 'head'=>'m', 'torso'=>'r', 'leg'=>'a'),
    );

    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    //returns all records matching the $value by default agains the 'type' property
    public function get($value, $type = 'bot')
    {
        $records = array();
        foreach($this->robots as $record)
            if($records[$type] == $value)
                $records[] = $record;
        return $records;
    }

    //returns the total number of robots in stock
    public function botCount(){
        return count($this->robots);
    }

    //returns all the robots
    public function all()
    {
        return $this->robots;
    }

    /*
     *Add Robot
     */
     public function addRobot($part1, $part2, $part3){
         $eV = $this->db->escape($part2);
         $sql = "SELECT model FROM Head WHERE id=$eV";
         $h = $this->db->query($sql);

         $eV = $this->db->escape($part2);
         $sql = "SELECT model FROM Torso WHERE id=$eV";
         $t = $this->db->query($sql);

         $eV = $this->db->escape($part3);
         $sql = "SELECT model FROM Legs WHERE id=$eV";
         $l = $this->db->query($sql);

         /*$head = ord($h);
         $troso = ord($t);
         $legs = ord($l);
         $hModel = "h";
         $tModel = "h";
         $lModel = "h";
         $model = "h";
         $bBot = ord("l");
         $cBot = ord("c");*/
        // if(){
             /*if($hModel > $cBot){
                 $hModel = 'c';
             } else {
                 $hModel = 'b';
             }*/
        // }

        /* if($toros > ord('l')){
             if($torso > ord('v')){
                $tModel = 'c';
             } else {
                 $tModel = 'b';
             }
         }

         if($legs > ord('l')){
             if($legs > ord('v')){
                 $lModel = 'c';
             } else {
                 $lModel = 'b';
             }
         }

         if(ord(hModel) == ord(tModel) && ord(hModel) == ord(lModel)){
             if($head == $torso && $head == $legs){
                 $model = strtoupper($hModel);
             } else {
                 $model = $hModel;
             }
         }

         $this->db->query("INSERT INTO Robot(headId, torsoId, legsId, model)
                        VALUES (" + $part1 + ", " + $part2 + ", " + $part3 + ")");*/

         return $this->output
                     ->set_content_type('application/json')
                     ->set_output(json_encode(array(
                             'msg' => 'Bot Built',
                     )));
        }
}
