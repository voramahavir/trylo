<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
		ini_set('memory_limit', '-1');
		set_time_limit(100000);
	}

	function getItems(){
		// echo "hello";exit();
		$msg = '';
		$code = 0;
		$search=array('value'=>'');
        if(isset($_POST['search'])){$search=$_POST['search'];}
        if(isset($search['value'])){$search=$search['value'];}
        $start=0; if(isset($_POST['start'])){ $start =$_POST['start'];}
        $length=10;if(isset($_POST['length'])){$length=$_POST['length'];}
        $draw=1;if(isset($_POST['draw'])){$draw=$_POST['draw'];}
		$filter_type = $this->input->post('filter_type');
		if($filter_type == "barcode"){
			$barcode = $this->input->post('barcode');
        	$this->db->like("t1.BARCODF",$barcode);
		} else if ($filter_type == "name"){
			$name = $this->input->post('name');;
        	$this->db->like("t.TRITNM",$name);
		} elseif ($filter_type == 'advance') {
				if(isset($_POST['color'])){
					$color = $this->input->post('color');
				}else{
					$color = null;
				}
				if(isset($_POST['size'])){
					$size = $this->input->post('size');
				}else{
					$size = null;
				}
				if(isset($_POST['group'])){
					$group = $this->input->post('group');
				}else{
					$group = null;
				}
				if(isset($_POST['freeze'])){
					$freeze = $this->input->post('freeze');
				}else{
					$freeze = null;
				}
                if($freeze != null && $color != 'all'){
                	if($freeze == "yes"){
                		$this->db->where('t.TRFRZIT','Y');
                	}elseif ($freeze == "no") {
                		$this->db->where('t.TRFRZIT','N');
                	}
                }elseif ($color != null && $color != 'all') {
                	$this->db->where('t1.TRCOLOR',$color);
                }elseif ($size != null && $size != 'all') {
                	$this->db->where('t1.TRSZCD',$size);
                }elseif ($group != null && $group != 'all') {
                	$this->db->where('t2.PRDNM',$group);
                }
		}
		$output=array("code"=>0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search'=>$search
        );
		$code = 1;
		$this->db->select('t.TRITNM as name, t2.PRDNM as group, t.TRCUP as cup, t1.TRSZCD as size, t1.TRCOLOR as color, t.TRMRP1 as mrp, t1.BARCODF as barcode, t1.TRPACQTY as qty');
		$this->db->join("tritem1 as t1", "t1.TRITCD1 = t.TRITCD"); 
		$this->db->join("trprgrp as t2", "t2.PRDCD = t.TRPRDGRP");
        $output['data'] = $this->db->get('tritem as t')->result();
        $output['recordsTotal']=count($output['data']);
        $output['recordsFiltered']=count($output['data']);
        if(!empty($output['data'])){$output['code']=1;}
        echo json_encode($output);
		exit;
	}

	function getDropDownData(){
		$size = $this->db->select('SZCD as size')->get('trsize')->result();
		$group = $this->db->select('PRDNM as name,PRDCD as code')->get('trprgrp')->result();
		// $color = $this->db->distinct('TRCOLOR as color')->get('tritem1')->result();
		$query = $this->db->query('select distinct TRCOLOR as color from tritem1');
		$color = $query->result_array();
		$output = new stdClass();
		$output->size = $size;
		$output->color = $color;
		$output->group = $group;
		echo json_encode($output);
		exit();
	}
}
