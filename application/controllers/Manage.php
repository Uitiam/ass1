<?php

class Manage extends Application {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		// this is the view we want shown
        $this->data['pagebody'] = 'manage';
        $this->data['builtRobots'] = $this->buildTable();
        $this->render();
	}

	public function reboot() {

	}

	public function buildTable() {
		$robots = $this->manageModel->get();

		$table = array();
		foreach($robots as $entry) {
			$table[] = array('id' => $entry['id'], 'cacode' =>$entry['CACode'], 'head' =>$entry['headId'], 'torso' => $entry['torsoId'], 'legs' =>$entry['legsId'], 'created' =>$entry['creationTime'], 'model' => $entry['model'], 'line' => $entry['line']);
		}
		return $table;
	}
}

?>