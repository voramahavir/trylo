<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberShipCardModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getMemberShipCardList() {
		    $search=array('value'=>'');
            if(isset($_POST['search'])){
            	$search=$_POST['search'];
            }
            if(isset($search['value'])){
            	$search=$search['value'];
            }
            $start=0; 
            if(isset($_POST['start'])){
             	$start =$_POST['start'];
         	}
            $length=10;
            if(isset($_POST['length'])){
            	$length=$_POST['length'];
            }
            $draw=1;
            if(isset($_POST['draw'])){
            	$draw=$_POST['draw'];
            }
            $output=array("code"=>0,"response"=>array(),
                'draw' => $draw,
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'search'=>$search
            );
            $this->db->limit($length,$start);
            if(!empty($search)){
            	$this->db->like("NAME",$search)->or_like("MOBILENO",$search)->or_like("CARDNO",$search);
            }
            $this->db->select("CRDNO,CONCAT(PREFIX, ' ', CARDNO) AS CARDHOLDERNO,CONCAT(PREFIX1, ' ', CARDNO1) AS REFCARDHOLDERNO,NAME,CITY,PHONENO,MOBILENO,BILLNO,CREADT,ISACTIVE");
            $output['data']=$this->db->get('maincrd')->result();
            $output['recordsTotal']=$this->db->get('maincrd')->num_rows();
            // $this->db->limit($length,$start);
            if(!empty($search)){
            	$this->db->like("NAME",$search)->or_like("MOBILENO",$search)->or_like("CARDNO",$search);
            }
            $output['recordsFiltered']=$this->db->get('maincrd')->num_rows();
            if(!empty($output['data'])){
            	$output['code']=1;
            }
            echo json_encode($output);
            exit();
    }

    public function delete($id)
    {
        $code=0;$response="";
        $this->db->where('CRDNO',$id)->set(array(
            'ISACTIVE'=>1
        ))->update("maincrd");
        $code=1;
        $response="Card deleted successfully.";
        echo json_encode(array("code"=>$code,"response"=>$response));
        exit();
    }
    public function recover($id)
    {
        $code=0;$response="";
        $this->db->where('CRDNO',$id)->set(array(
            'ISACTIVE'=>0
        ))->update("maincrd");
        $code=1;
        $response="Card recover successfully.";
        echo json_encode(array("code"=>$code,"response"=>$response));
        exit();
    }
}
