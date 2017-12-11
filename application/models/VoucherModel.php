<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VoucherModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get() {
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
        $this->filterData();
        if(!empty($search)){$this->db->like("T1.VOUDT",$search)->or_like("T1.REMARK",$search)->or_like("T2.TRNAME",$search)->or_like("T3.TRNAME",$search)->or_like("T1.VOUDT",$search)->or_like("T1.VOUAMT",$search);}
        $this->db->select('T1.VOUNO, T1.VOUDT,T1.VOUTYP,T1.VOUAMT,T1.REMARK,T2.TRNAME as PAYMENTAC,T3.TRNAME as RECIEPTAC,IS_ACTIVE');
        $this->db->join('trac as T2','T2.TRCODE=T1.CRPRCD');
        $this->db->join('trac as T3','T3.TRCODE=T1.DBPRCD');
		$output['data'] = $this->db->get('trvou as T1')->result();
        $this->filterData();
        if(!empty($search)){$this->db->like("T1.VOUDT",$search)->or_like("T1.REMARK",$search)->or_like("T2.TRNAME",$search)->or_like("T3.TRNAME",$search)->or_like("T1.VOUDT",$search)->or_like("T1.VOUAMT",$search);}
        $output['recordsTotal']=$this->db->get('trvou as T1')->num_rows();
        $output['recordsFiltered']=$output['recordsTotal'];
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
		echo json_encode($output);
		exit;
	}

    public function deleteVoucher($id)
    {
        $code = 0;
        $response = "";
        $this->db->where('VOUNO', $id)->set(array(
            'IS_ACTIVE' => 0
        ))->update("trvou");
        $code = 1;
        $response = "Voucher deleted successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function recoverVoucher($id)
    {
        $code = 0;
        $response = "";
        $this->db->where('VOUNO', $id)->set(array(
            'IS_ACTIVE' => 1
        ))->update("trvou");
        $code = 1;
        $response = "Voucher recover successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function filterData()
    {
        if (isset($_POST['to_date'])) {
            $to_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['to_date'])));
            $this->db->where('T1.VOUDT <= ', $to_date);
        }
        if (isset($_POST['from_date'])) {
            $from_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['from_date'])));
            $this->db->where('T1.VOUDT >= ', $from_date);
        }
        if (isset($_POST['payment_mode'])) {
            $payment_mode = $_POST['payment_mode'];
            if ($payment_mode != null && $payment_mode != 'all') {
                $this->db->where('T1.VOUTYP', $payment_mode);
            }
        }
    }

    public function getCurrentBillNo()
    {
        $lastBill = 0;
        $this->db->select("VOUNO");
        $this->db->where("fin_year", fin_year());
        branchWhere();
        $this->db->order_by("VOUNO", "DESC");
        $this->db->limit(1);
        $data = $this->db->get("trvou")->row();

        if ($data) {
            $lastBill = $data->VOUNO;
        }
        $lastBill++;
        return $lastBill;
    }

    public function addVoucher()
    {
        $voucherData = $_POST;
        $code = 0;
        $msg = "No data found to save";
        if ($voucherData) {
            $voucherData['VOUDT'] = date("Y-m-d", strtotime(str_replace("/", "-", $voucherData['VOUDT'])));
            $voucherData['CHQDT'] = date("Y-m-d", strtotime(str_replace("/", "-", $voucherData['CHQDT'])));
            if ($this->db->insert('trvou', $voucherData)) {
                $code = 1;
                $msg = "Data saved successfully";
            }
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

    public function getVoucher($id)
    {
        $where = array(
            'VOUNO' => $id,
            'IS_ACTIVE' => 1,
            'branch_code' => getSessionData('branch_code')
        );
        $this->db->where($where);
        $this->db->limit(1);
        $voucherData = $this->db->get('trvou')->row_array();
        return $voucherData;
    }

    public function updateVoucher()
    {
        $voucherData = $_POST;
        $code = 0;
        $msg = "No data found to save";
        if ($voucherData) {
            $voucherData['VOUDT'] = date("Y-m-d", strtotime(str_replace("/", "-", $voucherData['VOUDT'])));
            $voucherData['CHQDT'] = date("Y-m-d", strtotime(str_replace("/", "-", $voucherData['CHQDT'])));
            $this->db->where('VOUNO', $voucherData['VOUNO']);
            if ($this->db->update('trvou', $voucherData)) {
                $code = 1;
                $msg = "Data updated successfully";
            }
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

}
