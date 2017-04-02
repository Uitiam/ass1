<?php

class ManageModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function get() {
		$query = $this->db->query('select * from robot where "used" = "f"');
		return $query->result_array();		
	}
}