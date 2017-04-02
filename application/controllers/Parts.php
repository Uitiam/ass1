<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parts extends Application
{

    function __construct()
    {
        parent::__construct();
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
        $counter = 0;
        foreach ($source as $record) {
            $parts[] = array ('UID' => $counter++, 'title' => $record['fullModel'], 'src' => '/parts/'.$record['fullModel'].'.jpeg', 
                'used' => $record['used'], 'CA'=>$record['CACode'], 'datetime'=>$record['creationTime']);
        }
        $this->data['parts'] = $parts;

        $this->render();
    }

    private function getKey() {
        return $this->company->apiKey();
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
        $this->output->set_content_type('application/json');
        $key = $this->getKey();
        if ($key == false) {
            return $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(array(
                                'msg' => 'No password found on server, please set one',
                        )));
        }
        $url = "https://umbrella.jlparry.com/work/mybuilds?key=".$key;

        $response = $this->makeRequest($url);
        $response = json_decode($response);

        if ($response == NULL) {
            return $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(array(
                                'msg' => 'Server returned invalid format',
                        )));
        }

        foreach ($response as $part) {
            if ($part['piece'] == 1) {
                $tableName = 'Head';
                $id = $this->db->escape($part['id']);
                $stamp = $this->db->escape($part['stamp']);
                $model = $this->db->escape($part['model']);
                $this->part->insertPart($tableName, $id, $stamp, $model);
                $autoId = $this->db->query("SELECT LAST(id) FROM $tableName");
                $this->history->addSell($id, $model, $autoId, 0);
            } else if ($part['piece'] == 2) {
                $tableName = 'Torso';
                $id = $this->db->escape($part['id']);
                $stamp = $this->db->escape($part['stamp']);
                $model = $this->db->escape($part['model']);
                $this->part->insertPart($tableName, $id, $stamp, $model);
                $autoId = $this->db->query("SELECT LAST(id) FROM $tableName");
                $this->history->addSell($id, $model, $autoId, 0);
            } else if ($part['piece'] == 3) {
                $tableName = 'Legs';
                $id = $this->db->escape($part['id']);
                $stamp = $this->db->escape($part['stamp']);
                $model = $this->db->escape($part['model']);
                $this->part->insertPart($tableName, $id, $stamp, $model);
                $autoId = $this->db->query("SELECT LAST(id) FROM $tableName");
                $this->history->addSell($id, $model, $autoId, 0);
            }
        }
        $this->company->set('balance', $this->company->get('balance') - 100);
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array(
                            'msg' => 'Request finished successfully',
                    )));
    }

    public function buy() {
        $this->output->set_content_type('application/json');
        $key = $this->getKey();
        if ($key == false) {
            return $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(array(
                                'msg' => 'No password found on server, please set one',
                        )));
        }
        $url = "https://umbrella.jlparry.com/work/buybox?key=" . $key;
        $response = $this->makeRequest($url);
        $response = json_decode($response);

        if ($response == NULL) {
            return $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(array(
                                'msg' => 'Server returned invalid format',
                        )));
        }

        foreach ($response as $part) {
            if ($part['piece'] == 1) {
                $tableName = 'Head';
                $id = $this->db->escape($part['id']);
                $stamp = $this->db->escape($part['stamp']);
                $model = $this->db->escape($part['model']);
                $this->part->insertPart($tableName, $id, $stamp, $model);
                $autoId = $this->db->query("SELECT LAST(id) FROM $tableName");
                $this->history->addBuy($model, $autoId, 10, "Worker", $id);
            } else if ($part['piece'] == 2) {
                $tableName = 'Torso';
                $id = $this->db->escape($part['id']);
                $stamp = $this->db->escape($part['stamp']);
                $model = $this->db->escape($part['model']);
                $this->part->insertPart($tableName, $id, $stamp, $model);
                $autoId = $this->db->query("SELECT LAST(id) FROM $tableName");
                $this->history->addBuy($model, $autoId, 10, "Worker", $id);
            } else if ($part['piece'] == 3) {
                $tableName = 'Legs';
                $id = $this->db->escape($part['id']);
                $stamp = $this->db->escape($part['stamp']);
                $model = $this->db->escape($part['model']);
                $this->part->insertPart($tableName, $id, $stamp, $model);
                $autoId = $this->db->query("SELECT LAST(id) FROM $tableName");
                $this->history->addBuy($model, $autoId, 10, "Worker", $id);
            }
        }
        $this->company->set('balance', $this->company->get('balance') - 100);
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array(
                            'msg' => 'Request finished successfully',
                    )));
    }
}
