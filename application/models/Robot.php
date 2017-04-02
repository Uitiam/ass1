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
        return count($this->all());
    }

    //returns all the robots
    public function all() {
        $sql = "select * from Robot";
        return $this->db->query($sql)->result_array();
    }

    /*
    *Add Robot
    */
    public function addRobot($part1, $part2, $part3){

        $eV = $this->db->escape($part1);
        $sql = "select * from head where id=$eV";
        $h = $this->db->query($sql)->result_array()[0]['model'];

        $eV = $this->db->escape($part2);
        $sql = "select * from torso where id=$eV";
        $t = $this->db->query($sql)->result_array()[0]['model'];

        $eV = $this->db->escape($part3);
        $sql = "select * from legs where id=$eV";
        $l = $this->db->query($sql)->result_array()[0]['model'];

        $hModel = $this->partModel($h);
        $tModel = $this->partModel($t);
        $lModel = $this->partModel($l);
        $model = "!";

        if(strcmp($hModel, $tModel) == 0 && strcmp($hModel, $lModel) == 0){
            if(strcmp($h, $t) == 0 && strcmp($h, $l) == 0){
                $model = strtoupper($hModel);
            } else {
                $model = $hModel;
            }
        }

        $p1 = $this->db->escape($part1);
        $p2 = $this->db->escape($part2);
        $p3 = $this->db->escape($part3);

        $rId = $this->db->query("insert into Robot(headId, torsoId, legsId, used, model)
        VALUES ($p1, $p2, $p3, 'f', '$model')");

        $this->db->query("update Head set used = 't' where id = $p1");
        $this->db->query("update Torso set used = 't' where id = $p2");
        $this->db->query("update Legs set used = 't' where id = $p3");

        $this->historyModel->addBuild('r', $rId, 0, "Supervisor", "Robot built");
    }

    public function partModel($model){
        if(strcmp("$model", "l") > 0){
            return 'h';
        } else if (strcmp("$model", "l") > 0){
            return 'b';
        } else {
            return 'c';
        }
    }
}
