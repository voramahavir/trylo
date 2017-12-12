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

        $this->db->select('VOUNO,VOUDT,CUSNAME,MOBILENO,IS_ACTIVE');
        $this->db->limit($length, $start);
        $output['data'] = $this->db->get('fdbkfr')->result();
        $this->filterData();
        if (!empty($search)) {
            $this->db->like("CUSNAME", $search)->or_like("MOBILENO", $search);
        }
        $this->db->select('VOUNO,VOUDT,CUSNAME,MOBILENO,IS_ACTIVE');
        $output['recordsTotal'] = $this->db->get('fdbkfr')->num_rows();
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
            $to_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['to_date'])));
            $this->db->where('VOUDT <= ', $to_date);
        }
        if (isset($_POST['from_date'])) {
            $from_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['from_date'])));
            $this->db->where('VOUDT >= ', $from_date);
        }
    }

    public function updateLuckyDraw()
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
            $this->db->where("VOUNO", $luckyDrawData['VOUNO']);
            if ($this->db->update('fdbkfr', $luckyDrawData)) {
                $code = 1;
                $msg = "Data saved successfully";
            }
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

    public function getLuckyDraw($id)
    {
        $where = array(
            'VOUNO' => $id,
            'IS_ACTIVE' => 1
        );
        $this->db->where($where);
        $this->db->limit(1);
        $luckyDrawData = $this->db->get('fdbkfr')->row_array();
        return $luckyDrawData;
    }

    public function deleteLuckydraw($id)
    {
        $code = 0;
        $response = "";
        $this->db->where('VOUNO', $id)->set(array(
            'IS_ACTIVE' => 0
        ))->update("fdbkfr");
        $code = 1;
        $response = "Lucky Draw Feedback deleted successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function recoverLuckydraw($id)
    {
        $code = 0;
        $response = "";
        $this->db->where('VOUNO', $id)->set(array(
            'IS_ACTIVE' => 1
        ))->update("fdbkfr");
        $code = 1;
        $response = "Lucky Draw Feedback recover successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

}