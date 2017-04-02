<?php

class ManageModel extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/* Michael Goll | April 1, 2017
	** Gets all of the built robots that are not sold yet.
	*/
	public function get() {
		$query = $this->db->query("select * from Robot where used = 'f'")->result_array();
		return $query;
	}

	/* Michael Goll | April 1, 2017
	** Reboots the factory.
	*/
	public function reboot() {
		$this->db->query('delete from Robot');
		$this->db->query('delete from Company');
		$this->db->query('delete from Head');
		$this->db->query('delete from History');
		$this->db->query('delete from Legs');
		$this->db->query('delete from Torso');
		$this->db->query("insert Company (balance) values (1000)");
		return $this->db->affected_rows();
	}

	/* Michael Goll | April 1, 2017
	** Gets a specific robot using an ID. Used for the selling button.
	*/
	public function getQuery($id) {
		$result = $this->db->query("select * from Robot where used = 'f' AND id = " . "'" . $id . "'")->result_array();
		return $result;
	}

	/* Michael Goll | April 1, 2017
	** Marks a bot that was sold as such in the database.
	*/
	public function removeBuiltBot($id) {
		$this->db->query("update Robot set used = 't' where id = " . "'" . $id . "'");
	}
}
