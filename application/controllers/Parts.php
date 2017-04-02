<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parts extends Application
{
    private $page = array();

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Homepage for our app
     */
    public function index($page = -1)
    {
        if ($page == -1) {
            $this->load->helper('url');
            redirect('parts/index/1');
            return;
        }
        // this is the view we want shown
        $this->data['pagebody'] = 'parts';
        $this->data['parts'] = $this->getPage($page);

        $this->data['first'] = '/parts/index/'.$this->page['first'];
        $this->data['prev'] = '/parts/index/'.$this->page['prev'];
        $this->data['page'] = $this->page['page'];
        $this->data['next'] = '/parts/index/'.$this->page['next'];
        $this->data['last'] = '/parts/index/'.$this->page['last'];

        $this->render();
    }

    public function getPage($page = 1) {
        $vals = $this->part->all();
        $start = ($page - 1) * 10;
        $limited = array_slice($vals, $start, 10);
        $total = intval(count($vals) / 10) + 1;
        $result = array();
        $this->page['first'] = 1;
        $this->page['page'] = $page;
        $this->page['prev'] = $page - 1;
        $this->page['next'] = $page + 1;
        $this->page['last'] = $total;
        if($page < 2){
            $this->page['prev'] = 1;
        }
        if($page + 1 > $total){
            $this->page['next'] = $total;
        }

        if($page > $total){
            $this->load->helper('url');
            redirect("/parts/index/$total");
            return;
        } else if ($page < 1){
            $this->load->helper('url');
            redirect("/parts/index/1");
            return;
        }

        foreach ($limited as $record) {
            $result[] = array ('title' => $record['fullModel'], 'src' => '/parts/'.$record['fullModel'].'.jpeg', 
                'used' => $record['used'], 'CA'=>$record['CACode'], 'datetime'=>$record['creationTime']);
        }
        return $result;
    }

    private function getKey() {
        return $this->company->apiKey();
    }

    private function makeRequest($url) {
        return file_get_contents($url);
    }

    private function updateBalance() {
        $this->output->set_content_type('application/json');
        $key = $this->getKey();
        if ($key == false) {
            return $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(array(
                                'msg' => 'No password found on server, please set one',
                        )));
        }
        $url = "https://umbrella.jlparry.com/info/balance/zucchini";
        $response = $this->makeRequest($url);
        $response = json_decode($response);
        $this->company->set("balance", $response);
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
        $response = json_decode($response, true);

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
                $id = $part['id'];
                $stamp = $part['stamp'];
                $model = $part['model'];
                $this->part->insertPart($tableName, $id, $stamp, $model);
                $autoId = $this->db->query("SELECT id FROM $tableName ORDER BY id DESC LIMIT 1")->result_array()[0]['id'];
                $this->historyModel->addBuild($model, $autoId, 0, "Supervisor", $id);
            } else if ($part['piece'] == 2) {
                $tableName = 'Torso';
                $id = $part['id'];
                $stamp = $part['stamp'];
                $model = $part['model'];
                $this->part->insertPart($tableName, $id, $stamp, $model);
                $autoId = $this->db->query("SELECT id FROM $tableName ORDER BY id DESC LIMIT 1")->result_array()[0]['id'];
                $this->historyModel->addBuild($model, $autoId, 0, "Supervisor", $id);
            } else if ($part['piece'] == 3) {
                $tableName = 'Legs';
                $id = $part['id'];
                $stamp = $part['stamp'];
                $model = $part['model'];
                $this->part->insertPart($tableName, $id, $stamp, $model);
                $autoId = $this->db->query("SELECT id FROM $tableName ORDER BY id DESC LIMIT 1")->result_array()[0]['id'];
                $this->historyModel->addBuild($model, $autoId, 0, "Supervisor", $id);
            }
        }
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
        $response = json_decode($response, true);

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
                $id = $part['id'];
                $stamp = $part['stamp'];
                $model = $part['model'];
                $this->part->insertPart($tableName, $id, $stamp, $model);
                $autoId = $this->db->query("SELECT id FROM $tableName ORDER BY id DESC LIMIT 1")->result_array()[0]['id'];
                $this->historyModel->addBuy($model, $autoId, 10, "Worker", $id);
            } else if ($part['piece'] == 2) {
                $tableName = 'Torso';
                $id = $part['id'];
                $stamp = $part['stamp'];
                $model = $part['model'];
                $this->part->insertPart($tableName, $id, $stamp, $model);
                $autoId = $this->db->query("SELECT id FROM $tableName ORDER BY id DESC LIMIT 1")->result_array()[0]['id'];
                $this->historyModel->addBuy($model, $autoId, 10, "Worker", $id);
            } else if ($part['piece'] == 3) {
                $tableName = 'Legs';
                $id = $part['id'];
                $stamp = $part['stamp'];
                $model = $part['model'];
                $this->part->insertPart($tableName, $id, $stamp, $model);
                $autoId = $this->db->query("SELECT id FROM $tableName ORDER BY id DESC LIMIT 1")->result_array()[0]['id'];
                $this->historyModel->addBuy($model, $autoId, 10, "Worker", $id);
            }
        }
        $this->updateBalance();
        return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array(
                            'msg' => 'Request finished successfully',
                    )));
    }
}
