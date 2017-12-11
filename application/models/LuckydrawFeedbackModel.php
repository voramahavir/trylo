<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LuckydrawFeedbackModel extends CI_Model
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
        $this->db->order_by("VOUNO", "DESC");
        $this->db->limit(1);
        $data = $this->db->get("fdbkfr")->row();

        if ($data) {
            $lastBill = $data->VOUNO;
        }
        $lastBill++;
        return $lastBill;
    }

    public function addDraw()
    {
        $code = 0;
        $msg = "No data found to save";
        $luckyDrawData = $_POST;
        if ($luckyDrawData) {
            $luckyDrawData['ENTRYDATE'] = date('Y-m-d H:i:s');
            $luckyDrawData['VOUDT'] = date("Y-m-d", strtotime(str_replace("/", "-", $luckyDrawData['VOUDT'])));
            $luckyDrawData['PRICING'] = isset($luckyDrawData['PRICING']) ? $luckyDrawData['PRICING'] : 'F';
            $luckyDrawData['QUALITY'] = isset($luckyDrawData['QUALITY']) ? $luckyDrawData['QUALITY'] : 'F';
            $luckyDrawData['SERVICE'] = isset($luckyDrawData['SERVICE']) ? $luckyDrawData['SERVICE'] : 'F';
            if ($this->db->insert('fdbkfr', $luckyDrawData)) {
                $code = 1;
                $msg = "Data saved successfully";
            }
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }
}