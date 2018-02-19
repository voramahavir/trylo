<?php

class StockReportModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getProductGrps()
    {
        $group = $this->db
            ->select('PRDNM as name,PRDCD as code')
            ->order_by("PRDNM")
            ->get('trprgrp')->result();
        echo json_encode($group);
        exit;
    }

    public function getColors()
    {
        $query = $this->db->query('select distinct TRCOLOR as color from tritem1 order by color');
        $color = $query->result_array();
        echo json_encode($color);
        exit;
    }

    public function getCups()
    {
        $query = $this->db->query('select distinct TRCUP as cup from tritem order by TRCUP');
        $cup = $query->result_array();
        echo json_encode($cup);
        exit;
    }

    public function getBrands()
    {
        $select = array(
            "TRCODE",
            "TRNAME",
            "CONCAT(TRAD1, ' ', TRAD2, ' ', TRAD3, ' ', TRCITY) AS address",
            "TRACGRP"
        );
        $this->db->select($select);
        $this->db->order_by("TRNAME", "ASC");
        $brands = $this->db->get("trac")->result();
        echo json_encode($brands);
        exit;
    }

    public function GetMultipleQueryResult($queryString)
    {
        if (empty($queryString)) {
            return false;
        }

        $index = 0;
        $ResultSet = array();

        /* execute multi query */
        if (mysqli_multi_query($this->db->conn_id, $queryString)) {
            do {
                if (false != $result = mysqli_store_result($this->db->conn_id)) {
                    $rowID = 0;
                    while ($row = $result->fetch_assoc()) {
                        $ResultSet[$index][$rowID] = $row;
                        $rowID++;
                    }
                }
                $index++;
            } while (mysqli_next_result($this->db->conn_id) && mysqli_more_results($this->db->conn_id));
        }

        return $ResultSet;
    }

    public function getStockData()
    {
        $query = "CALL GetStockReport('2018-02-01','2018-02-28')";
        $data = $this->GetMultipleQueryResult($query);
        echo json_encode($data);
        exit;
    }
}