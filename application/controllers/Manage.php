<?php

class Manage extends Application {
	
	function __construct() {
		parent::__construct();
		session_start();
	}

	public function index() {
		// this is the view we want shown
        $this->data['pagebody'] = 'manage';
        $this->data['builtRobots'] = $this->buildTable();
        $this->render();
	}

	/* Michael Goll | April 1, 2017
	** Reboots the plant, resets everything.
	*/
	public function reboot() {
		$this->output->set_content_type('application/json');
		$url = "https://umbrella.jlparry.com/work/rebootme/";
		$result = file_get_contents($url);

		if ($result == 'Ok') {
			$this->manageModel->reboot();
		} else {
			return $this->output
		            ->set_content_type('application/json')
		            ->set_output(json_encode(array('msg'=>$result)));
		}
	}

	/* Michael Goll | April 1, 2017
	** Registers the plant with the PRC.
	*/
	public function register($branch = 'zucchini', $code) {
		$this->output->set_content_type('application/json');
		$url = "https://umbrella.jlparry.com/work/registerme/" . $branch . "/" . $code;
		
		if (strcmp($_SESSION['user'], "Manager") != 0) {
			return $this->output
		            ->set_content_type('application/json')
		            ->set_output(json_encode(array('msg'=>'You are not a manager.')));
		} else {
			$result = file_get_contents($url);
				return $this->output
		            ->set_content_type('application/json')
		            ->set_output(json_encode(array('msg'=>$result)));
		}
	}

	/* Michael Goll | April 1, 2017
	** Builds the table that presents all of the currently built bots.
	*/
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