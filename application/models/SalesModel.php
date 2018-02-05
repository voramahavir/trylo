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
            $cardData = isset($_POST['cardData']) ? $_POST['cardData'] : array();
            $salesData['TRBLDT'] = date("Y-m-d", strtotime(str_replace("/", "-", $salesData['TRBLDT'])));
            $salesData['TRDOB'] = ($salesData['TRDOB']) ? date("Y-m-d", strtotime(str_replace("/", "-", $salesData['TRDOB']))) : NULL;
            $salesData['TRMAD'] = ($salesData['TRMAD']) ? date("Y-m-d", strtotime(str_replace("/", "-", $salesData['TRMAD']))) : NULL;
            $salesData['TRCRDEXP'] = ($salesData['TRCRDEXP']) ? date("Y-m-d", strtotime(str_replace("/", "-", $salesData['TRCRDEXP']))) : NULL;
            $salesData['branchcode'] = getSessionData('branch_code');
            $salesData['fin_year'] = fin_year();
            /*print_r(compact("salesData","itemsData"));
            die;*/
            if ($this->db->trans_begin()) {
                $this->db->insert("trbil", $salesData);
                $lastId = $this->db->insert_id();
                $this->db->insert_batch("trbil1", $itemsData);
                if (count($cardData)) {
                    $this->db->insert("crdtran", $cardData);
                }
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

        $this->filterData();
        $output = array("code" => 0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );

        $this->db->select('t.TRBLNO as billno,t.TRBLDT as date,t.TRPRNM as name,TRTOTQTY as qty,t.TRNET as bamount,t.TRCRAMT as ramount,t.TRTYPE as type,t.CANBL,(SELECT if(TRPH1 > "",count(TRPH1),"") FROM trbil t2 WHERE t2.TRPH1 = t.TRPH1 AND t2.fin_year = "' . fin_year() . '" GROUP BY t2.TRPH1) as repeatCount,t.TROTH2 as other,t.TRDSPRAM as discount');
        $this->db->limit($length, $start);
        $this->db->join("trbil1 as t1", "t1.TRBLNO1 = t.TRBLNO AND t.branchcode = t1.branchcode1 AND t.fin_year = t1.fin_year1");
        $this->db->group_by('t.TRBLNO');
        $this->db->order_by("t.id", "DESC");
        $output['data'] = $this->db->get('trbil as t')->result();
//        echo $this->db->last_query();die;
        $this->filterData();
        $this->db->select('t.TRBLNO as billno,t.TRBLDT as date,t.TRPRNM as name,TRTOTQTY as qty,t.TRNET as bamount,t.TRCRAMT as ramount,t.TRTYPE as type,t.CANBL,(SELECT if(TRPH1 > "",count(TRPH1),"") FROM trbil t2 WHERE t2.TRPH1 = t.TRPH1 AND t2.fin_year = "' . fin_year() . '" GROUP BY t2.TRPH1) as repeatCount');
        $this->db->join("trbil1 as t1", "t1.TRBLNO1 = t.TRBLNO AND t.branchcode = t1.branchcode1 AND t.fin_year = t1.fin_year1");
        $this->db->group_by('t.TRBLNO');
        $output['recordsTotal'] = $this->db->get('trbil as t')->num_rows();
        $output['recordsFiltered'] = $output['recordsTotal'];
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
        $this->db->where("fin_year", fin_year());
        branchWhere("trbil", "branchcode");
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
            'b.id',
            'b.TRPRNM as party',
            'b.TRPH1 as phoneno',
            'CONCAT(b.CRDPREF,"/","/",' . $billNo . ') as billno',
            'b.TRBLDT as billdate',
            'b.TRTOTQTY as totqty',
            'b.TRGROS as grsamt',
            'b.EXRCVD as rcdamt',
            'b.EXBACK as retamt',
            'b.TRCRAMT as custamt',
            'b.TRNET as netamt',
            'b.TRRND as rndoff',
            'FORMAT(SUM(bi.TRFBEL), 2) as netblamt',
            'FORMAT(SUM(bi.TRDS2), 2) as totdis',
            'FORMAT(SUM(bi.TRFABV), 2) as netabamt',
            'FORMAT(SUM(bi.TRLSGSTA), 2) as sgstlamt',
            'FORMAT(SUM(bi.TRLCGSTA), 2) as cgstlamt',
            'FORMAT(SUM(bi.TRHSGSTA), 2) as sgsthamt',
            'FORMAT(SUM(bi.TRHCGSTA), 2) as cgsthamt',
            'p.TRLOW as lowamt',
            'b.CRDPREF',
            'b.CRDNUM',
            'b.CRREDPN',
            'b.CRREDAM',
            'b.TRTYPE',
            'b.TRPMMOB',
            'b.TRPMNAM',
            'b.TRCRDNO',
            'b.TRCRDEXP',
            'b.TRCRDHOLD',
            'b.TROTH1',
            'b.TROTH2',
            'm.CARDTYPE',
            'b.USG6'
        );
        $where = array(
            'b.TRBLNO' => $billNo,
            'fin_year' => fin_year()
        );
        $this->db->select($select);
        $this->db->where($where);
        branchWhere("b", "branchcode");
        $this->db->join("trbil1 bi", "bi.TRBLNO1 = b.TRBLNO");
        $this->db->join("tritem i", "i.TRITCD = bi.TRITCD");
        $this->db->join("trprgrp as p", "i.TRPRDGRP = p.PRDCD");
        $this->db->join("trcrdty as m", "m.CARDTYNO = b.TRPMCTY", "LEFT");
        $this->db->group_by("b.TRBLNO");
        $this->db->limit(1);
        $billData = $this->db->get('trbil b')->row();
        $printCount = $billData->USG6;
        if ($printCount) {
            $printCount++;
        } else {
            $printCount = 1;
        }
        $this->db->update('trbil', array('USG6' => $printCount), array('id' => $billData->id));
        $billData->USG6 = $printCount;
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
                'bi.TRLSGST as sgstl',
                'bi.TRLSGSTA as sgstla',
                'bi.TRLCGST as cgstl',
                'bi.TRLCGSTA as cgstla',
                'bi.TRHSGST as sgsth',
                'bi.TRHSGSTA as sgstha',
                'bi.TRHCGST as cgsth',
                'bi.TRHCGSTA as cgstha',
                'bi.TRLSGST as sgstlper',
                'bi.TRLCGST as cgstlper',
                'bi.TRHSGST as sgsthper',
                'bi.TRHCGST as cgsthper',
                'p.TRHSN as hsn',
            );
            $where = array(
                'bi.TRBLNO1' => $billNo,
                'bi.fin_year1' => fin_year()
            );
            $this->db->select($select);
            $this->db->where($where);
            branchWhere("bi", "branchcode1");
            $this->db->join("tritem i", "i.TRITCD = bi.TRITCD");
            $this->db->join("trprgrp as p", "i.TRPRDGRP = p.PRDCD");
            $itemData = $this->db->get('trbil1 bi')->result();
            $printData = compact("billData", "itemData");
        }
        return $printData;
    }

    public function filterData()
    {
        branchWhere("t", "branchcode");

        if (isset($_POST['to_date'])) {
            $to_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['to_date'])));
            $this->db->where('t.TRBLDT <= ', $to_date);
        }
        if (isset($_POST['from_date'])) {
            $from_date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['from_date'])));
            $this->db->where('t.TRBLDT >= ', $from_date);
        }
        if (isset($_POST['payment_mode'])) {
            $payment_mode = $_POST['payment_mode'];
            if ($payment_mode != null && $payment_mode != 'all') {
                $this->db->where('t.TRTYPE', $payment_mode);
            }
        }

        if (isset($_POST['payment'])) {
            $payment = $_POST['payment'];
            $where = array(
                't.CANBL' => null
            );
            if ($payment != null || $payment != "") {
                if ($payment == 1) {
                    $where['t.TRCRAMT'] = 0;
                } elseif ($payment == 2) {
                    $where['t.TRCRAMT > '] = 0;
                } elseif ($payment == 3) {
                    $where['t.CANBL'] = 'T';
                }
            }
            $this->db->where($where);
        }
    }

    public function getCardByMobile($mobileNo)
    {
        $code = 0;
        $msg = "No data found with this number";
        $data = array();
        $select = array(
            "CARDNO",
        );
        $where = array(
            "MOBILENO" => $mobileNo,
            "ISACTIVE" => 1
        );
        $this->db->select($select);
        $this->db->where($where);
        branchWhere('maincrd');
        //$this->db->join("trbil", "trbil.TRPH1 = trloyl.MOBILEID");
        $this->db->limit(1);
        $cardData = $this->db->get("maincrd")->row();
        if (count($cardData)) {
            $code = 1;
            $msg = "Data fetched successfully";
            $data = $cardData;
        }
        $response = compact("code", "msg", "data");
        echo json_encode($response);
        exit;
    }

    public function getSalesBill($billNo)
    {
        $code = 0;
        $msg = "Unable to get Data";
        $data = array();
        $where = array(
            't.TRBLNO' => $billNo,
            't.branchcode' => getSessionData('branch_code'),
            't.fin_year' => fin_year()
        );
        $this->db->where($where);
        $this->db->limit(1);
        $billData = $this->db->get('trbil t')->row();
        if (count($billData)) {
            $where = array(
                't1.TRBLNO1' => $billNo,
                't1.branchcode1' => getSessionData('branch_code'),
                't1.fin_year1' => fin_year()
            );
            $select = array(
                't1.*',
                'i.TRITNM',
                'i1.*',
                'p.*'
            );
            $this->db->select($select);
            $this->db->where($where);
            $this->db->join('trbil t', 't.TRBLNO = t1.TRBLNO1 AND t.branchcode = t1.branchcode1 AND t.fin_year = t1.fin_year1');
            $this->db->join('tritem i', 'i.TRITCD = t1.TRITCD');
            $this->db->join("trprgrp as p", "i.TRPRDGRP = p.PRDCD");
            $this->db->join('tritem1 i1', 'i1.TRITCD1 = t1.TRITCD AND i1.TRSZCD = t1.TRSZ AND i1.TRCOLOR = t1.TRCLR');
            $itemsData = $this->db->get('trbil1 t1')->result();
            $code = 1;
            $msg = "Data fetched successfully";
            $data = compact("billData", "itemsData");
        }
        $response = compact("code", "msg", "data");
        echo json_encode($response);
        exit;
    }

    public function salesUpdate()
    {
        $code = 0;
        $msg = "Unable to save data";
        $lastId = 0;
        if (isset($_POST['salesData']) && count($_POST['salesData']) && isset($_POST['itemsData']) && count($_POST['itemsData'])) {
            $salesData = $_POST['salesData'];
            $itemsData = $_POST['itemsData'];
            $cardData = isset($_POST['cardData']) ? $_POST['cardData'] : array();
            $salesData['TRBLDT'] = date("Y-m-d", strtotime(str_replace("/", "-", $salesData['TRBLDT'])));
            $salesData['TRDOB'] = ($salesData['TRDOB']) ? date("Y-m-d", strtotime(str_replace("/", "-", $salesData['TRDOB']))) : NULL;
            $salesData['TRMAD'] = ($salesData['TRMAD']) ? date("Y-m-d", strtotime(str_replace("/", "-", $salesData['TRMAD']))) : NULL;
            $salesData['TRCRDEXP'] = ($salesData['TRCRDEXP']) ? date("Y-m-d", strtotime(str_replace("/", "-", $salesData['TRCRDEXP']))) : NULL;
            $salesData['branchcode'] = getSessionData('branch_code');
            $salesData['fin_year'] = fin_year();
            /*print_r(compact("salesData","itemsData"));
            die;*/
            if ($this->db->trans_begin()) {
                $where = array(
                    'TRBLNO' => $salesData['TRBLNO'],
                    'branchcode' => getSessionData('branch_code'),
                    'fin_year' => fin_year()
                );
                $this->db->where($where);
                $this->db->update("trbil", $salesData);
                $where = array(
                    'TRBLNO1' => $salesData['TRBLNO'],
                    'branchcode1' => getSessionData('branch_code'),
                    'fin_year1' => fin_year()
                );
                $this->db->where($where);
                $this->db->delete("trbil1");
                $this->db->insert_batch("trbil1", $itemsData);
                if (count($cardData)) {
                    $where = array(
                        'BILLNO' => $salesData['TRBLNO'],
                        'branch_code' => getSessionData('branch_code'),
                        'FINYEAR' => fin_year()
                    );
                    $this->db->where($where);
                    $this->db->update("crdtran", $cardData);
                }
                $this->db->trans_complete();
                if ($this->db->trans_status()) {
                    $code = 1;
                    $msg = "Data updated successfully";
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

    public function salesDelete($id)
    {
        branchWhere("trbil", "branchcode");
        $this->db->where(array(
            'fin_year' => fin_year(),
            'TRBLNO' => $id
        ))->delete("trbil");
        $code = 1;
        $response = "Sales Bill deleted successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function salesCancel($id)
    {
        branchWhere("trbil", "branchcode");
        $this->db->where(array(
            'fin_year' => fin_year(),
            'TRBLNO' => $id
        ))->set(array(
            'CANBL' => 'T'
        ))->update("trbil");
        $code = 1;
        $response = "Sales Bill cancelled successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function getCardTypes()
    {
        $code = 0;
        $msg = "No data found";
        $select = array(
            "CARDTYNO",
            "CARDTYPE"
        );
        $this->db->select($select);
        $this->db->order_by("CARDTYPE", "ASC");
        $data = $this->db->get("trcrdty")->result();
        if (count($data)) {
            $code = 1;
            $msg = "Data fetched successfully";
        }
        $response = compact("code", "msg", "data");
        echo json_encode($response);
        exit;
    }

    public function getSearchedBills()
    {
        $type = isset($_POST['type']) ? $_POST['type'] : 1;
        $searchCol = "TRPRNM";
        if ($type != 1) {
            $searchCol = "TRPH1";
        }
        $select = array(
            "t.*",
            "CREDITCRD1",
            "group_concat(concat(ti.TRITNM, ',', t1.TRSZ, ',', t1.TRCLR, ',', t1.TRQTY, ',', t1.TRRATE, ',', t1.TRDS2, ',', TRNETRT) SEPARATOR'|') AS itemData",
        );

        $this->db->select($select);
        $this->db->join("trbil1 t1", "t1.TRBLNO1 = t.TRBLNO AND t.branchcode = t1.branchcode1 AND t.fin_year = t1.fin_year1");
        $this->db->join("tritem ti", "ti.TRITCD = t1.TRITCD");
        $this->db->join("crdtran c", "c.BILLNO = t.TRBLNO", "LEFT");
        branchWhere("t", "branchcode");
        if (isset($_POST['search']) && isset($_POST['search']['value'])) {
            $search = $_POST['search']['value'];
            $this->db->like($searchCol, $search);
        }
        $this->db->group_by("TRBLNO");
        $data = $this->db->get("trbil t")->result();
        $draw = $_POST['draw'];
        $recordsFiltered = $recordsTotal = count($data);
        $response = compact("draw", "data", "recordsFiltered", "recordsTotal");
        echo json_encode($response);
        exit;
    }

    public function getLoyaltyByMobile()
    {
        $mobileNo = $_POST['mobileNo'];
        $code = 0;
        $msg = "No data found with this number";
        $data = array();
        $select = array(
            "LODISCPR"
        );
        $where = array(
            "MOBILEID" => $mobileNo,
            "ISACTIVE" => 1,
            "LOENDT >=" => date('Y-m-d')
        );
        $this->db->select($select);
        $this->db->where($where);
        branchWhere();
        $this->db->limit(1);
        $cardData = $this->db->get("trloyl")->row();
//        echo $this->db->last_query();
        if (count($cardData)) {
            $code = 1;
            $msg = "Data fetched successfully";
            $data = $cardData;
        }
        $response = compact("code", "msg", "data");
        echo json_encode($response);
        exit;
    }

    public function getDenominations()
    {
        $finalDenominations = array(
            "F2000" => 0,
            "F200" => 0,
            "F500" => 0,
            "F100" => 0,
            "F50" => 0,
            "F20" => 0,
            "F10" => 0,
            "F5" => 0,
            "FMISC" => 0,
        );
        $select = array(
            "(sum(A2000) - sum(B2000)) AS F2000",
            "(sum(A200) - sum(B200)) AS F200",
            "(sum(A500) - sum(B500)) AS F500",
            "(sum(A100) - sum(B100)) AS F100",
            "(sum(A50) - sum(B50)) AS F50",
            "(sum(A20) - sum(B20)) AS F20",
            "(sum(A10) - sum(B10)) AS F10",
            "(sum(A5) - sum(B5)) AS F5",
            "(sum(AMISC) - sum(BMISC)) AS FMISC"
        );
        $where = array("VOUDT" => date('Y-m-d'));
        branchWhere();
        $this->db->select($select);
        $this->db->where($where);
        $this->db->group_by("VOUDT");
        $denominations = $this->db->get("kdeno")->row();

        $select = array(
            "(sum(RC2000) - sum(PD2000)) AS F2000",
            "(sum(RC200) - sum(PD200)) AS F200",
            "(sum(RC500) - sum(PD500)) AS F500",
            "(sum(RC100) - sum(PD100)) AS F100",
            "(sum(RC50) - sum(PD50)) AS F50",
            "(sum(RC20) - sum(PD20)) AS F20",
            "(sum(RC10) - sum(PD10)) AS F10",
            "(sum(RC5) - sum(PD5)) AS F5",
            "(sum(RCMIS) - sum(PDMIS)) AS FMISC"
        );
        $where = array("TRBLDT" => date('Y-m-d'));
        branchWhere("trbil", "branchcode");
        $this->db->select($select);
        $this->db->where($where);
        $this->db->group_by("TRBLDT");
        $salesDenominations = $this->db->get("trbil")->row();

        $select = array(
            "(sum(ifnull(PD2000,0)) - sum(RC2000)) AS F2000",
            "(sum(ifnull(PD200,0)) - sum(RC200)) AS F200",
            "(sum(ifnull(PD500,0)) - sum(RC500)) AS F500",
            "(sum(ifnull(PD100,0)) - sum(RC100)) AS F100",
            "(sum(ifnull(PD50,0)) - sum(RC50)) AS F50",
            "(sum(ifnull(PD20,0)) - sum(RC20)) AS F20",
            "(sum(ifnull(PD10,0)) - sum(RC10)) AS F10",
            "(sum(ifnull(PD5,0)) - sum(RC5)) AS F5",
            "(sum(ifnull(PDMIS,0)) - sum(RCMIS)) AS FMISC"
        );
        $where = array("TRBLDT" => date('Y-m-d'));
        branchWhere();
        $this->db->select($select);
        $this->db->where($where);
        $this->db->group_by("TRBLDT");
        $salesRetDenominations = $this->db->get("trslret")->row();

        $select = array(
            "(sum(0) - sum(DEM11)) AS F2000",
            "(sum(0) - sum(DEM12)) AS F200",
            "(sum(0) - sum(DEM2)) AS F500",
            "(sum(0) - sum(DEM3)) AS F100",
            "(sum(0) - sum(DEM4)) AS F50",
            "(sum(0) - sum(DEM5)) AS F20",
            "(sum(0) - sum(DEM6)) AS F10",
            "(sum(0) - sum(DEM7)) AS F5",
            "(sum(0) - sum(DEM8A)) AS FMISC"
        );
        $where = array("VOUDT" => date('Y-m-d'));
        branchWhere();
        $this->db->select($select);
        $this->db->where($where);
        $this->db->group_by("VOUDT");
        $voucherDenominations = $this->db->get("trvou")->row();

        $select = array(
            "(sum(ifnull(LOR2000,0)) - sum(LOP2000)) AS F2000",
            "(sum(ifnull(LOR200,0)) - sum(LOP200)) AS F200",
            "(sum(ifnull(LOR500,0)) - sum(LOP500)) AS F500",
            "(sum(ifnull(LOR100,0)) - sum(LOP100)) AS F100",
            "(sum(ifnull(LOR50,0)) - sum(LOP50)) AS F50",
            "(sum(ifnull(LOR20,0)) - sum(LOP20)) AS F20",
            "(sum(ifnull(LOR10,0)) - sum(LOP10)) AS F10",
            "(sum(ifnull(LOR5,0)) - sum(LOP5)) AS F5",
            "(sum(ifnull(LOROTH,0)) - sum(LOPOTH)) AS FMISC"
        );
        $where = array("LOSTDT" => date('Y-m-d'));
        branchWhere();
        $this->db->select($select);
        $this->db->where($where);
        $this->db->group_by("LOSTDT");
        $loyaltyDenominations = $this->db->get("trloyl")->row();

        foreach ($finalDenominations as $key => $denomination) {
            if (isset($denominations->$key)) {
                $finalDenominations[$key] += $denominations->$key;
            }
            if (isset($salesDenominations->$key)) {
                $finalDenominations[$key] += $salesDenominations->$key;
            }
            if (isset($salesRetDenominations->$key)) {
                $finalDenominations[$key] += $salesRetDenominations->$key;
            }
            if (isset($voucherDenominations->$key)) {
                $finalDenominations[$key] += $voucherDenominations->$key;
            }
            if (isset($loyaltyDenominations->$key)) {
                $finalDenominations[$key] += $loyaltyDenominations->$key;
            }
        }

        $response = compact("finalDenominations");
        echo json_encode($response);
        exit;
    }
}
