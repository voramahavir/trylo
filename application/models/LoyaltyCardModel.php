<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoyaltyCardModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getLoyaltyCardList()
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
        $output = array("code" => 0, "response" => array(),
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );
        if (isset($_POST['to_date'])) {
            $to_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['to_date'])));
            $this->db->where('LOENDT <= ', $to_date);
        }
        if (isset($_POST['from_date'])) {
            $from_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['from_date'])));
            $this->db->where('LOSTDT >= ', $from_date);
        }
        branchWhere();
        $this->db->limit($length, $start);
        $this->db->select("MOBILEID,LONAME,LODOB,LOMAR,LOTYPE,LOVAL,LOSTDT,LOENDT,LODISCPR,ISACTIVE");
        $output['data'] = $this->db->get('trloyl')->result();
        branchWhere();
        if (isset($_POST['to_date'])) {
            $to_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['to_date'])));
            $this->db->where('LOENDT <= ', $to_date);
        }
        if (isset($_POST['from_date'])) {
            $from_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['from_date'])));
            $this->db->where('LOSTDT >= ', $from_date);
        }
        $output['recordsTotal'] = $this->db->get('trloyl')->num_rows();
        $output['recordsFiltered'] = $output['recordsTotal'];
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
        echo json_encode($output);
        exit();
    }

    public function delete($id)
    {
        $code = 0;
        $response = "";
        branchWhere();
        $this->db->where('MOBILEID', $id)->set(array(
            'ISACTIVE' => 0
        ))->update("trloyl");
        $code = 1;
        $response = "Card deleted successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function recover($id)
    {
        $code = 0;
        $response = "";
        branchWhere();
        $this->db->where('MOBILEID', $id)->set(array(
            'ISACTIVE' => 1
        ))->update("trloyl");
        $code = 1;
        $response = "Card recover successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function createCard()
    {
        $code = 0;
        $msg = "No data found to save";
        $data = $_POST;
        if (count($data)) {
            $data['LODOB'] = ($data['LODOB']) ? date('Y-m-d', strtotime($data['LODOB'])) : NULL;
            $data['LOMAR'] = ($data['LOMAR']) ? date('Y-m-d', strtotime($data['LOMAR'])) : NULL;
            $data['LOSTDT'] = ($data['LOSTDT']) ? date('Y-m-d', strtotime($data['LOSTDT'])) : NULL;
            $data['LOENDT'] = ($data['LOENDT']) ? date('Y-m-d', strtotime($data['LOENDT'])) : NULL;
            $data["NOENTRY"] = 1;
            $data["branch_code"] = getSessionData('branch_code');
            $data["ENTRYDATE"] = date('Y-m-d H:i:s');
            $succ = $this->db->insert("trloyl", $data);
            if ($succ) {
                $code = 1;
                $msg = "Data saved successfully";
            } else {
                $code = 0;
                $msg = "Unable to save data";
            }
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

    public function schemeCreate()
    {
        $code = 0;
        $msg = "No data found to save";
        $data = $_POST;
        if (count($data)) {
            $schNo = $this->db->select("LOYSCHNO")->order_by("LOYSCHNO", "desc")->limit(1)->get("trloys")->row();
            $schNo = ($schNo) ? $schNo->LOYSCHNO : 0;
            $schNo++;
            $data["LOYSCHNO"] = $schNo;
            $data["NOENTRY"] = 1;
            $succ = $this->db->insert("trloys", $data);
            if ($succ) {
                $code = 1;
                $msg = "Data saved successfully";
            } else {
                $code = 0;
                $msg = "Unable to save data";
            }
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

    public function schemeListCard()
    {
        $code = 0;
        $msg = "No schemes found";
        $data = array();
        $schemes = $this->db->select("*")->get("trloys")->result();
        if (count($schemes)) {
            $code = 1;
            $msg = "Data fetched successfully";
            $data = $schemes;
        }
        $response = compact("code", "msg", "data");
        echo json_encode($response);
        exit;
    }
}

