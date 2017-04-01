<?php

if (isset($_POST['user'])) {
	switch($_POST['user']) {
		$this->output->set_content_type('application/json');
		case 'worker':
			$_SESSION['user'] = 'worker';
			return $this->output
						->set_content_type('application/json')
                        ->set_output(json_encode(array(
                                'user' => 'worker',
                        )));

		case 'manager':
			$_SESSION['user'] = 'manager';
			return $this->output
						->set_content_type('application/json')
                        ->set_output(json_encode(array(
                                'user' => 'manager',
                        )));
	}
}