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
        $query = 'select CACode, used, creationTime, concat(model, 1) as fullModel From Head
            union select CACode, used, creationTime, concat(model, 2) as fullModel From Torso
            union select CACode, used, creationTime, concat(model, 3) as fullModel From Legs';
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
        $this->db->query("INSERT into $tableName (CACode, used, creationTime, model) VALUES ($id, f, $stamp, $model)");
    }

    //returns all records matching the $value by default against the 'type' property
    public function get($value, $type = 'type')
    {
        $this->updateArray();
        $records = array();
        foreach ($this->parts as $record)
            if ($record[$type] == $value)
                $records[] = $record;
        return $records;
    }

    //returns all the parts
    public function all()
    {
        return $this->updateArray();
    }

}
