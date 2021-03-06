<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getData()
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
        if (isset($_POST['order']) && count($_POST['order'])) {
            $column = $_POST['order'][0]['column'];
            $sorttype = $_POST['order'][0]['dir'];
            $this->db->order_by($_POST['columns'][$column]['data'], $sorttype);
        }
        if (!empty($search)) {
            $this->db->like("t.TRBLDT", $search);
        }
        $this->filterData();
        $output = array("code" => 0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );

        $this->db->select('T.TRBLNO,T.TRPRBL,T.TRBLDT,TRTOTQTY,T.TRNET,T.TRSPINST,T.PHVER1,ta.TRNAME as NAME,ta.TRCITY as CITY,group_concat(DISTINCT ti.TRPRDGRP SEPARATOR "+") AS product');
        $this->db->join('trac ta', 'ta.TRCODE = T.TRPRCD');
        $this->db->join('trtrbl1 tb', 'T.TRBLNO = tb.TRSBL AND tb.ISACTIVE = 0', 'LEFT');
        $this->db->join('tritem ti', 'ti.TRITCD = tb.TRSITCD', 'LEFT');
        $this->db->group_by('T.TRBLNO');
        $this->db->limit($length, $start);
        // $this->db->join("trbil1 as t1", "t1.TRBLNO1 = t.TRBLNO");
        $output['data'] = $this->db->get('trtrbl as T')->result();
//        echo $this->db->last_query();
        $this->filterData();
        if (!empty($search)) {
            $this->db->like("T.TRBLDT", $search);
        }
        $this->db->select('T.TRBLNO,T.TRBLDT,TRTOTQTY,T.TRNET,T.TRSPINST,T.PHVER1,ta.TRNAME as NAME,ta.TRCITY as CITY');
        $this->db->join('trac ta', 'ta.TRCODE = T.TRPRCD');
        $this->db->join('trtrbl1 tb', 'T.TRBLNO = tb.TRSBL AND tb.ISACTIVE = 0', 'LEFT');
        $this->db->join('tritem ti', 'ti.TRITCD = tb.TRSITCD', 'LEFT');
        $this->db->group_by('T.TRBLNO');
        // $this->db->join("trbil1 as t1", "t1.TRBLNO1 = T.TRBLNO");
        $output['recordsTotal'] = $this->db->get('trtrbl as T')->num_rows();
        $output['recordsFiltered'] = $output['recordsTotal'];
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
        echo json_encode($output);
        exit();
    }

    public function filterData()
    {
        $this->db->where('T.ISACTIVE', 0);
        branchWhere('T');
        if (isset($_POST['to_date'])) {
            $to_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['to_date'])));
            $this->db->where('T.TRBLDT <= ', $to_date);
        }
        if (isset($_POST['from_date'])) {
            $from_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['from_date'])));
            $this->db->where('T.TRBLDT >= ', $from_date);
        }
        if (isset($_POST['type'])) {
            $type = $_POST['type'];
            if ($type != null && !empty($type) && $type == '1') {
                $this->db->where('T.PHVER1', null);
            } else {
                $this->db->where('T.PHVER1 !=', null);
            }
        }
    }

    public function getInTrnsBill($billNo)
    {
        $billItems = array();
        $this->db->where(array('TRBLNO' => $billNo, 'fin_year' => fin_year()));
        branchWhere();
        $this->db->limit(1);
        $billData = $this->db->get('trtrbl')->row();
        if ($billData) {
            $select = array(
                't.*',
                'i.TRITNM',
                'i.TRMRP1',
                'i1.BARCODF'
            );
            $this->db->select($select);
            branchWhere('t');
            $this->db->where(array('TRSBL' => $billNo, 'fin_year' => fin_year()));
            $this->db->join('tritem i', 'i.TRITCD = t.TRSITCD', 'LEFT');
            $this->db->join('tritem1 i1', 'i.TRITCD = i1.TRITCD1 AND i1.TRSZCD = t.TRSSZ AND i1.TRCOLOR = t.TRSCLR', 'LEFT');
            $billItems = $this->db->get('trtrbl1 t')->result();
        }

        return compact('billData', 'billItems');
    }

    public function verifyBill()
    {
        $code = 0;
        $msg = "No Bill found to verify";
        if (isset($_POST['items']) && count($_POST['items'])) {
            $items = $_POST['items'];
            if ($this->db->trans_begin()) {
                foreach ($items as $item) {
                    $where = array(
                        'TRSBL' => $item['TRSBL'],
                        'TRSSZ' => $item['TRSSZ'],
                        'TRSCLR' => $item['TRSCLR'],
                        'TRSITCD' => $item['TRSITCD'],
                    );
                    $updateData = array(
                        'PHQTY' => $item['PHQTY'],
                        'PHRES' => $item['PHRES'],
                    );
                    $this->db->where($where);
                    $this->db->update('trtrbl1', $updateData);
                }
                $where = array(
                    'TRPRBL' => $_POST['billNo']
                );
                $updateData = array(
                    'PHVER1' => getSessionData('user_name')
                );
                $this->db->where($where);
                $this->db->update('trtrbl', $updateData);
                $this->db->trans_complete();
                if ($this->db->trans_status()) {
                    $code = 1;
                    $msg = "Bill Verified Successfully";
                } else {
                    $msg = "Unable to save data";
                }
            } else {
                $msg = "Unable to save data";
            }
        }
        $response = compact('code', 'msg');
        echo json_encode($response);
    }

    public function transferBill()
    {
        $code = 0;
        $msg = "No bill found to save";
        if (isset($_POST['billNo'])) {
            $billNo = $_POST['billNo'];
            $billItems = array();
            $this->db->where(array('TRBLNO' => $billNo, 'fin_year' => fin_year()));
            branchWhere();
            $this->db->limit(1);
            $billData = $this->db->get('trtrbl')->row();

            if ($billData) {
                $select = array(
                    't.*',
                );
                $this->db->select($select);
                $TRSBL = $billData->TRBLNO;
                $this->db->where(array('TRSBL' => $TRSBL, 'fin_year' => fin_year()));
                branchWhere('t');
                $billItems = $this->db->get('trtrbl1 t')->result();
                array_walk($billItems, array($this, "chngItemsData"), null);
                unset($billData->PHVER1, $billData->ISACTIVE);
                $billData->ENTRYDATE = date("Y-m-d H:i:s");
                $billData->TRBLNO = $this->getCurrentBillNo();
                array_walk($billItems, array($this, "chngItemsData"), $billData->TRBLNO);
                $billData->TRBLDT = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['TRBLDT'])));
                if ($this->db->trans_begin()) {
                    $this->db->insert("trpbil", $billData);
                    $this->db->insert_batch("trpbil1", $billItems);
                    $this->db->where(array('TRBLNO' => $billNo, 'fin_year' => fin_year()));
                    branchWhere();
                    $this->db->update("trtrbl", array("ISACTIVE" => 1));
                    $this->db->where(array('TRSBL' => $TRSBL, 'fin_year' => fin_year()));
                    branchWhere();
                    $this->db->update("trtrbl1", array("ISACTIVE" => 1));
                    $this->db->trans_complete();
                    if ($this->db->trans_status()) {
                        $code = 1;
                        $msg = "Bill Transferred successfully";
                    } else {
                        $msg = "Unable to transfer bill";
                    }
                }
            }
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

    public function chngItemsData(&$billItems, $key, $_billNo)
    {
        if ($_billNo)
            $billItems->TRSBL = $_billNo;
        else
            unset($billItems->PHQTY, $billItems->PHRES, $billItems->ISACTIVE);
    }

    public function getCurrentBillNo()
    {
        $lastBill = 0;
        $this->db->select("TRBLNO");
        $this->db->order_by("TRBLNO", "DESC");
        $this->db->limit(1);
        $data = $this->db->get("trpbil")->row();

        if ($data) {
            $lastBill = $data->TRBLNO;
        }
        $lastBill += 1;
        return $lastBill;
    }
}
