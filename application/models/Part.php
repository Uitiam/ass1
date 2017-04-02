<?php

/**
 * @author isaac
 */
class Part extends CI_Model {

    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    private function updateArray() {
        $query = 'SELECT CACode, used, creationTime, CONCAT(model, 1) AS fullModel FROM Head
            UNION SELECT CACode, used, creationTime, CONCAT(model, 2) AS fullModel FROM Torso
            UNION SELECT CACode, used, creationTime, CONCAT(model, 3) AS fullModel FROM Legs';
        return $this->db->query($query)->result_array();
    }

    //returns the total number of parts in stock
    public function partCount(){
        $this->updateArray();
        return count($this->all());
    }

    public function insertPart($tableName, $cacode, $stamp, $model) {
        $cacode = $this->db->escape($cacode);
        $stamp = $this->db->escape($stamp);
        $model = $this->db->escape($model);
        $this->db->query("INSERT INTO $tableName (CACode, used, creationTime, model) VALUES ($cacode, 'f', $stamp, $model)");
    }

    //returns all records matching the $value by default against the 'type' property
    public function get($value, $type = 'type')
    {
        $parts = $this->updateArray();
        $records = array();
        foreach ($parts as $record)
            if ($record[$type] == $value)
                $records[] = $record;
        return $records;
    }

    public function getHeads(){
        return $this ->db->query("SELECT id, CACode, used, creationTime,
            CONCAT(model, 1) AS fullModel FROM Head WHERE used='f'")->result_array();
    }

    public function getTorsos(){
        return $this ->db->query("SELECT id, CACode, used, creationTime,
            CONCAT(model, 2) AS fullModel FROM Torso WHERE used='f'")->result_array();

    }

    public function getLegs(){
        return $this ->db->query("SELECT id, CACode, used, creationTime,
            CONCAT(model, 3) AS fullModel FROM Legs WHERE used='f'")->result_array();
    }

    //returns all the parts
    public function all()
    {
        return $this->updateArray();
    }

    public function recycleTorso($id, $type){
        $id = $this->db->escape($id);

        $sql = "select * from Torso where id=$id";
        $h = $this->db->query($sql)->result_array()[0]['model'];
        $c = $this->db->query($sql)->result_array()[0]['CACode'];
        $ac = $this->company->apiKey();
        if($ac){
            $url = "https://umbrella.jlparry.com/work/recycle/$c?key=$ac";
            $response = file_get_contents($url);
            $this->updateB;
            $this->db->query("delete from Torso where id=$id");

            $this->historyModel->addBuild($h, $id, 0, "Supervisor", "Part Recycled");
        }
    }

    public function recycleHead($id, $type){
        $id = $this->db->escape($id);

        $sql = "select * from head where id=$id";
        $h = $this->db->query($sql)->result_array()[0]['model'];
        $c = $this->db->query($sql)->result_array()[0]['CACode'];

        $ac = $this->company->apiKey();
        if($ac){
            $url = "https://umbrella.jlparry.com/work/recycle/$c?key=$ac";
            $response = file_get_contents($url);
            $this->updateB;
            $this->db->query("delete from Head where id=$id");

            $this->historyModel->addBuild($h, $id, 0, "Supervisor", "Part Recycled");
        }

    }
    public function recycleLegs($id){
        $id = $this->db->escape($id);

        $sql = "select * from Legs where id=$id";
        $h = $this->db->query($sql)->result_array()[0]['model'];
        $c = $this->db->query($sql)->result_array()[0]['CACode'];

        $ac = $this->company->apiKey();
        if($ac){
            $url = "https://umbrella.jlparry.com/work/recycle/$c?key=$ac";
            $response = file_get_contents($url);
            $this->updateB;
            $this->db->query("delete from Legs where id=$id");

            $this->historyModel->addBuild($h, $id, 0, "Supervisor", "Part Recycled");
        }
    }

    private function updateB() {
        $key = $this->company->apiKey();
        $url = "https://umbrella.jlparry.com/info/balance/zucchini";
        $response = file_get_contents($url);
        $response = json_decode($response);
        $this->company->set("balance", $response);
    }

}
