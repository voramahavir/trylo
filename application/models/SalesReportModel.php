<?php

class SalesReportModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getDateWiseRpt()
    {
        $fromDate = $_POST['fromDate'];
        $toDate = $_POST['toDate'];
        $branchCode = $_POST['branchCode'];
        $select = array(
            "TRBLDT",
            'concat("Bill No From : ", SUBSTRING_INDEX(group_concat(TRBLNO ORDER BY TRBLNO), \',\', 1),
         " - ",
         SUBSTRING_INDEX(group_concat(TRBLNO ORDER BY TRBLNO), \',\', -1)) AS description',
            'round(sum(tb.TRNETBT * tb.TRQTY),2)                                             AS AMTBT',
            'round(sum(tb.TRHCGSTA),2) + round(sum(tb.TRLCGSTA),2)                AS CGST',
            'round(sum(tb.TRHSGSTA),2) + round(sum(tb.TRLSGSTA),2)                AS SGST',
            'round(sum(t.TROTH2),2) + round(sum(t.TRRND),2)                       AS OTHER',
            'round(sum(t.TRNET),2)                                                AS TOTALAMT',
            '"sales"                                                     AS GROUPS'
        );

        $where = array(
            'TRBLDT >=' => $fromDate,
            'TRBLDT <=' => $toDate,
            'branchcode' => $branchCode,
            'CANBL' => null
        );

        $this->db->select($select);
        $this->db->where($where);
        $this->db->join("trbil1 tb", "tb.TRBLNO1 = t.TRBLNO AND tb.branchcode1 = t.branchcode AND tb.fin_year1 = t.fin_year");
        $this->db->group_by("TRBLDT");
        $this->db->order_by("TRBLDT");
        $salesData = $this->db->get('trbil t')->result();

        $select = array(
            "TRBLDT",
            'concat("C/N No. From : ", SUBSTRING_INDEX(group_concat(TRBLNO ORDER BY TRBLNO), \',\', 1),
         " - ",
         SUBSTRING_INDEX(group_concat(TRBLNO ORDER BY TRBLNO), \',\', -1)) AS description',
            'round(sum(tb.TRNETBT * tb.TRQTY),2)                                             AS AMTBT',
            'round(sum(tb.TRHCGSTA),2) + round(sum(tb.TRLCGSTA),2)                         AS CGST',
            'round(sum(tb.TRHSGSTA),2) + round(sum(tb.TRLSGSTA),2)                         AS SGST',
            'round(sum(t.TROTH2),2) + round(sum(t.TRRND),2)                                AS OTHER',
            'round(sum(t.TRNET),2)                                                AS TOTALAMT',
            '"salesreturn"                                                     AS GROUPS'
        );

        $this->db->select($select);
        unset($where['branchcode']);
        $where['t.branch_code'] = $branchCode;
        $this->db->where($where);
        $this->db->join("trslret1 tb", "tb.TRBLNO1 = t.TRBLNO AND tb.branch_code = t.branch_code AND tb.fin_year = t.fin_year");
        $this->db->group_by("TRBLDT");
        $this->db->order_by("TRBLDT");
        $salesRetData = $this->db->get('trslret t')->result();
//        echo $this->db->last_query();
        $data = array_merge($salesData, $salesRetData);
        echo json_encode($data);
        exit;
    }

    function getSalesRetRpt()
    {
        $fromDate = $_POST['fromDate'];
        $toDate = $_POST['toDate'];
        $branchCode = $_POST['branchCode'];
        $select = array(
            "t.TRBLNO",
            "t.TRBLDT",
            "t.TRTYPE                                                AS TYPE",
            "t.TRPRNM                                                AS CUSTOMER",
            "round(sum(tb.TRNETBT * tb.TRQTY) + sum(tb.TRDS2), 2)    AS GROSS",
            "round(sum(tb.TRDS2), 2)                                 AS DISC",
            "round(sum(tb.TRNETBT * tb.TRQTY), 2)                    AS AMTBT",
            "round(sum(tb.TRHCGSTA), 2) + round(sum(tb.TRLCGSTA), 2) AS CGST",
            "round(sum(tb.TRHSGSTA), 2) + round(sum(tb.TRLSGSTA), 2) AS SGST",
            "round(sum(t.TRGROS), 2)                                 AS TOTAL",
            "round(sum(t.TROTH2), 2)                                 AS OTHER",
            "round(sum(t.TRRND), 2)                                  AS ROUNDOFF",
            "round(sum(t.TRNET), 2)                                  AS TOTALAMT",
            '"sales"                                                 AS GROUPS',
            'round(sum(t.CRREDAM), 2)                                AS POINTSRED'
        );

        $where = array(
            'TRBLDT >=' => $fromDate,
            'TRBLDT <=' => $toDate,
            'branchcode' => $branchCode,
            'CANBL' => null
        );

        $this->db->select($select);
        $this->db->where($where);
        $this->db->join("trbil1 tb", "tb.TRBLNO1 = t.TRBLNO AND tb.branchcode1 = t.branchcode AND tb.fin_year1 = t.fin_year");
        $this->db->group_by("TRBLDT");
        $this->db->order_by("TRBLDT");
        $salesData = $this->db->get('trbil t')->result();

        $select = array(
            "t.TRBLNO",
            "t.TRBLDT",
            "t.TRTYPE                                                AS TYPE",
            "t.TRPRNM                                                AS CUSTOMER",
            "round(sum(tb.TRNETBT * tb.TRQTY) + sum(tb.TRDS2), 2)    AS GROSS",
            "round(sum(tb.TRDS2), 2)                                 AS DISC",
            "round(sum(tb.TRNETBT * tb.TRQTY), 2)                    AS AMTBT",
            "round(sum(tb.TRHCGSTA), 2) + round(sum(tb.TRLCGSTA), 2) AS CGST",
            "round(sum(tb.TRHSGSTA), 2) + round(sum(tb.TRLSGSTA), 2) AS SGST",
            "round(sum(t.TRGROS), 2)                                 AS TOTAL",
            "round(sum(t.TROTH2), 2)                                 AS OTHER",
            "round(sum(t.TRRND), 2)                                  AS ROUNDOFF",
            "round(sum(t.TRNET), 2)                                  AS TOTALAMT",
            '"salesreturn"                                                     AS GROUPS'
        );

        $this->db->select($select);
        unset($where['branchcode']);
        $where['t.branch_code'] = $branchCode;
        $this->db->where($where);
        $this->db->join("trslret1 tb", "tb.TRBLNO1 = t.TRBLNO AND tb.branch_code = t.branch_code AND tb.fin_year = t.fin_year");
        $this->db->group_by("TRBLNO");
        $this->db->order_by("TRBLNO");
        $salesRetData = $this->db->get('trslret t')->result();
//        echo $this->db->last_query();
        $data = array_merge($salesData, $salesRetData);
        echo json_encode($data);
        exit;
    }

    function getSalesCommRpt()
    {
        $fromDate = $_POST['fromDate'];
        $toDate = $_POST['toDate'];
        $branchCode = $_POST['branchCode'];
        $select = array(
            '"SALES(A)"                                            AS description',
            'round(sum(tb.TRNETBT * tb.TRQTY),2)                   AS AMTBT',
            'round(sum(tb.TRHCGSTA),2) + round(sum(tb.TRLCGSTA),2) AS CGST',
            'round(sum(tb.TRHSGSTA),2) + round(sum(tb.TRLSGSTA),2) AS SGST',
            'round(sum(t.TRGROS),2)                                AS TOTALAMT',
            'round(sum(t.CRREDAM), 2)                              AS POINTSRED'
        );

        $where = array(
            'TRBLDT >=' => $fromDate,
            'TRBLDT <=' => $toDate,
            'branchcode' => $branchCode,
            'CANBL' => null
        );

        $this->db->select($select);
        $this->db->where($where);
        $this->db->join("trbil1 tb", "tb.TRBLNO1 = t.TRBLNO AND tb.branchcode1 = t.branchcode AND tb.fin_year1 = t.fin_year");
        $this->db->order_by("TRBLDT");
        $salesData = $this->db->get('trbil t')->result();

        $select = array(
            '"LESS: SALES RETURN(B)"                                     AS description',
            '0 - (round(sum(tb.TRNETBT * tb.TRQTY),2))                   AS AMTBT',
            '0 - (round(sum(tb.TRHCGSTA),2) + round(sum(tb.TRLCGSTA),2)) AS CGST',
            '0 - (round(sum(tb.TRHSGSTA),2) + round(sum(tb.TRLSGSTA),2)) AS SGST',
            '0 - (round(sum(t.TRGROS),2))                                AS TOTALAMT'
        );

        $this->db->select($select);
        unset($where['branchcode']);
        $where['t.branch_code'] = $branchCode;
        $this->db->where($where);
        $this->db->join("trslret1 tb", "tb.TRBLNO1 = t.TRBLNO AND tb.branch_code = t.branch_code AND tb.fin_year = t.fin_year");
        $this->db->order_by("TRBLDT");
        $salesRetData = $this->db->get('trslret t')->result();
//        echo $this->db->last_query();
        $data = array_merge($salesData, $salesRetData);
        echo json_encode($data);
        exit;
    }

    function getSalesSumRpt()
    {
        $fromDate = $_POST['fromDate'];
        $toDate = $_POST['toDate'];
        $branchCode = $_POST['branchCode'];
        $select = array(
            "group_concat(if(t.CRREDAM IS NULL, NULL, if(t.CRREDAM = 0, NULL, t.TRBLNO)))                    AS TRBLNO",
            "tp.PRDNM",
            "sum(tb.TRQTY) AS qty",
            "round(sum(tb.TRNETBT * tb.TRQTY) + sum(tb.TRDS2), 2)    AS GROSS",
            "round(sum(tb.TRDS2), 2)                                 AS DISC",
            "round(sum(tb.TRNETBT * tb.TRQTY), 2)                    AS AMTBT",
            "round(sum(tb.TRHCGSTA), 2) + round(sum(tb.TRLCGSTA), 2) + round(sum(tb.TRHSGSTA), 2) + round(sum(tb.TRLSGSTA), 2) AS GST",
            "round(sum(t.TRGROS), 2)                                 AS TOTAL",
            "round(sum(t.TROTH2),2) + round(sum(t.TRRND),2)          AS ADVANCE",
            'round(sum(t.CRREDAM), 2)                                AS POINTSRED',
            'round(sum(if(t.TRTYPE = 1,t.TRNET,0)), 2)               AS CASH',
            'round(sum(if(t.TRTYPE = 2,t.TRNET,0)), 2)               AS DEBIT',
            'round(sum(if(t.TRTYPE = 3,t.TRNET,0)), 2)               AS CARD',
            'round(sum(if(t.TRTYPE = 4,t.TRNET,0)), 2)               AS MOBILE',
        );

        $where = array(
            'TRBLDT >=' => $fromDate,
            'TRBLDT <=' => $toDate,
            'branchcode' => $branchCode,
            'CANBL' => null
        );

        $this->db->select($select);
        $this->db->where($where);
        $this->db->join("trbil1 tb", "tb.TRBLNO1 = t.TRBLNO AND tb.branchcode1 = t.branchcode AND tb.fin_year1 = t.fin_year");
        $this->db->join("tritem i", "tb.TRITCD = i.TRITCD");
        $this->db->join("trprgrp tp", "i.TRPRDGRP = tp.PRDCD");
        $this->db->group_by("tp.PRDCD");
        $salesData = $this->db->get('trbil t')->result();
//        echo $this->db->last_query();
        $select = array(
            "round(sum(t.TRNET), 2) AS TOTALAMT"
        );

        $this->db->select($select);
        unset($where['branchcode']);
        $where['t.branch_code'] = $branchCode;
        $where['t.TRREF'] = "Y";
        $this->db->where($where);
        $this->db->join("trslret1 tb", "tb.TRBLNO1 = t.TRBLNO AND tb.branch_code = t.branch_code AND tb.fin_year = t.fin_year");
        $salesRetData = $this->db->get('trslret t')->row();

        $select = array(
            "round(sum(t.TRCN1AM) + sum(t.TRCN2AM), 2) AS ADJCN"
        );
        $where = array(
            'TRBLDT >=' => $fromDate,
            'TRBLDT <=' => $toDate,
            'branchcode' => $branchCode,
            'CANBL' => null
        );

        $this->db->select($select);
        $this->db->where($where);
        $this->db->join("trbil1 tb", "tb.TRBLNO1 = t.TRBLNO AND tb.branchcode1 = t.branchcode AND tb.fin_year1 = t.fin_year");
        $adjData = $this->db->get('trbil t')->row();
//        echo $this->db->last_query();
        $data = compact("salesData", "salesRetData", "adjData");
        echo json_encode($data);
        exit;
    }
}