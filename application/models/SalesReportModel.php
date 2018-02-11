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
            'branchcode' => $branchCode
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
            '"sales"                                                     AS GROUPS'
        );

        $where = array(
            'TRBLDT >=' => $fromDate,
            'TRBLDT <=' => $toDate,
            'branchcode' => $branchCode
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
}