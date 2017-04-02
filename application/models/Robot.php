<?php

class Robot extends CI_Model {

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



        /*$eV = $this->db->escape($part1);
        $sql = "select * from head where id=1";
        $h[] = $this->db->query($sql)->result_array();

        $eV = $this->db->escape($part2);
        $sql[] = "select * from torso where id=1";
        $t = $this->db->query($sql)->result_array();

        $eV = $this->db->escape($part3);
        $sql[] = "select * from legs where id=1";
        $l = $this->db->query($sql)->result_array();

        /*$hModel = partModel($h);
        $tModel = partModel($t);
        $lModel = partModel($l);
        $model = "!";
        $bBot = "l";
        $cBot = "c";

        /*if(strcmp($hmodel, $tModel) == 0 && strcmp($hmodel, $lModel) == 0){
            if(strcmp($h, $t) == 0 && strcmp($h, $l) == 0){
                $model = strtoupper($hmodel);
            } else {
                $midel = $hmodel;
            }
        }*/

        $p1 = $this->db->escape($part1);
        $p2 = $this->db->escape($part2);
        $p3 = $this->db->escape($part3);
        $p4 = 2;

        $this->db->query("insert into Robot(headId, torsoId, legsId, used)
        VALUES ($p1, $p2, $p3, 'f')");
    }

    public function partModel($model){
        if(strcmp("$model", "l") > 0){
            return 'h';
        } else if (strcmp("$model", "l") > v){
            return 'b';
        } else {
            return 'c';
        }
    }
}
