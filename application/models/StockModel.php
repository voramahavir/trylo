<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockModel extends CI_Model
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
            $this->db->like("T.TRTOTQTY", $search)->or_like("T.TRBLNO", $search);
        }
        $this->filterData();
        $output = array("code" => 0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );

        $this->db->select('T.TRBLNO,T.TRBLDT,TRTOTQTY,T.IS_ACTIVE');
        $this->db->join('trphst1 tb', 'T.TRBLNO = tb.TRBLNO1', 'LEFT');
        $this->db->join('tritem ti', 'ti.TRITCD = tb.TRITCD', 'LEFT');
        $this->db->join('tritem1 ti1', 'ti.TRITCD = ti1.TRITCD1 AND ti1.TRSZCD = tb.TRSZ AND ti1.TRCOLOR = tb.TRCLR', 'LEFT');
        $this->db->group_by('T.TRBLNO');
        $this->db->limit($length, $start);
        // $this->db->join("trbil1 as t1", "t1.TRBLNO1 = T.TRBLNO");
        $output['data'] = $this->db->get('trphst as T')->result();
//        echo $this->db->last_query();
        $this->filterData();
        if (!empty($search)) {
            $this->db->like("T.TRTOTQTY", $search)->or_like("T.TRBLNO", $search);
        }
        $this->db->select('T.TRBLNO,T.TRBLDT,TRTOTQTY,T.IS_ACTIVE');
        $this->db->join('trphst1 tb', 'T.TRBLNO = tb.TRBLNO1', 'LEFT');
        $this->db->join('tritem ti', 'ti.TRITCD = tb.TRITCD', 'LEFT');
        $this->db->join('tritem1 ti1', 'ti.TRITCD = ti1.TRITCD1 AND ti1.TRSZCD = tb.TRSZ AND ti1.TRCOLOR = tb.TRCLR', 'LEFT');
        $this->db->group_by('T.TRBLNO');
        // $this->db->join("trbil1 as t1", "t1.TRBLNO1 = T.TRBLNO");
        $output['recordsTotal'] = $this->db->get('trphst as T')->num_rows();
        $output['recordsFiltered'] = $output['recordsTotal'];
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
        echo json_encode($output);
        exit();
    }

    public function filterData()
    {
        branchWhere('T');
        if (isset($_POST['to_date'])) {
            $to_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['to_date'])));
            $this->db->where('T.TRBLDT <= ', $to_date);
        }
        if (isset($_POST['from_date'])) {
            $from_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['from_date'])));
            $this->db->where('T.TRBLDT >= ', $from_date);
        }
    }

    public function getCurrentBillNo()
    {
        $lastBill = 0;
        $this->db->select("TRBLNO");
        $this->db->where("fin_year", fin_year());
        branchWhere();
        $this->db->order_by("TRBLNO", "DESC");
        $this->db->limit(1);
        $data = $this->db->get("trphst")->row();

        if ($data) {
            $lastBill = $data->TRBLNO;
        }
        $lastBill++;
        return $lastBill;
    }

    public function stockAdd()
    {
        $code = 0;
        $msg = "Unable to save data";
        if (isset($_POST['stockData']) && count($_POST['stockData']) && isset($_POST['itemData']) && count($_POST['itemData'])) {
            $stockData = $_POST['stockData'];
            $itemData = $_POST['itemData'];
            $stockData['TRBLDT'] = date("Y-m-d", strtotime(str_replace("/", "-", $stockData['TRBLDT'])));
            $stockData['branch_code'] = getSessionData('branch_code');
            $stockData['fin_year'] = fin_year();
            if ($this->db->trans_begin()) {
                $this->db->insert("trphst", $stockData);
                $this->db->insert_batch("trphst1", $itemData);
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

    public function deleteStock($id)
    {
        $code = 0;
        $response = "";
        branchWhere();
        $this->db->where('TRBLNO', $id)->set(array(
            'IS_ACTIVE' => 0,
            'fin_year' => fin_year()
        ))->update("trphst");
        $code = 1;
        $response = "Purchase Order deleted successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function recoverStock($id)
    {
        $code = 0;
        $response = "";
        branchWhere();
        $this->db->where('TRBLNO', $id)->set(array(
            'IS_ACTIVE' => 1,
            'fin_year' => fin_year()
        ))->update("trphst");
        $code = 1;
        $response = "Purchase Order recover successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }
}
