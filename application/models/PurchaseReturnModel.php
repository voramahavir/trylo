<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseReturnModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getCurrentBillNo()
    {
        $lastBill = 0;
        $this->db->select("TRBLNO");
        $this->db->where("fin_year", fin_year());
        branchWhere();
        $this->db->order_by("TRBLNO", "DESC");
        $this->db->limit(1);
        $data = $this->db->get("trpret")->row();

        if ($data) {
            $lastBill = $data->TRBLNO;
        }
        $lastBill++;
        return $lastBill;
    }

    public function getParties()
    {
        $code = 0;
        $msg = "No data found";
        $select = array(
            "TRCODE",
            "TRNAME",
            "CONCAT(TRAD1, ' ', TRAD2, ' ', TRAD3, ' ', TRCITY) AS address"
        );
        $this->db->select($select);
        $this->db->order_by("TRNAME", "ASC");
        $data = $this->db->get("trac")->result();
        if (count($data)) {
            $code = 1;
            $msg = "Data fetched successfully";
        }
        $response = compact("code", "msg", "data");
        echo json_encode($response);
        exit;
    }

    public function purchaseRetAdd()
    {
        $code = 0;
        $msg = "Unable to save data";
        if (isset($_POST['purchaseData']) && count($_POST['purchaseData']) && isset($_POST['itemsData']) && count($_POST['itemsData'])) {
            $purchaseData = $_POST['purchaseData'];
            $itemsData = $_POST['itemsData'];
            $purchaseData['TRBLDT'] = date("Y-m-d", strtotime(str_replace("/", "-", $purchaseData['TRBLDT'])));
            $purchaseData['TRGRPPDT'] = date("Y-m-d", strtotime(str_replace("/", "-", $purchaseData['TRGRPPDT'])));
            $purchaseData['ENTRYDATE'] = date("Y-m-d H:i:s");
            $purchaseData['branch_code'] = getSessionData('branch_code');
            $purchaseData['fin_year'] = fin_year();
            if ($this->db->trans_begin()) {
                $this->db->insert("trpret", $purchaseData);
                $this->db->insert_batch("trpret1", $itemsData);
                $this->db->trans_complete();
                if ($this->db->trans_status()) {
                    $code = 1;
                    $msg = "Data saved successfully";
                } else {
                    $code = 0;
                    $msg = "Unable to save data";
                }
            } else {
                $code = 0;
                $msg = "Unable to save data";
            }
        } else {
            $msg = "No data found to save";
        }
//        $response = compact("code", "msg", "lastId");
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
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

        $this->db->select('T.TRBLNO,T.TRBLDT,TRTOTQTY,T.TRNET,T.TRORBY,ta.TRNAME as NAME,ta.TRCITY as CITY,group_concat(DISTINCT ti.TRPRDGRP SEPARATOR "+") AS product');
        $this->db->join('trac ta', 'ta.TRCODE = T.TRPRCD');
        $this->db->join('trpret1 tb', 'T.TRBLNO = tb.TRSBL', 'LEFT');
        $this->db->join('tritem ti', 'ti.TRITCD = tb.TRSITCD', 'LEFT');
        $this->db->group_by('T.TRBLNO');
        $this->db->limit($length, $start);
        // $this->db->join("trbil1 as t1", "t1.TRBLNO1 = t.TRBLNO");
        $output['data'] = $this->db->get('trpret as T')->result();
//        echo $this->db->last_query();
        $this->filterData();
        if (!empty($search)) {
            $this->db->like("T.TRBLDT", $search);
        }
        $this->db->select('T.TRBLNO,T.TRBLDT,TRTOTQTY,T.TRNET,T.TRORBY,ta.TRNAME as NAME,ta.TRCITY as CITY,group_concat(DISTINCT ti.TRPRDGRP SEPARATOR "+") AS product');
        $this->db->join('trac ta', 'ta.TRCODE = T.TRPRCD');
        $this->db->join('trpret1 tb', 'T.TRBLNO = tb.TRSBL', 'LEFT');
        $this->db->join('tritem ti', 'ti.TRITCD = tb.TRSITCD', 'LEFT');
        $this->db->group_by('T.TRBLNO');
        // $this->db->join("trbil1 as t1", "t1.TRBLNO1 = T.TRBLNO");
        $output['recordsTotal'] = $this->db->get('trpret as T')->num_rows();
        $output['recordsFiltered'] = $output['recordsTotal'];
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
        echo json_encode($output);
        exit();
    }

    public function filterData()
    {
        branchWhere('T');
        if (isset($_POST['to_date'])) {
            $to_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['to_date'])));
            $this->db->where('T.TRBLDT <= ', $to_date);
        }
        if (isset($_POST['from_date'])) {
            $from_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['from_date'])));
            $this->db->where('T.TRBLDT >= ', $from_date);
        }
    }
}