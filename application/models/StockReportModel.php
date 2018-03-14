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
        ini_set("memory_limit", "512M");
        $fromDate = $_POST['fromDate'];
        $toDate = $_POST['toDate'];
        $rptType = $_POST['rptType'];
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
//        print_r($salesData);die;
        $products = array_column($data, 'PRDCD');
        $products = array_unique($products);

        $brands = array_column($data, 'brandId');
        $brands = array_unique($brands);

        $sizeCnt = array_column($data, 'sizeCnt');
        $sizeCnt = array_unique($sizeCnt);

        $maxSizeCnt = ($sizeCnt) ? max($sizeCnt) : 0;

        $productsData = array();
        $brandsData = array();
        $EmptyData = array();

        $mainData = array();

        $brandProductsData = array();
        $emptyProductsData = array();
        $brandTotalData = array();
        $emptyTotalData = array();
        $grpTotalData = array();
        $grpEmptyTotalData = array();
        $merged = false;
        $tempdata = array();
        foreach ($data as $row) {
            if (!isset($brandProductsData[$row['PRDCD']])) {
                $brandProductsData[$row['PRDCD']] = array();
                $emptyProductsData[$row['PRDCD']] = array();
            }
            if (!isset($brandProductsData[$row['PRDCD']][$row['brandId']])) {
                $brandProductsData[$row['PRDCD']][$row['brandId']] = array();
                $emptyProductsData[$row['PRDCD']][$row['brandId']] = array();
            }
            if (!isset($brandTotalData[$row['PRDCD']])) {
                $brandTotalData[$row['PRDCD']] = array();
                $emptyTotalData[$row['PRDCD']] = array();
                $grpTotalData[$row['PRDCD']] = array(
                    "grpTotal" => "<b class='grpTotal'>Group Total</b>",
                    "color" => ""
                );
                $grpEmptyTotalData[$row['PRDCD']] = array(
                    "grpTotal" => "<b class='grpTotal'>Group Total</b>",
                    "color" => ""
                );
            }

            if (!isset($brandTotalData[$row['PRDCD']][$row['brandId']])) {
                $brandTotalData[$row['PRDCD']][$row['brandId']] = array(
                    "brandTotal" => "<b class='brandTotal'>Brand Total</b>",
                    "color" => ""
                );
                $emptyTotalData[$row['PRDCD']][$row['brandId']] = array(
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
            $_emptyProData = array(
                "itemcode" => $row['TRITCD'],
                "itemName" => $row['TRITNM'],
                "color" => $row['TRCOLOR'],
            );
            $total = 0;
            $brandTotal = 0;
            $grpTotal = 0;
            $_brandTotData = array();
            $_emptyTotData = array();
            $_grpTotData = array();
            $_grpEmptyTotData = array();
            foreach ($sizes as $size) {
                $_brandProData["'$size'"] = 0;
                $_emptyProData["'$size'"] = 0;
                $_brandTotData["'$size'"] = 0;
                $_emptyTotData["'$size'"] = 0;
                $_grpTotData["'$size'"] = 0;
                $_grpEmptyTotData["'$size'"] = 0;
//                $brandTotalData[$row['PRDCD']][$row['brandId']]["'$size'"] = 0;
                if (isset($row[$size])) {
                    $_brandProData["'$size'"] = $row[$size];
                    $_brandTotData["'$size'"] = $row[$size];
                    $_grpTotData["'$size'"] = $row[$size];
                }
                $brandTotalData[$row['PRDCD']][$row['brandId']]["'$size'"] = isset($brandTotalData[$row['PRDCD']][$row['brandId']]["'$size'"]) ? $brandTotalData[$row['PRDCD']][$row['brandId']]["'$size'"] + $_brandTotData["'$size'"] : $_brandTotData["'$size'"];
                $emptyTotalData[$row['PRDCD']][$row['brandId']]["'$size'"] = $_emptyTotData["'$size'"];


                $total = $total + $_brandProData["'$size'"];
                $brandTotal = $brandTotal + $brandTotalData[$row['PRDCD']][$row['brandId']]["'$size'"];

                $grpTotalData[$row['PRDCD']]["'$size'"] = isset($grpTotalData[$row['PRDCD']]["'$size'"]) ? $grpTotalData[$row['PRDCD']]["'$size'"] + $_grpTotData["'$size'"] : $_grpTotData["'$size'"];
                $grpEmptyTotalData[$row['PRDCD']]["'$size'"] = $_grpEmptyTotData["'$size'"];

                $grpTotal = $grpTotal + $grpTotalData[$row['PRDCD']]["'$size'"];
//                $brandTotalData[$row['PRDCD']][$row['brandId']]['total'] = isset($brandTotalData[$row['PRDCD']][$row['brandId']]['total']) ? $brandTotalData[$row['PRDCD']][$row['brandId']]['total'] + $_brandTotData["'$size'"] : $_brandTotData["'$size'"];
            }
            if ($maxSizeCnt != count($sizes)) {

                $zeroArray = array_fill(count($sizes) - 1, $maxSizeCnt - count($sizes), 0);
                $_brandProData = array_merge($_brandProData, $zeroArray);
                $_emptyProData = array_merge($_emptyProData, $zeroArray);
                if (!isset($grpTotalData[$row['PRDCD']]['merged'])) {
                    $grpTotalData[$row['PRDCD']]['merged'] = true;
                    $grpTotalData[$row['PRDCD']] = array_merge($grpTotalData[$row['PRDCD']], $zeroArray);
                    $grpEmptyTotalData[$row['PRDCD']] = array_merge($grpEmptyTotalData[$row['PRDCD']], $zeroArray);
                }
                if (!isset($brandTotalData[$row['PRDCD']][$row['brandId']]['merged'])) {
                    $brandTotalData[$row['PRDCD']][$row['brandId']]['merged'] = true;
                    $brandTotalData[$row['PRDCD']][$row['brandId']] = array_merge($brandTotalData[$row['PRDCD']][$row['brandId']], $zeroArray);
                    $emptyTotalData[$row['PRDCD']][$row['brandId']] = array_merge($emptyTotalData[$row['PRDCD']][$row['brandId']], $zeroArray);
                }
            }
//            print_r($_emptyProData);die;

            $brandTotalData[$row['PRDCD']][$row['brandId']]['rate'] = "";
            $emptyTotalData[$row['PRDCD']][$row['brandId']]['rate'] = "";
            $brandTotalData[$row['PRDCD']][$row['brandId']]['total'] = $brandTotal;
            $emptyTotalData[$row['PRDCD']][$row['brandId']]['total'] = 0;

            $grpTotalData[$row['PRDCD']]['rate'] = "";
            $grpEmptyTotalData[$row['PRDCD']]['rate'] = "";
            $grpTotalData[$row['PRDCD']]['total'] = $grpTotal;
            $grpEmptyTotalData[$row['PRDCD']]['total'] = 0;
            $_rateData = array(
                'rate' => $row['rate'],
                'total' => $total
            );

            $_brandProData = array_merge($_brandProData, $_rateData);
            $_rateData['total'] = 0;
            $_emptyProData = array_merge($_emptyProData, $_rateData);

            array_push($brandProductsData[$row['PRDCD']][$row['brandId']], $_brandProData);
            array_push($emptyProductsData[$row['PRDCD']][$row['brandId']], $_emptyProData);
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
                $EmptyData[$row['PRDCD']] = array(
                    'prodName' => "<b class='grpHeader'>Group : " . $row['PRDNM'] . "</b>",
                    'brands' => array()
                );
            }
//            $EmptyData[$row['PRDCD']] = $brandsData[$row['PRDCD']];
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
            $EmptyData[$row['PRDCD']]['brands'][$row['brandId']]['brandDetails'] = $_brand;
            $brandsData[$row['PRDCD']]['brands'][$row['brandId']]['prodDetails'] = $brandProductsData[$row['PRDCD']][$row['brandId']];
            $EmptyData[$row['PRDCD']]['brands'][$row['brandId']]['prodDetails'] = $emptyProductsData[$row['PRDCD']][$row['brandId']];
            $brandsData[$row['PRDCD']]['brands'][$row['brandId']]['total'] = $brandTotalData[$row['PRDCD']][$row['brandId']];
            $EmptyData[$row['PRDCD']]['brands'][$row['brandId']]['total'] = $emptyTotalData[$row['PRDCD']][$row['brandId']];

            $brandsData[$row['PRDCD']]['grpTotal'] = $grpTotalData[$row['PRDCD']];
            $EmptyData[$row['PRDCD']]['grpTotal'] = $grpEmptyTotalData[$row['PRDCD']];
        }
        /*echo json_encode(compact('grpTotalData','brandTotalData','grpEmptyTotalData'));
        die;*/
        $calculatedData = $this->setReportData($brandsData, $salesData, $EmptyData);
        $brandsData = $calculatedData['brandsData'];
        $salesFinalData = $calculatedData['finalData'];

        if ($rptType == 2) {
            $brandsData = $salesFinalData;
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
            if (isset($value[2]['merged']))
                unset($value[2]['merged']);
            array_push($mainData, array_values($value[2]));
        }
        $filterData = compact('mainData', 'maxSizeCnt');
        echo json_encode($filterData);
        exit;
    }

    function filterData($data)
    {
        return array_filter($data, 'strlen');
    }

    function setReportData($brandsData = array(), $rptData = array(), $EmptyData = array(), $isPlus = false)
    {
        /*print_r($EmptyData);
        die;*/
        $finalData = array();
        foreach ($rptData as $data) {
            $PRDCD = $data['PRDCD'];
            $brandId = $data['TRBRND'];
            if (isset($brandsData[$PRDCD]['brands'][$brandId]['prodDetails'])) {
                $productDetails = $brandsData[$PRDCD]['brands'][$brandId]['prodDetails'];
                $totalDetails = $brandsData[$PRDCD]['brands'][$brandId]['total'];
                $emptyTotalDetails = $EmptyData[$PRDCD]['brands'][$brandId]['total'];
                $itemsCodeArray = array_column($productDetails, 'itemcode');
                $productDetailsKeys = array_keys($itemsCodeArray, $data['TRITCD']);
                if ($productDetailsKeys) {
                    foreach ($productDetailsKeys as $productDetailsKey) {
                        if (isset($productDetails[$productDetailsKey]['itemcode']) && isset($productDetails[$productDetailsKey]['color'])) {
                            $itemCode = $productDetails[$productDetailsKey]['itemcode'];
                            $color = $productDetails[$productDetailsKey]['color'];
                            $size = $data['TRSZ'];

                            /*print_r($productDetails[$productDetailsKey]);
                            echo "Pcode:" . $itemCode;
                            echo "Scode:" . $data['TRITCD'];
                            echo "Pcolor:" . $color;
                            echo "Scolor:" . $data['TRCLR'];
                            echo "Ssize:" . $size;
                            echo "Psize:" . array_key_exists("'$size'", $productDetails[$productDetailsKey]) ? $productDetails[$productDetailsKey]["'$size'"] : 'false';
                            echo "<hr>";*/
                            if ($itemCode == $data['TRITCD'] && $color == $data['TRCLR'] && array_key_exists("'$size'", $productDetails[$productDetailsKey])) {
//                                print_r($totalDetails);
                                if (!isset($finalData[$PRDCD])) {
                                    $finalData[$PRDCD] = array(
                                        'prodName' => $brandsData[$PRDCD]['prodName'],
                                        'brands' => array()
                                    );
                                }
                                if (!isset($finalData[$PRDCD]['brands'][$brandId])) {
                                    $finalData[$PRDCD]['brands'][$brandId] = array();
                                    $finalData[$PRDCD]['brands'][$brandId]['brandDetails'] = $EmptyData[$PRDCD]['brands'][$brandId]['brandDetails'];
                                    $finalData[$PRDCD]['brands'][$brandId]['prodDetails'] = array();
                                    $finalData[$PRDCD]['brands'][$brandId]['total'] = $emptyTotalDetails;
                                }
                                if (!isset($finalData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey])) {
                                    $finalData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey] = $EmptyData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey];
                                }
                                if (isset($finalData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey]['total'])) {
                                    unset($finalData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey]['total']);
                                }
                                $finalData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey]["'$size'"] = $data['qty'];
                                $finalData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey]['Total'] = isset($finalData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey]['Total']) ? $finalData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey]['Total'] + $data['qty'] : $data['qty'];


                                $finalData[$PRDCD]['brands'][$brandId]['total']["'$size'"] = $finalData[$PRDCD]['brands'][$brandId]['total']["'$size'"] + $data['qty'];
                                $finalData[$PRDCD]['brands'][$brandId]['total']['total'] = $finalData[$PRDCD]['brands'][$brandId]['total']['total'] + $data['qty'];

                                $brandsData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey]["'$size'"] = $isPlus ? $productDetails[$productDetailsKey]["'$size'"] + $data['qty'] : $productDetails[$productDetailsKey]["'$size'"] - $data['qty'];
                                $brandsData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey]['total'] = $isPlus ? $productDetails[$productDetailsKey]['total'] + $data['qty'] : $productDetails[$productDetailsKey]['total'] - $data['qty'];
                                $brandsData[$PRDCD]['brands'][$brandId]['total']["'$size'"] = $isPlus ? $totalDetails["'$size'"] + $data['qty'] : $totalDetails["'$size'"] - $data['qty'];
                                $brandsData[$PRDCD]['brands'][$brandId]['total']['total'] = $isPlus ? $totalDetails['total'] + $data['qty'] : $totalDetails['total'] - $data['qty'];

                                $brandsData[$PRDCD]['grpTotal']["'$size'"] = $isPlus ? $brandsData[$PRDCD]['grpTotal']["'$size'"] + $data['qty'] : $brandsData[$PRDCD]['grpTotal']["'$size'"] - $data['qty'];
                                $brandsData[$PRDCD]['grpTotal']['total'] = $isPlus ? $brandsData[$PRDCD]['grpTotal']['total'] + $data['qty'] : $brandsData[$PRDCD]['grpTotal']['total'] - $data['qty'];
//                                print_r($emptyTotalDetails);


//                        array_push($salesFinalData, $brandsData[$PRDCD]['brands'][$brandId]['prodDetails'][$productDetailsKey]);
                            }

                        }
                    }
                }
            }
        }
        return compact('brandsData', 'finalData');
    }
}