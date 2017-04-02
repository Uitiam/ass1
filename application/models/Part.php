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
        return count($this->parts);
    }

    public function insertPart($tableName, $cacode, $stamp, $model) {
        $id = $this->db->escape($cacode);
        $stamp = $this->db->escape($stamp);
        $model = $this->db->escape($model);
        $this->db->query("INSERT INTO $tableName (CACode, used, creationTime, model) VALUES ($id, f, $stamp, $model)");
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
        return $this ->db->query('SELECT CACode, used, creationTime,
            CONCAT(model, 1) AS fullModel FROM Head WHERE used=\'f\'')->result_array();
    }

    public function getTorsos(){
        return $this ->db->query('SELECT CACode, used, creationTime,
            CONCAT(model, 2) AS fullModel FROM Head WHERE used=\'f\'')->result_array();
    }

    public function getLegs(){
        return $this ->db->query('SELECT CACode, used, creationTime,
            CONCAT(model, 3) AS fullModel FROM Head WHERE used=\'f\'')->result_array();
    }

    //returns all the parts
    public function all()
    {
        return $this->updateArray();
    }

}
