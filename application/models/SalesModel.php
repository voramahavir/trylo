<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function salesAdd() {
		
	}

	public function getSalesBills()
	{
		$search=array('value'=>'');
        if(isset($_POST['search'])){$search=$_POST['search'];}
        if(isset($search['value'])){$search=$search['value'];}
        $start=0; if(isset($_POST['start'])){ $start =$_POST['start'];}
        $length=10;if(isset($_POST['length'])){$length=$_POST['length'];}
        $draw=1;if(isset($_POST['draw'])){$draw=$_POST['draw'];}

        if(isset($_POST['to_date'])){ 
        	$to_date =$_POST['to_date'];
        	$this->db->where('t.TRBLDT <= ',$to_date);
        }
        if(isset($_POST['from_date'])){ 
        	$from_date =$_POST['from_date'];
        	$this->db->where('t.TRBLDT >= ',$from_date);
        }

        $output=array("code"=>0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search'=>$search
        );
        $this->db->select('t.TRBLNO as billno,t.TRBLDT as date,t.TRPRNM as name,TRTOTQTY as qty');
        $this->db->limit($length,$start);
		$this->db->join("trbil1 as t1", "t1.TRBLNO1 = t.TRBLNO"); 
        $output['data']=$this->db->get('trbil as t')->result();
        $output['recordsTotal']=$this->db->get('trbil as t')->num_rows();
        $output['recordsFiltered']=$this->db->get('trbil as t')->num_rows();
        if(!empty($output['data'])){$output['code']=1;}
        echo json_encode($output);
        exit();
	}
}
