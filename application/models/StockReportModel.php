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
        ini_set("memory_limit", "256M");
        $fromDate = $_POST['fromDate'];
        $toDate = $_POST['toDate'];
        $branchCode = $_POST['branchCode'];
        $whereStr = "";
        if (isset($_POST['prdGrp'])) {
            $whereStr .= " AND p.PRDCD = ''" . $_POST['prdGrp'] . "''";
        }
        if (isset($_POST['color'])) {
            $whereStr .= " AND i1.TRCOLOR = ''" . $_POST['color'] . "''";
        }
        if (isset($_POST['brand'])) {
            $whereStr .= " AND i.TRBRND = " . $_POST['brand'];
        }
        $query = "CALL GetStockReport('$fromDate','$toDate',$branchCode,'" . $whereStr . "')";
        $response = $this->GetMultipleQueryResult($query);
        $data = isset($response[0]) ? $response[0] : array();
        $salesData = isset($response[1]) ? $response[1] : array();
        $products = array_column($data, 'PRDCD');
        $products = array_unique($products);

        $brands = array_column($data, 'brandId');
        $brands = array_unique($brands);

        $sizeCnt = array_column($data, 'sizeCnt');
        $sizeCnt = array_unique($sizeCnt);

        $maxSizeCnt = ($sizeCnt) ? max($sizeCnt) : 0;

        $productsData = array();
        $brandsData = array();

        $mainData = array();
        $brandProductsData = array();
        $brandTotalData = array();
        $merged = false;
        foreach ($data as $row) {
            if (!isset($brandProductsData[$row['PRDCD']])) {
                $brandProductsData[$row['PRDCD']] = array();
            }
            if (!isset($brandProductsData[$row['PRDCD']][$row['brandId']])) {
                $brandProductsData[$row['PRDCD']][$row['brandId']] = array();
            }
            if (!isset($brandTotalData[$row['PRDCD']])) {
                $brandTotalData[$row['PRDCD']] = array();
            }
            if (!isset($brandTotalData[$row['PRDCD']][$row['brandId']])) {
                $brandTotalData[$row['PRDCD']][$row['brandId']] = array(
                    "brandTotal" => "<b class='brandTotal'>Brand Total</b>",
                    "color" => ""
                );
            }

            $sizes = explode(",", $row['sizes']);
            $_brandProData = array(
                "itemcode" => $row['TRITCD'],
                "itemName" => $row['TRITNM'],
                "color" => $row['TRCOLOR'],
            );
            $total = 0;
            $brandTotal = 0;
            $_brandTotData = array();
            foreach ($sizes as $size) {
                $_brandProData[$size] = 0;
                $_brandTotData[$size] = 0;
//                $brandTotalData[$row['PRDCD']][$row['brandId']][$size] = 0;
                if (isset($row[$size])) {
                    $_brandProData[$size] = $row[$size];
                    $_brandTotData[$size] = $row[$size];
                }
                $brandTotalData[$row['PRDCD']][$row['brandId']][$size] = isset($brandTotalData[$row['PRDCD']][$row['brandId']][$size]) ? $brandTotalData[$row['PRDCD']][$row['brandId']][$size] + $_brandTotData[$size] : $_brandTotData[$size];
                $total = $total + $_brandProData[$size];
                $brandTotal = $brandTotal + $brandTotalData[$row['PRDCD']][$row['brandId']][$size];
//                $brandTotalData[$row['PRDCD']][$row['brandId']]['total'] = isset($brandTotalData[$row['PRDCD']][$row['brandId']]['total']) ? $brandTotalData[$row['PRDCD']][$row['brandId']]['total'] + $_brandTotData[$size] : $_brandTotData[$size];
            }

//            echo "BT" . $brandTotal . "<hr>";
            $zeroArray = array_fill(count($sizes) - 1, $maxSizeCnt - count($sizes), 0);
            $_brandProData = array_merge($_brandProData, $zeroArray);
            if (!isset($brandTotalData[$row['PRDCD']][$row['brandId']]['merged'])) {
                $brandTotalData[$row['PRDCD']][$row['brandId']]['merged'] = true;
                $brandTotalData[$row['PRDCD']][$row['brandId']] = array_merge($brandTotalData[$row['PRDCD']][$row['brandId']], $zeroArray);
            }
            $brandTotalData[$row['PRDCD']][$row['brandId']]['rate'] = "";
            $brandTotalData[$row['PRDCD']][$row['brandId']]['total'] = $brandTotal;
            $_rateData = array(
                'rate' => $row['rate'],
                'total' => $total
            );

            $_brandProData = array_merge($_brandProData, $_rateData);

            array_push($brandProductsData[$row['PRDCD']][$row['brandId']], $_brandProData);
//            $brandTotalData[$row['PRDCD']][$row['brandId']] = array_merge($brandTotalData[$row['PRDCD']][$row['brandId']], $_brandTotData);
            /*$brandProductsData[$row['PRDCD']][$row['brandId']]['rate'] = $row['rate'];
            $brandProductsData[$row['PRDCD']][$row['brandId']]['total'] = 0;*/
//            $zeroArrayIndex = array_fill(count($sizes) - 1, $maxSizeCnt, 0);
//            $sizesArray = array_combine($sizes, $sizes);
            $sizesArray = array_values($sizes);
            if (!isset($brandsData[$row['PRDCD']])) {
                $brandsData[$row['PRDCD']] = array(
                    'prodName' => "<b class='grpHeader'>Group : " . $row['PRDNM'] . "</b>",
                    'brands' => array()
                );
            }
//            $brandsData[$row['PRDCD']] = array_merge($brandsData[$row['PRDCD']], $sizesArray);
            /*if (!isset($brandsData[$row['PRDCD']][$row['brandId']])) {
                $brandsData[$row['PRDCD']][$row['brandId']] = array();
            }*/
            $_brand = array(
                "<b class='brandHeader'>Brand : " . $row['brand'] . "</b>",
                ''
            );
            $_brand = array_merge($_brand, $sizesArray);
            $emptyData = array_fill(count($_brand), $maxSizeCnt - count($sizesArray) + 2, '');
            $_brand = array_merge($_brand, $emptyData);
            $brandsData[$row['PRDCD']]['brands'][$row['brandId']]['brandDetails'] = $_brand;
            $brandsData[$row['PRDCD']]['brands'][$row['brandId']]['prodDetails'] = $brandProductsData[$row['PRDCD']][$row['brandId']];
            $brandsData[$row['PRDCD']]['brands'][$row['brandId']]['total'] = $brandTotalData[$row['PRDCD']][$row['brandId']];
        }
        $tempdata = array();
        foreach ($salesData as $sales) {
            $PRDCD = $sales['PRDCD'];
            $brandId = $sales['TRBRND'];
            if (isset($brandsData[$PRDCD]['brands'][$brandId]['prodDetails'])) {
                $productDetails = $brandsData[$PRDCD]['brands'][$brandId]['prodDetails'];
                $itemsCodeArray = array_column($productDetails, 'itemcode');
                $productDetailsKey = array_search($sales['TRITCD'], $itemsCodeArray);

                if (isset($productDetails[$productDetailsKey]['itemcode']) && isset($productDetails[$productDetailsKey]['color'])) {

                    $itemCode = $productDetails[$productDetailsKey]['itemcode'];
                    $color = $productDetails[$productDetailsKey]['color'];
                    $size = $sales['TRSZ'];

                    if ($itemCode == $sales['TRITCD'] && $color == $sales['TRCLR'] && array_key_exists($size, $productDetails[$productDetailsKey])) {
                        $brandsData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey][$size] = $productDetails[$productDetailsKey][$size] - $sales['qty'];
                        $brandsData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey]['total'] = $productDetails[$productDetailsKey]['total'] - $sales['qty'];
                    }

                }
            }
        }
        foreach ($brandsData as $value) {
            $value = array_values($value);
            $_proData = $value[0];
            $emptyData = array_fill(1, $maxSizeCnt + 3, '');
            $_brand = array_merge($_brand, $emptyData);
            $proData = array(
                $_proData
            );
            $proData = array_merge($proData, $emptyData);
            array_push($mainData, $proData);
            foreach ($value[1] as $row) {
                if (isset($row['brandDetails']))
                    array_push($mainData, $row['brandDetails']);
                if (isset($row['prodDetails'])) {
                    array_map(function ($array) use (&$mainData) {
                        unset($array['itemcode']);
                        array_push($mainData, array_values($array));
                        return $array;
                    }, $row['prodDetails']);
                }
                if (isset($row['total'])) {
                    if (isset($row['total']['merged'])) {
                        unset($row['total']['merged']);
                    }
                    array_push($mainData, array_values($row['total']));
                }
            }

        }
        $filterData = compact('mainData', 'maxSizeCnt');
        echo json_encode($filterData);
        exit;
    }

    function filterData($data)
    {
        return array_filter($data, 'strlen');
    }
}