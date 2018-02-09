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

    public function getOpBal($type)
    {
        $finalDenominations = array(
            "F2000" => 0,
            "F200" => 0,
            "F500" => 0,
            "F100" => 0,
            "F50" => 0,
            "F20" => 0,
            "F10" => 0,
            "F5" => 0,
            "FMISC" => 0,
        );
        $date = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
        $select = array(
            "(sum(A2000) - sum(B2000)) AS F2000",
            "(sum(A200) - sum(B200)) AS F200",
            "(sum(A500) - sum(B500)) AS F500",
            "(sum(A100) - sum(B100)) AS F100",
            "(sum(A50) - sum(B50)) AS F50",
            "(sum(A20) - sum(B20)) AS F20",
            "(sum(A10) - sum(B10)) AS F10",
            "(sum(A5) - sum(B5)) AS F5",
            "(sum(AMISC) - sum(BMISC)) AS FMISC"
        );
        $where = array(
            "VOUDT" => $date,
            "TRTYPAC" => $type
        );
        branchWhere();
        $this->db->select($select);
        $this->db->where($where);
        $this->db->group_by("VOUDT");
        $denominations = $this->db->get("kdeno")->row();

        $select = array(
            "(sum(RC2000) - sum(PD2000)) AS F2000",
            "(sum(RC200) - sum(PD200)) AS F200",
            "(sum(RC500) - sum(PD500)) AS F500",
            "(sum(RC100) - sum(PD100)) AS F100",
            "(sum(RC50) - sum(PD50)) AS F50",
            "(sum(RC20) - sum(PD20)) AS F20",
            "(sum(RC10) - sum(PD10)) AS F10",
            "(sum(RC5) - sum(PD5)) AS F5",
            "(sum(RCMIS) - sum(PDMIS)) AS FMISC"
        );
        $where = array("TRBLDT" => $date);
        branchWhere("trbil", "branchcode");
        $this->db->select($select);
        $this->db->where($where);
        $this->db->group_by("TRBLDT");
        $salesDenominations = $this->db->get("trbil")->row();

        $select = array(
            "(sum(ifnull(PD2000,0)) - sum(RC2000)) AS F2000",
            "(sum(ifnull(PD200,0)) - sum(RC200)) AS F200",
            "(sum(ifnull(PD500,0)) - sum(RC500)) AS F500",
            "(sum(ifnull(PD100,0)) - sum(RC100)) AS F100",
            "(sum(ifnull(PD50,0)) - sum(RC50)) AS F50",
            "(sum(ifnull(PD20,0)) - sum(RC20)) AS F20",
            "(sum(ifnull(PD10,0)) - sum(RC10)) AS F10",
            "(sum(ifnull(PD5,0)) - sum(RC5)) AS F5",
            "(sum(ifnull(PDMIS,0)) - sum(RCMIS)) AS FMISC"
        );
        $where = array("TRBLDT" => $date);
        branchWhere();
        $this->db->select($select);
        $this->db->where($where);
        $this->db->group_by("TRBLDT");
        $salesRetDenominations = $this->db->get("trslret")->row();

        $select = array(
            "(sum(0) - sum(DEM11)) AS F2000",
            "(sum(0) - sum(DEM12)) AS F200",
            "(sum(0) - sum(DEM2)) AS F500",
            "(sum(0) - sum(DEM3)) AS F100",
            "(sum(0) - sum(DEM4)) AS F50",
            "(sum(0) - sum(DEM5)) AS F20",
            "(sum(0) - sum(DEM6)) AS F10",
            "(sum(0) - sum(DEM7)) AS F5",
            "(sum(0) - sum(DEM8A)) AS FMISC"
        );
        $where = array("VOUDT" => $date);
        branchWhere();
        $this->db->select($select);
        $this->db->where($where);
        $this->db->group_by("VOUDT");
        $voucherDenominations = $this->db->get("trvou")->row();

        $select = array(
            "(sum(ifnull(LOR2000,0)) - sum(LOP2000)) AS F2000",
            "(sum(ifnull(LOR200,0)) - sum(LOP200)) AS F200",
            "(sum(ifnull(LOR500,0)) - sum(LOP500)) AS F500",
            "(sum(ifnull(LOR100,0)) - sum(LOP100)) AS F100",
            "(sum(ifnull(LOR50,0)) - sum(LOP50)) AS F50",
            "(sum(ifnull(LOR20,0)) - sum(LOP20)) AS F20",
            "(sum(ifnull(LOR10,0)) - sum(LOP10)) AS F10",
            "(sum(ifnull(LOR5,0)) - sum(LOP5)) AS F5",
            "(sum(ifnull(LOROTH,0)) - sum(LOPOTH)) AS FMISC"
        );
        $where = array("LOSTDT" => $date);
        branchWhere();
        $this->db->select($select);
        $this->db->where($where);
        $this->db->group_by("LOSTDT");
        $loyaltyDenominations = $this->db->get("trloyl")->row();

        if ($type == 1) {
            foreach ($finalDenominations as $key => $denomination) {
                if (isset($denominations->$key)) {
                    $finalDenominations[$key] += $denominations->$key;
                }
                if (isset($salesDenominations->$key)) {
                    $finalDenominations[$key] += $salesDenominations->$key;
                }
                if (isset($salesRetDenominations->$key)) {
                    $finalDenominations[$key] += $salesRetDenominations->$key;
                }
                if (isset($voucherDenominations->$key)) {
                    $finalDenominations[$key] += $voucherDenominations->$key;
                }
                if (isset($loyaltyDenominations->$key)) {
                    $finalDenominations[$key] += $loyaltyDenominations->$key;
                }
            }
        } else {
            $finalDenominations = $denominations ? $denominations : $finalDenominations;
        }
        $response = compact("finalDenominations", "type");
        echo json_encode($response);
        exit;
    }

}