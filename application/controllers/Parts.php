<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parts extends Application
{

	function __construct()
	{
		parent::__construct();
        session_start();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'parts';

		// build the list of authors, to pass on to our view
		$source = $this->part->all();
		$parts = array();
		foreach ($source as $record)
		{
            $parts[] = array ('src' => $record['src'], 'title' => $record['title'], 'UID'=> $record['UID'],
            'CA'=> $record['CA'], 'PlantCode'=>$record['PlantCode'], 'datetime'=>$record['datetime']);
		}
		$this->data['parts'] = $parts;

		$this->render();
	}

    private function getKey() {
        $response = '';
        $key = -1;
        if (isset($_SESSION['key'])) {
            $key = $_SESSION['key'];
            $url = "https://umbrella.jlparry.com/info/whoami?key=" . $key;
            $response = $this->makeRequest($url);
        }
        if (strcmp($response, "zucchini") != 0) {
            //Get password here
            $pass = $this->db->query('select * from Company')->result_array();
            if (empty($pass)) {
                echo "No password found on server, please set one";
                return -1;
            }
            $url = "https://umbrella.jlparry.com/work/registerme/zucchini/" . $pass[0];
            $key = $this->makeRequest($url);
            $_SESSION['key'] = $key;
        }
        return $key;
    }

    private function makeRequest($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function build() {
        $key = $this->getKey();
        if ($key == -1) {
            return;
        }
        $url = "https://umbrella.jlparry.com/work/mybuilds?key=" . $key;
        $response = $this->makeRequest($url);
        echo $response;
        $response = json_decode($response);

        foreach ($response as $part) {
            //id
            //model
            //piece
            //stamp
        }
    }

    public function buy() {
        $key = $this->getKey();
        if ($key == -1) {
            return;
        }
        $url = "https://umbrella.jlparry.com/work/buybox?key=" . $key;
        $response = $this->makeRequest($url);
        echo $response;
        $response = json_decode($response);

        foreach ($response as $part) {
            //id
            //model
            //piece
            //stamp
        }
    }

}
