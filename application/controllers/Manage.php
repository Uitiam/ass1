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
		$key = $this->company->apiKey();

		$url = "https://umbrella.jlparry.com/work/rebootme?key=" . $key;

		if (strcmp($_SESSION['user'], "Manager") == 0) {
			$result = file_get_contents($url);

			if ($result == 'Ok') {
				//wipe the database
				$response = $this->manageModel->reboot();

				return $this->output
			            ->set_content_type('application/json')
			            ->set_output(json_encode(array('msg'=>'Reboot successful, ' . $response . ' rows affected.')));
			} else {
				return $this->output
			            ->set_content_type('application/json')
			            ->set_output(json_encode(array('msg'=>$result)));
			}
		} else {
			return $this->output
		            ->set_content_type('application/json')
		            ->set_output(json_encode(array('msg'=>'You are not a manager.')));
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
			$this->manageModel->reboot();
			$result = file_get_contents($url);

			$result = explode(" ", $result);
			$this->company->setApiKey($result[1]);
			
			return $this->output
	            ->set_content_type('application/json')
	            ->set_output(json_encode(array('msg'=>$result[1])));
		}
	}

	/* Michael Goll | April 1, 2017
	** Builds the table that presents all of the currently built bots.
	*/
	public function buildTable() {
		$robots = $this->manageModel->get();
		$table = array();

		foreach($robots as $entry) {
			$table[] = array('id' => $entry['id'], 'cacode' => $entry['CACode'], 'head' => $entry['headId'], 'torso' => $entry['torsoId'], 'legs' => $entry['legsId'], 'created' => $entry['creationTime'], 'model' => $entry['model'], 'line' => $entry['line'], 'btnID' => $entry['id']);
		}
		return $table;
	}

	/* Michael Goll | April 1, 2017
	** Gets the requested robot to sell and tries to sell it
	*/
	public function getRobotToSell($id) {
		$this->output->set_content_type('application/json');
		$robot = $this->manageModel->getQuery($id);
		
		if ($robot != NULL) {

			foreach($robot as $entry) {
				$id = $entry['id'];
				$headID = $entry['headId'];
				$torsoID = $entry['torsoId'];
				$legsID = $entry['legsId'];	
			}

			$url = "https://umbrella.jlparry.com/work/buymybot/" . $headID . "/" . $torsoID . "/" . $legsID;

			$result = file_get_contents($url);

			if (strcmp($result, "Ok") == 0) {
				$this->manageModel->removeBuiltBot($id);
				return $this->output
		            ->set_content_type('application/json')
		            ->set_output(json_encode(array('msg'=>'Bot Sold.')));	
			} else {
				return $this->output
		            ->set_content_type('application/json')
		            ->set_output(json_encode(array('msg'=>'Offer rejected.')));
			}
		} else {
			return $this->output
		            ->set_content_type('application/json')
		            ->set_output(json_encode(array('msg'=>'No Bot Found with ID: ' . $id)));
		}
	}
}

?>