<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getBranch() {
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

        $output = array("code" => 0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );
        if(!empty($search)){$this->db->like("branch_name",$search);}
		$output['data'] = $this->db->select('branch_id, branch_name, is_active')->get('branch')->result();
        $output['recordsTotal']=$this->db->get('branch')->num_rows();
        if(!empty($search)){$this->db->like("branch_name",$search);}
        $output['recordsFiltered']=$this->db->get('branch')->num_rows();
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
		echo json_encode($output);
		exit;
	}

	public function getUsers() {
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

        $output = array("code" => 0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );
        if(!empty($search)){$this->db->like("user_name",$search);}
		$output['data'] = $this->db->select('user_id, user_name, is_active')->get('users')->result();
        $output['recordsTotal']=$this->db->get('users')->num_rows();
        if(!empty($search)){$this->db->like("user_name",$search);}
        $output['recordsFiltered']=$this->db->get('users')->num_rows();
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
		echo json_encode($output);
		exit;
	}

	public function getItemInfo() {
		$barcode = $this->input->get('barCode');
		$output = new stdClass();
		$msg = '';
		$code = 0;
		if (!empty($barcode)) {
			$code = 1;
			$this->db->select('t1.*, t.TRITNM, t.TRMRP1, t.TRPURT, p.TRSGSTL, p.TRCGSTL, p.TRIGSTL, p.TRLOW, p.TRSGSTH, p.TRCGSTH, p.TRIGSTH');
			$this->db->join("tritem as t", "t.TRITCD = t1.TRITCD1");
			$this->db->join("trprgrp as p", "t.TRPRDGRP = p.PRDCD");
			$querry = $this->db->get_where('tritem1 as t1', array('BARCODF' => $barcode))->first_row();
			if (count($querry)) {
				$output = $querry;
			} else {
				$code = 0;
				$msg = 'Please Enter Valid Item BarCode.';
			}
		} else {
			$msg = 'Barcode required';
		}

		echo json_encode(array('code' => $code, 'data' => $output, 'message' => $msg));
		exit;
	}

    public function getForms()
    {
        $data = $this->db->get('forms')->result();
        echo json_encode($data);
        exit();
    }
}
