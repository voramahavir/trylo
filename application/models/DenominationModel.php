<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DenominationModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getCurrentBillNo()
    {
        $lastBill = 0;
        $this->db->select("VOUNO");
        branchWhere();
        $this->db->where('fin_year', fin_year());
        $this->db->order_by("VOUNO", "DESC");
        $this->db->limit(1);
        $data = $this->db->get("kdeno")->row();

        if ($data) {
            $lastBill = $data->VOUNO;
        }
        $lastBill++;
        return $lastBill;
    }

    public function addDenomination()
    {
        $code = 0;
        $msg = "No data found to save";
        $denominationData = $_POST;
        if ($denominationData) {
            $denominationData['VOUDT'] = date("Y-m-d", strtotime(str_replace("/", "-", $denominationData['VOUDT'])));
            $denominationData['branch_code'] = getSessionData('branch_code');
            $denominationData['fin_year'] = fin_year();
            if ($this->db->insert('kdeno', $denominationData)) {
                $code = 1;
                $msg = "Data saved successfully";
            }
        }
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
        $this->filterData();
        $output = array("code" => 0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );

        $this->db->select('k.VOUNO,k.VOUDT,k.TYPE,k.TRTYPAC,t.TRNAME,k.TRNOTE,k.IS_ACTIVE');
        $this->db->join('trac t', 't.TRCODE = k.TRTYPAC');
        $this->db->limit($length, $start);
        $output['data'] = $this->db->get('kdeno k')->result();
        $this->filterData();
        if (!empty($search)) {
            $this->db->like("t.TRNAME", $search)->or_like("k.TRNOTE", $search)->or_like("k.VOUNO", $search);
        }
        $this->db->select('k.VOUNO,k.VOUDT,k.TYPE,k.TRTYPAC,t.TRNAME,k.TRNOTE,k.IS_ACTIVE');
        $this->db->join('trac t', 't.TRCODE = k.TRTYPAC');
        $output['recordsTotal'] = $this->db->get('kdeno k')->num_rows();
        $output['recordsFiltered'] = $output['recordsTotal'];
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
        echo json_encode($output);
        exit();
    }

    public function filterData()
    {
        branchWhere();
        if (isset($_POST['to_date'])) {
            $to_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['to_date'])));
            $this->db->where('VOUDT <= ', $to_date);
        }
        if (isset($_POST['from_date'])) {
            $from_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['from_date'])));
            $this->db->where('VOUDT >= ', $from_date);
        }
    }

    public function updateDenomination()
    {
        $code = 0;
        $msg = "No data found to save";
        $denominationData = $_POST;
        if ($denominationData) {
            $denominationData['VOUDT'] = date("Y-m-d", strtotime(str_replace("/", "-", $denominationData['VOUDT'])));
            $denominationData['branch_code'] = getSessionData('branch_code');
            $denominationData['fin_year'] = fin_year();
            branchWhere();
            $this->db->where('fin_year', fin_year());
            $this->db->where("VOUNO", $denominationData['VOUNO']);
            if ($this->db->update('kdeno', $denominationData)) {
                $code = 1;
                $msg = "Data updated successfully";
            }
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

    public function getDenomination($id)
    {
        $where = array(
            'VOUNO' => $id,
            'IS_ACTIVE' => 1,
            'fin_year' => fin_year()
        );
        branchWhere();
        $this->db->where($where);
        $this->db->limit(1);
        $denominationData = $this->db->get('kdeno')->row_array();
        return $denominationData;
    }

    public function deleteDenomination($id)
    {
        $code = 0;
        $response = "";
        branchWhere();
        $this->db->where('fin_year', fin_year());
        $this->db->where('VOUNO', $id)->set(array(
            'IS_ACTIVE' => 0
        ))->update("kdeno");
        $code = 1;
        $response = "Denomination deleted successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function recoverDenomination($id)
    {
        $code = 0;
        $response = "";
        branchWhere();
        $this->db->where('fin_year', fin_year());
        $this->db->where('VOUNO', $id)->set(array(
            'IS_ACTIVE' => 1
        ))->update("kdeno");
        $code = 1;
        $response = "Denomination recover successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }


    public function getAccs()
    {
        $code = 0;
        $msg = "No data found";
        $select = array(
            "TRCODE",
            "TRNAME"
        );
        $this->db->select($select);
        $this->db->where('TRACGRP', 2);
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

}