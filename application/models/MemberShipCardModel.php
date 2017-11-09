<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberShipCardModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getMemberShipCardList()
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
        $output = array("code" => 0, "response" => array(),
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );
        $this->db->limit($length, $start);
        if (!empty($search)) {
            $this->db->like("NAME", $search)->or_like("MOBILENO", $search)->or_like("CARDNO", $search);
        }
        $this->db->select("CRDNO,CONCAT(PREFIX, ' ', CARDNO) AS CARDHOLDERNO,CONCAT(PREFIX1, ' ', CARDNO1) AS REFCARDHOLDERNO,NAME,CITY,PHONENO,MOBILENO,BILLNO,CREADT,ISACTIVE");
        $output['data'] = $this->db->get('maincrd')->result();
        $output['recordsTotal'] = $this->db->get('maincrd')->num_rows();
        // $this->db->limit($length,$start);
        // if (!empty($search)) {
        //     $this->db->like("NAME", $search)->or_like("MOBILENO", $search)->or_like("CARDNO", $search);
        // }
        $output['recordsFiltered'] = $this->db->get('maincrd')->num_rows();
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
        $this->db->where('CRDNO', $id)->set(array(
            'ISACTIVE' => 1
        ))->update("maincrd");
        $code = 1;
        $response = "Card deleted successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function recover($id)
    {
        $code = 0;
        $response = "";
        $this->db->where('CRDNO', $id)->set(array(
            'ISACTIVE' => 0
        ))->update("maincrd");
        $code = 1;
        $response = "Card recover successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function createCard()
    {
        $code = 0;
        $msg = "Unable to save data";
        $data = $_POST;
        if (count($data)) {
            $crdNo = 0;
            $this->db->select('CRDNO');
            $this->db->limit(1);
            $this->db->order_by('CRDNO', 'DESC');
            $crdNo = $this->db->get('maincrd')->row();
            if ($crdNo) {
                $crdNo = $crdNo->CRDNO;
            }
            $crdNo++;
            $data['DATEOFB'] = ($data['DATEOFB']) ? date("Y-m-d", strtotime($data['DATEOFB'])) : NULL;
            $data['MDATE'] = ($data['MDATE']) ? date("Y-m-d", strtotime($data['MDATE'])) : NULL;
            $data['BILLDT'] = ($data['BILLDT']) ? date("Y-m-d", strtotime($data['BILLDT'])) : NULL;
            $data['CRDNO'] = $crdNo;
            $succ = $this->db->insert('maincrd', $data);
            if ($succ) {
                $code = 1;
                $msg = "Data saved successfully";
            } else {
                $code = 0;
                $msg = "Unable to save data";
            }
        } else {
            $code = 0;
            $msg = "No data found to save";
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

    public function getDataByCardNo($cardNo)
    {

        $code = 0;
        $msg = "Please enter valid card no";
        $data = array();
        if ($cardNo) {
            $select = array(
                'NAME',
                'ADR1',
                'ADR2',
                'ADR3',
                'CITY',
                'PHONENO',
                'MOBILENO',
                'EMAIL',
                'GENDER',
                'DATEOFB',
                'MDATE',
                'PSCHCALL',
                'PSCHSMS',
                'PSCHMAIL',
                '(ifnull(sum(CREDITCRD1),0) - ifnull(sum(DBREDPN),0)) AS totalPoints'
            );
            $where = array(
                'CARDNO' => $cardNo
            );
            $this->db->select($select);
            $this->db->where($where);
            $this->db->group_by('CARDNO');
            $this->db->join('crdtran', 'crdtran.CARDNO1 = maincrd.CARDNO', 'LEFT');
            $this->db->limit(1);
            $details = $this->db->get('maincrd')->row();
            if ($details) {
                $code = 1;
                $msg = "Data fetched successfully";
                $data = $details;
            } else {
                $code = 0;
                $msg = "No details found. Please enter valid card no";
                $data = array();
            }
        }
        $response = compact("code", "msg", "data");
        echo json_encode($response);
    }
}
