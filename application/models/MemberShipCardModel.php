<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberShipCardModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
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
            );
            $where = array(
                'CARDNO' => $cardNo
            );
            $this->db->select($select);
            $this->db->where($where);
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
