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

        $this->db->select('t.TRBLNO as billno,t.TRBLDT as date,t.TRPRNM as name,t.TRTOTQTY as qty,t.TRNET as bamount,t.TRTYPE as type,t.TRCITY as city,t.CANBL,t.TRREF,tb.TRBLNO as adjBill');
        $this->db->join("trbil tb", "tb.TRCN1 = t.TRBLNO OR tb.TRCN2 = t.TRBLNO", "LEFT");
        $this->db->limit($length, $start);
        $output['data'] = $this->db->get('trslret as t')->result();
        $this->filterData();
        $this->db->select('t.TRBLNO as billno,t.TRBLDT as date,t.TRPRNM as name,t.TRTOTQTY as qty,t.TRNET as bamount,t.TRTYPE as type,t.TRCITY as city,t.CANBL,t.TRREF,tb.TRBLNO as adjBill');
        $this->db->join("trbil tb", "tb.TRCN1 = t.TRBLNO OR tb.TRCN2 = t.TRBLNO", "LEFT");
        $output['recordsTotal'] = $this->db->get('trslret as t')->num_rows();
        $output['recordsFiltered'] = $output['recordsTotal'];
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
        echo json_encode($output);
        exit();
    }

    public function filterData()
    {
        branchWhere("t");
        if (isset($_POST['to_date'])) {
            $to_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['to_date'])));
            $this->db->where('t.TRBLDT <= ', $to_date);
        }
        if (isset($_POST['from_date'])) {
            $from_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['from_date'])));
            $this->db->where('t.TRBLDT >= ', $from_date);
        }
        if (isset($_POST['cn_type'])) {
            $cn_type = $_POST['cn_type'];
            if ($cn_type != null && $cn_type != 'all') {
                if ($cn_type == "1") {
                    $this->db->where('t.TRREF', NULL);
                    $this->db->where('tb.TRBLNO', NULL);
                    $this->db->where('t.CANBL IS NULL', NULL, FALSE);
                } elseif ($cn_type == "2") {
                    $this->db->where('t.TRREF', 'Y')->or_where("tb.TRBLNO IS NOT NULL", NULL, FALSE);
                    $this->db->where('t.CANBL IS NULL', NULL, FALSE);
                } elseif ($cn_type == "3") {
                    $this->db->where('t.CANBL IS NOT NULL', NULL, FALSE);
                }
            }
        }
    }

    public function getCurrentBillNo()
    {
        $lastBill = 0;
        $this->db->select("TRBLNO");
        $this->db->where("fin_year", fin_year());
        branchWhere();
        $this->db->order_by("TRBLNO", "DESC");
        $this->db->limit(1);
        $data = $this->db->get("trslret")->row();

        if ($data) {
            $lastBill = $data->TRBLNO;
        }
        return $lastBill += 1;
    }

    public function validateBillNo()
    {
        $code = 0;
        $msg = "This item does not exist in this bill. Please verify";
        $billNo = $_POST['billNo'];
        $itemId = $_POST['itemId'];
        $itemClr = $_POST['itemClr'];
        $itemSz = $_POST['itemSz'];

        $this->db->select("*");
        $where = array(
            "TRBLNO1" => $billNo,
            "TRITCD" => $itemId,
            "TRCLR" => $itemClr,
            "TRSZ" => $itemSz,
            "fin_year" => fin_year()
        );
        branchWhere("trbil1", "branchcode1");
        $this->db->where($where);
        $this->db->join("trbil", "trbil.TRBLNO = trbil1.TRBLNO1 AND trbil.branchcode = trbil1.branchcode1 AND trbil.fin_year = trbil1.fin_year1");
        $this->db->limit(1);
        $data = $this->db->get("trbil1")->row();
        if (count($data)) {
            $code = 1;
            $msg = "Data fetched successfully";
        }
        $response = compact("code", "msg", "data");
        echo json_encode($response);
        exit;
    }

    public function salesRetAdd()
    {
        $code = 0;
        $msg = "Unable to save data";
        $lastId = 0;
        if (isset($_POST['salesData']) && count($_POST['salesData']) && isset($_POST['itemsData']) && count($_POST['itemsData'])) {
            $salesData = $_POST['salesData'];
            $itemsData = $_POST['itemsData'];
            $salesData['TRBLDT'] = date("Y-m-d", strtotime($salesData['TRBLDT']));
            $salesData['TRCRDEXP'] = (isset($salesData['TRCRDEXP']) && $salesData['TRCRDEXP']) ? date("Y-m-d", strtotime($salesData['TRCRDEXP'])) : NULL;
            $salesData['branch_code'] = getSessionData('branch_code');
            $salesData['fin_year'] = fin_year();
            if ($this->db->trans_begin()) {
                $this->db->insert("trslret", $salesData);
                $lastId = $this->db->insert_id();
                $this->db->insert_batch("trslret1", $itemsData);
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

    public function getSalesRetByCN($billNo)
    {
        $code = 0;
        $msg = "Incorrect CN no. Please Enter correct CN no.";
        $select = array(
            "TRNET",
            "TRREF"
        );
        $where = array(
            "TRBLNO" => $billNo
        );
        branchWhere();
        finYearWhere();
        $this->db->select($select);
        $this->db->where($where);
        $this->db->limit(1);
        $data = $this->db->get("trslret")->row();
        if ($data) {
            $code = 1;
            $msg = "CN fetched successfully";
        }
        $response = compact("code", "msg", "data");
        echo json_encode($response);
        exit;
    }

    public function salesRetDelete($id)
    {
        branchWhere();
        $this->db->where(array(
            'fin_year' => fin_year(),
            'TRBLNO' => $id
        ))->delete("trslret");
        $code = 1;
        $response = "Sales Return Bill deleted successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function salesRetCancel($id)
    {
        branchWhere();
        $this->db->where(array(
            'fin_year' => fin_year(),
            'TRBLNO' => $id
        ))->set(array(
            'CANBL' => 'T'
        ))->update("trslret");
        $code = 1;
        $response = "Sales Return Bill cancelled successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }
}

?>