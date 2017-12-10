<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DndMobileModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add(){
        if ($this->db->trans_begin()) {
            $this->db->insert("trdndmob", $_POST);
            $this->db->trans_complete();
            if ($this->db->trans_status()) {
                $code = 1;
                $msg = "Mobile No added successfully.";
            } else {
                $code = 0;
                $msg = "Unable to add mobile no.";
            }
        } else {
            $code = 0;
            $msg = "Unable to add mobile no.";
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
	}

    public function get()
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

        $output = array("code" => 0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );
        if(!empty($search)){$this->db->like("mobileno",$search);}
        $output['data'] = $this->db->select('mobileno,is_active')->get('trdndmob')->result();
        if(!empty($search)){$this->db->like("mobileno",$search);}
        $output['recordsTotal']=$this->db->get('trdndmob')->num_rows();
        $output['recordsFiltered']=$output['recordsTotal'];
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
        echo json_encode($output);
        exit;
    }

    public function deleteMobileNo($id)
    {
        $code = 0;
        $response = "";
        $this->db->where('MOBILENO', $id)->set(array(
            'is_active' => 0
        ))->update("trdndmob");
        $code = 1;
        $response = "Mobile No deleted successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function recoverMobileNo($id)
    {
        $code = 0;
        $response = "";
        $this->db->where('MOBILENO', $id)->set(array(
            'is_active' => 1
        ))->update("trdndmob");
        $code = 1;
        $response = "Mobile No recovered successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function updateMobileNo($id='')
    {
        if ($this->db->trans_begin()) {
        	$this->db->where('MOBILENO',$id);
	        $this->db->update("trdndmob", $_POST);
	        $this->db->trans_complete();
	        if ($this->db->trans_status()) {
	            $code = 1;
	            $msg = "Mobile No updated successfully.";
	        } else {
	            $code = 0;
	            $msg = "Unable to update mobile no.";
	        }
        } else {
            $code = 0;
            $msg = "Unable to update mobile no.";
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }
}