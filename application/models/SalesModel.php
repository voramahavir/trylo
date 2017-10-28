<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function salesAdd()
    {
        $code = 0;
        $msg = "Unable to save data";
        $lastId = 0;
        if (isset($_POST['salesData']) && count($_POST['salesData']) && isset($_POST['itemsData']) && count($_POST['itemsData'])) {
            $salesData = $_POST['salesData'];
            $itemsData = $_POST['itemsData'];
            $salesData['TRBLDT'] = date("Y-m-d", strtotime($salesData['TRBLDT']));
            $salesData['TRDOB'] = ($salesData['TRDOB']) ? date("Y-m-d", strtotime($salesData['TRDOB'])) : NULL;
            $salesData['TRMAD'] = ($salesData['TRMAD']) ? date("Y-m-d", strtotime($salesData['TRMAD'])) : NULL;
            if ($this->db->trans_begin()) {
                $this->db->insert("trbil", $salesData);
                $lastId = $this->db->insert_id();
                $this->db->insert_batch("trbil1", $itemsData);
                $this->db->trans_complete();
                if ($this->db->trans_status()) {
                    $code = 1;
                    $msg = "Data saved successfully";
                } else {
                    $code = 0;
                    $msg = "Unable to save data";
                }
            } else {
                $code = 0;
                $msg = "Unable to save data";
            }
        } else {
            $msg = "No data found to save";
        }
//        $response = compact("code", "msg", "lastId");
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

    public function getSalesBills()
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

        if (isset($_POST['to_date'])) {
            $to_date = $_POST['to_date'];
            $this->db->where('t.TRBLDT <= ', $to_date);
        }
        if (isset($_POST['from_date'])) {
            $from_date = $_POST['from_date'];
            $this->db->where('t.TRBLDT >= ', $from_date);
        }

        $output = array("code" => 0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );
        $this->db->select('t.TRBLNO as billno,t.TRBLDT as date,t.TRPRNM as name,TRTOTQTY as qty');
        $this->db->limit($length, $start);
        $this->db->join("trbil1 as t1", "t1.TRBLNO1 = t.TRBLNO");
        $output['data'] = $this->db->get('trbil as t')->result();
        $output['recordsTotal'] = $this->db->get('trbil as t')->num_rows();
        $output['recordsFiltered'] = $this->db->get('trbil as t')->num_rows();
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
        echo json_encode($output);
        exit();
    }

    public function getCurrentBillNo()
    {
        $lastBill = 0;
        $this->db->select("TRBLNO");
        $this->db->order_by("id", "DESC");
        $this->db->limit(1);
        $data = $this->db->get("trbil")->row();

        if ($data) {
            $lastBill = $data->TRBLNO;
        }
        return $lastBill += 1;
    }

    public function printSalesBill($billNo)
    {
        $printData = array();
        $select = array(
            'b.TRPRNM as party',
            'b.TRPH1 as phoneno',
            'CONCAT(b.CRDPREF,"/","' . $billNo . '") as billno',
            'b.TRBLDT as billdate',
            'b.TRTOTQTY as totqty',
            'b.TRGROS as grsamt',
            'b.EXRCVD as rcdamt',
            'b.EXBACK as retamt',
            'b.TRCRAMT as custamt',
            'b.TRNET as netamt',
            'SUM(bi.TRFBEL) as netblamt',
            'SUM(bi.TRDS2) as totdis',
            'SUM(bi.TRFABV) as netabamt',
            'bi.TRLSGST as sgstper',
            'SUM(bi.TRLSGSTA) as sgstamt',
            'bi.TRLCGST as cgstper',
            'SUM(bi.TRLCGSTA) as cgstamt'
        );
        $where = array(
            'b.TRBLNO' => $billNo
        );
        $this->db->select($select);
        $this->db->where($where);
        $this->db->join("trbil1 bi", "bi.TRBLNO1 = b.TRBLNO");
        $this->db->group_by("b.TRBLNO");
        $this->db->limit(1);
        $billData = $this->db->get('trbil b')->row();
        if ($billData) {
            $select = array(
                'CONCAT(i.TRIMGCD, " ", bi.TRSZ,"-",bi.TRCLR) as particular',
                'bi.TRQTY as qty',
                'bi.TRRATE as rate',
                'bi.TRDS1 as disper',
                'bi.TRDS2 as disamt',
                'bi.TRNETRT as netrt',
                'bi.TRNETBT as netbt',
                'bi.TRFBEL as below',
                'bi.TRFABV as above',
                'bi.TRFABV as above',
            );
            $where = array(
                'bi.TRBLNO1' => $billNo
            );
            $this->db->select($select);
            $this->db->where($where);
            $this->db->join("tritem i", "i.TRITCD = bi.TRITCD");
            $itemData = $this->db->get('trbil1 bi')->result();
            $printData = compact("billData","itemData");
        }
        return $printData;
    }
}
