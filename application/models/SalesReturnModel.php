<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesReturnModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getSalesReturns()
    {
    	        $search = array('value' => '');
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
        }
        if (isset($search['value'])) {
            $search = $search['value'];
        }
        $start = 0;
        if (isset($_POST['start'])) {
            $start = $_POST['start'];
        }
        $length = 10;
        if (isset($_POST['length'])) {
            $length = $_POST['length'];
        }
        $draw = 1;
        if (isset($_POST['draw'])) {
            $draw = $_POST['draw'];
        }

        $this->filterData();
        $output = array("code" => 0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );

        $this->db->select('t.TRBLNO as billno,t.TRBLDT as date,t.TRPRNM as name,TRTOTQTY as qty,t.TRNET as bamount,t.TRTYPE as type,t.TRCITY as city,t.CANBL,t.TRREF');
        $this->db->limit($length, $start);
        $output['data'] = $this->db->get('trslret as t')->result();
        // echo $this->db->last_query();
        $output['recordsTotal'] = $this->db->get('trslret as t')->num_rows();
        $this->filterData();
        $this->db->select('t.TRBLNO as billno,t.TRBLDT as date,t.TRPRNM as name,TRTOTQTY as qty,t.TRNET as bamount,t.TRTYPE as type,t.TRCITY as city,t.CANBL,t.TRREF');
        $output['recordsFiltered'] = $this->db->get('trslret as t')->num_rows();
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
        echo json_encode($output);
        exit();
    }

    public function filterData()
    {
        if (isset($_POST['to_date'])) {
            $to_date = $_POST['to_date'];
            $this->db->where('t.TRBLDT <= ', $to_date);
        }
        if (isset($_POST['from_date'])) {
            $from_date = $_POST['from_date'];
            $this->db->where('t.TRBLDT >= ', $from_date);
        }
        if (isset($_POST['cn_type'])) {
            $cn_type = $_POST['cn_type'];
            if ($cn_type != null && $cn_type != 'all') {
            	if($cn_type == "1"){
            		$this->db->where('t.TRREF', 'N');
            		$this->db->where('t.CANBL != ', 'T');
            	}elseif ($cn_type == "2") {
            		$this->db->where('t.TRREF', 'Y');
            		$this->db->where('t.CANBL != ', 'T');
            	}elseif ($cn_type == "3") {
            		$this->db->where('t.CANBL', 'T');
            	}
            }
        }
    }
}
?>