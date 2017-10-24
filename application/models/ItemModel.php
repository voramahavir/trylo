<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getItems(){
		$msg = '';
		$code = 0;
		$filter_type = $this->input->post('filter_type');
		if($filter_type == "barcode"){
			$barcode = $this->input->post('barCode');
        	$this->db->like("t1.BARCODF",$barcode);
		} else if ($filter_type == "name"){
			$name = $this->input->post('name');
        	$this->db->like("t.TRITNM",$name);
		} 
		$output = new stdClass();
		$code = 1;
		$this->db->select('t.TRITNM as name, t2.PRDNM as group, t.TRCUP as cup, t1.TRSZCD as size, t1.TRCOLOR as color, t.TRMRP1 as mrp, t1.BARCODF as barcode, t1.TRPACQTY as qty');
		$this->db->join("tritem1 as t1", "t1.TRITCD1 = t.TRITCD"); 
		$this->db->join("trprgrp as t2", "t2.PRDCD = t.TRPRDGRP");
		$result = $this->db->get('tritem as t')->result();
		if (count($result)) {
			$output = $result;
		} else {
			$code = 0;
			$msg = 'Please Enter Valid Item BarCode.';
		}

		echo json_encode(array('code' => $code, 'data' => $output, 'message' => $msg));
		exit;
	}
}
