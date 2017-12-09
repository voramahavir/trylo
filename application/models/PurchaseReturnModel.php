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
}