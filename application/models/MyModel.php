<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getBranch() {
		$output = $this->db->select('branch_id, branch_name')->get('branch')->result();

		echo json_encode($output);
		exit;
	}

	public function getUsers() {
		$output = $this->db->select('user_id, user_name')->get('users')->result();
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
}
