<?php

class History extends CI_Model {

    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    //returns all records matching the $value by default against the 'type' property
    //
    //most commonly desired values for 'actionType' are:
    //    'p' purchase
    //    'b' build
    //    's' sell
    //    'r' recycle
    public function get($value, $type = 'actionType')
    {
        $query = $this->db->query('select * from History');

        $records = array();
        foreach ($query->result_array() as $row)
            if ($row[$type] == $value)
                $records[] = $row;
        return $records;
    }

    //return all records
    public function all()
    {
        $query = $this->db->query('select * from History');
        return $query->result_array();
    }

    //calculate the total cost so far
    public function cost() {
        $sum = 0;
        $data = $this->db->query('select * from History')->result_array();
        foreach ($data as $trans) {
            if($trans['actionType'] == 's')
                $sum += $trans['sale'];
        }
        return $sum;
    }

    //calculate the total sales so far
    public function sales() {
        $sum = 0;
        $data = $this->db->query('select * from History')->result_array();
        foreach ($data as $trans) {
            if($trans['actionType'] == 'p' || $trans['actionType'] == 's')
                $sum += $trans['sale'];
        }
        return $sum;
    }

    //the following functions are helpers for adding the respective history records
    //a good description candidate is the CA code of the part
    public function addBuy($partType, $partId, $price, $user = "Worker", $description = ""){
        $ePt = $this->db->escape($partType);
        $ePi = $this->db->escape($partId);
        $ePr = $this->db->escape($price);
        $eUs = $this->db->escape($user);
        $eDc = $this->db->escape($description);
        $sql = "insert into History(actionType, partType, partId, sale, user, description) values
                    ('p', $ePt, $ePi, $ePr, $eUs, $eDc,)";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function addSell($caCode, $partType, $partId, $price, $user = "Worker", $description = ""){
        $ePt = $this->db->escape($partType);
        $ePi = $this->db->escape($partId);
        $ePr = $this->db->escape($price);
        $eUs = $this->db->escape($user);
        $eDc = $this->db->escape($description);
        $sql = "insert into History(actionType, partType, partId, sale, user, description) values
                    ('s', $ePt, $ePi, $ePr, $eUs, $eDc,)";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function addBuild($caCode, $partType, $partId, $price, $user = "Supervisor", $description = ""){
        $ePt = $this->db->escape($partType);
        $ePi = $this->db->escape($partId);
        $ePr = $this->db->escape($price);
        $eUs = $this->db->escape($user);
        $eDc = $this->db->escape($description);
        $sql = "insert into History(actionType, partType, partId, sale, user, description) values
                    ('b', $ePt, $ePi, $ePr, $eUs, $eDc,)";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function addRecycle($caCode, $partType, $partId, $price, $user = "Worker", $description = ""){
        $ePt = $this->db->escape($partType);
        $ePi = $this->db->escape($partId);
        $ePr = $this->db->escape($price);
        $eUs = $this->db->escape($user);
        $eDc = $this->db->escape($description);
        $sql = "insert into History(actionType, partType, partId, sale, user, description) values
                    ('r', $ePt, $ePi, $ePr, $eUs, $eDc,)";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
