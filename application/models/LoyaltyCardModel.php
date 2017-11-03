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
            $to_date = $_POST['to_date'];
            $this->db->where('LOENDT', $to_date);
        }
        if (isset($_POST['from_date'])) {
            $from_date = $_POST['from_date'];
            $this->db->where('LOSTDT', $from_date);
        }
        $this->db->limit($length, $start);
        $this->db->select("MOBILEID,LONAME,LODOB,LOMAR,LOTYPE,LOVAL,LOSTDT,LOENDT,LODISCPR,ISACTIVE");
        $output['data'] = $this->db->get('trloyl')->result();
        $output['recordsTotal'] = $this->db->get('trloyl')->num_rows();
        $output['recordsFiltered'] = $this->db->get('trloyl')->num_rows();
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
        $this->db->where('MOBILEID', $id)->set(array(
            'ISACTIVE' => 1
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
        $this->db->where('MOBILEID', $id)->set(array(
            'ISACTIVE' => 0
        ))->update("trloyl");
        $code = 1;
        $response = "Card recover successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }
}
