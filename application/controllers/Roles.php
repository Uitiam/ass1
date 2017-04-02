<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends Application {
	function __construct() {
		parent::__construct();
		session_start();
	}

	public function setrole($role) {
		$this->output->set_content_type('application/json');
		$_SESSION['user'] = $role;
		
		return $this->output
		            ->set_content_type('application/json')
		            ->set_output(json_encode(array('user'=>$role)));
	}
}