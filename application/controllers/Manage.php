<?php

class Manage extends Application {
	
	public function index() {
		// this is the view we want shown
        $this->data['pagebody'] = 'manage';
        buildTable();
        $this->render();
	}

	public function reboot() {

	}

	function buildTable() {
		
	}
}

?>