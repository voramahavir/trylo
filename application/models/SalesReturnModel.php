<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesReturnModel extends CI_Model
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
        );
        $this->db->where($where);
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

}

?>