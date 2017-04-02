<?php

class ManageModel extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function get() {
		$query = $this->db->query("select * from robot where used = 'f';")->result_array();
		return $query;
	}

	public function reboot() {
		$this->db->query('delete company where 1=1;');
		$this->db->query('delete head where 1=1;');
		$this->db->query('delete history where 1=1;');
		$this->db->query('delete legs where 1=1;');
		$this->db->query('delete robot where 1=1;');
		$this->db->query('delete torso where 1=1;');
	}

	public function getQuery($id) {
		$result = $this->db->query("select * from robot where used = 'f' AND id = " . "'" . $id . "';")->result_array();
		return $result;
	}

	public function removeBuiltBot($id) {
		$this->db->query("update robot set used = 't' where id = " . "'" . $id . "';");
	}
}