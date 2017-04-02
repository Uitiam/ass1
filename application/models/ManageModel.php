<?php

class ManageModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function get() {
		$query = $this->db->query('select * from robot where "used" = "f"');
		return $query->result_array();		
	}

	public function reboot() {
		$query = $this->db->query('delete company where 1=1;');
		$query = $this->db->query('delete head where 1=1;');
		$query = $this->db->query('delete history where 1=1;');
		$query = $this->db->query('delete legs where 1=1;');
		$query = $this->db->query('delete robot where 1=1;');
		$query = $this->db->query('delete torso where 1=1;');
	}
}