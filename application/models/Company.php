<?php

class Company extends CI_Model {

    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    //returns the colum from the company if it exists
    public function get($type)
    {
        $query = $this->db->query('select * from Company');
        $result = $query->result_array()[0];
        if(in_array($type, $result)){
            return $result[$type];
        }
        return false;
    }

    //return all stats
    public function all()
    {
        $query = $this->db->query('select * from Company');
        return $query->result_array();
    }

    //update the company
    public function set($type, $value) {
        $eT = $this->db->escape($type);
        $eV = $this->db->escape($value);
        $sql = "update Company set $eT = $eV where 1 = 1";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    //returns the currently set api key if one was set,
    //otherwise it returns false
    public function apiKey() {
        $query = $this->db->query('select * from Company');
        $ac = $query->result_array()[0]['accessToken'];
        if($ac !== null){
            return $ac;
        }
        return false;
    }

    //updates the currently set api key
    public function setApiKey($newKey) {
        $eK = $this->db->escape($newKey);
        $sql = "update Company set accessToken = $eK where 1 = 1";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
