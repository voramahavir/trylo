<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        ini_set('memory_limit', '-1');
        set_time_limit(100000);
    }

    function getItems()
    {
        // echo "hello";exit();
        $msg = '';
        $code = 0;
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
        $output = array("code" => 0, "response" => array(),
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );
        $this->db->limit($length, $start);
        $this->filterData();
        $this->db->select('t.TRITNM as name, t2.PRDNM as group, t.TRCUP as cup, t1.TRSZCD as size, t1.TRCOLOR as color, t.TRMRP1 as mrp, t1.BARCODF as barcode, (ist.op_stock + ist.cl_stock) as qty');
        $this->db->join("tritem1 as t1", "t1.TRITCD1 = t.TRITCD");
        $this->db->join("item_cur_stock as ist", "ist.itemcode = t1.TRITCD1 AND ist.size = t1.TRSZCD AND ist.color = t1.TRCOLOR");
        $this->db->join("trprgrp as t2", "t2.PRDCD = t.TRPRDGRP");
        $output['data'] = $this->db->get('tritem as t')->result();
//        echo $this->db->last_query();
        $this->filterData();
        $this->db->select('t.TRITNM as name, t2.PRDNM as group, t.TRCUP as cup, t1.TRSZCD as size, t1.TRCOLOR as color, t.TRMRP1 as mrp, t1.BARCODF as barcode, (ist.op_stock + ist.cl_stock) as qty');
        $this->db->join("tritem1 as t1", "t1.TRITCD1 = t.TRITCD");
        $this->db->join("item_cur_stock as ist", "ist.itemcode = t1.TRITCD1 AND ist.size = t1.TRSZCD AND ist.color = t1.TRCOLOR");
        $this->db->join("trprgrp as t2", "t2.PRDCD = t.TRPRDGRP");
        $output['recordsTotal'] = $this->db->get('tritem as t')->num_rows();
        $output['recordsFiltered'] = $output['recordsTotal'];
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
        echo json_encode($output);
        exit;
    }

    function getDropDownData()
    {
        $size = $this->db
            ->select('SZCD as size, PRDGRP as group')
            ->join("trprgrp", "trprgrp.PRDCD = trsize.PRDGRP")
            ->order_by("SZCD")
            ->get('trsize')
            ->result();
        $group = $this->db->select('PRDNM as name,PRDCD as code')->get('trprgrp')->result();
        // $color = $this->db->distinct('TRCOLOR as color')->get('tritem1')->result();
        $query = $this->db->query('select distinct TRCOLOR as color from tritem1 order by color');
        $color = $query->result_array();
        $output = new stdClass();
        $output->size = $size;
        $output->color = $color;
        $output->group = $group;
        echo json_encode($output);
        exit();
    }

    function filterData()
    {
        branchWhere('ist', 'branchcode');
        $filter_type = $this->input->post('filter_type');
        if ($filter_type == "barcode") {
            $barcode = $this->input->post('barcode');
            if ($barcode != null && $barcode != '') {
                $this->db->like("t1.BARCODF", $barcode);
            }
        } else if ($filter_type == "name") {
            $name = $this->input->post('name');
            if ($name != null && $name != '') {
                $this->db->like("t.TRITNM", $name);
            }
        } elseif ($filter_type == 'advance') {
            if (isset($_POST['color'])) {
                $color = $this->input->post('color');
            } else {
                $color = null;
            }
            if (isset($_POST['size'])) {
                $size = $this->input->post('size');
            } else {
                $size = null;
            }
            if (isset($_POST['group'])) {
                $group = $this->input->post('group');
            } else {
                $group = null;
            }
            if (isset($_POST['freeze'])) {
                $freeze = $this->input->post('freeze');
            } else {
                $freeze = null;
            }
            if ($freeze != null && $freeze != 'all') {
                if ($freeze == "yes") {
                    $this->db->where('t.TRFRZIT', 'Y');
                } elseif ($freeze == "no") {
                    $this->db->where('t.TRFRZIT', 'N');
                }
            }
            if ($color != null && $color != 'all') {
                $this->db->where('t1.TRCOLOR', $color);
            }
            if ($size != null && $size != 'all') {
                $this->db->where('t1.TRSZCD', $size);
            }
            if ($group != null && $group != 'all') {
                $this->db->where('t.TRPRDGRP', $group);
            }
        }
    }

    function getItemByPrdGrp($prdGrp)
    {
        $code = 0;
        $msg = "No data found. Please Select different group";
        $select = array(
            'i.TRITCD',
            'i.TRITNM',
            'i.TRPURT as rate',
            'GROUP_CONCAT(DISTINCT i1.TRCOLOR) as colors',
            'GROUP_CONCAT(DISTINCT i1.TRSZCD) as sizes',
            'GROUP_CONCAT(DISTINCT CONCAT(i1.TRSZCD, "," ,i1.TRCOLOR, "," ,i1.BARCODF) SEPARATOR "|") as barcodes',
            'GROUP_CONCAT(DISTINCT CONCAT(i1.TRSZCD, "," ,i1.TRCOLOR) SEPARATOR "|") as szclr',
        );
        $where = array('i.TRPRDGRP' => $prdGrp);
        $this->db->select($select);
        $this->db->where($where);
        $this->db->join('tritem1 i1', 'i1.TRITCD1 = i.TRITCD');
        $this->db->group_by('i.TRITCD');
        $this->db->order_by('i.TRITNM');
        $data = $this->db->get('tritem i')->result();
        if (count($data)) {
            $code = 1;
            $msg = "Data fetched successfully";
        }
        $response = compact("code", "msg", "data");
        echo json_encode($response);
        exit;
    }
}
