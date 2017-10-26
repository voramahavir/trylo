<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function salesAdd()
    {
        $code = 0;
        $msg = "Unable to save data";
        if (isset($_POST['salesData']) && count($_POST['salesData']) && isset($_POST['itemsData']) && count($_POST['itemsData'])) {
            $salesData = $_POST['salesData'];
            $itemsData = $_POST['itemsData'];
            $salesData['TRBLDT'] = date("Y-m-d", strtotime($salesData['TRBLDT']));
            $salesData['TRDOB'] = ($salesData['TRDOB']) ? date("Y-m-d", strtotime($salesData['TRDOB'])) : NULL;
            $salesData['TRMAD'] = ($salesData['TRMAD']) ? date("Y-m-d", strtotime($salesData['TRMAD'])) : NULL;
            if ($this->db->trans_begin()) {
                $this->db->insert("trbil", $salesData);
                $this->db->insert_batch("trbil1", $itemsData);
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
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

    public function getCurrentBillNo()
    {
        $lastBill = 0;
        $this->db->select("TRBLNO");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $data = $this->db->get("trbil")->row();

        if ($data) {
            $lastBill = $data->TRBLNO;
        }
        return $lastBill += 1;
    }
}
