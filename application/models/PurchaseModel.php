<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getData()
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
        if (isset($_POST['order']) && count($_POST['order'])) {
            $column = $_POST['order'][0]['column'];
            $sorttype = $_POST['order'][0]['dir'];
            $this->db->order_by($_POST['columns'][$column]['data'], $sorttype);
        }
        if (!empty($search)) {
            $this->db->like("t.TRBLDT", $search);
        }
        $this->filterData();
        $output = array("code" => 0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );

        $this->db->select('t.TRBLNO,t.TRBLDT,TRTOTQTY,t.TRNET,t.TRSPINST');
        $this->db->limit($length, $start);
        // $this->db->join("trbil1 as t1", "t1.TRBLNO1 = t.TRBLNO");
        $output['data'] = $this->db->get('trtrbl as t')->result();
        // echo $this->db->last_query();
        $this->filterData();
        if (!empty($search)) {
            $this->db->like("t.TRBLDT", $search);
        }
        $this->db->select('t.TRBLNO,t.TRBLDT,TRTOTQTY,t.TRNET,t.TRSPINST');
        // $this->db->join("trbil1 as t1", "t1.TRBLNO1 = t.TRBLNO");
        $output['recordsTotal'] = $this->db->get('trtrbl as t')->num_rows();
        $output['recordsFiltered'] = $output['recordsTotal'];
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
        if (isset($_POST['type'])) {
            $type = $_POST['type'];
            if ($type != null && !empty($type) && $type == '1') {
                $this->db->where('t.PHVER1', null);
            } else {
                $this->db->where('t.PHVER1 !=', null);
            }
        }
    }
}
