<?php

class StockReportController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('StockReportModel');
        }
    }

    public function index()
    {
        $data['page_title'] = "Stock Report";
        $this->load->view("stock_report/stock_report", $data);
    }

    public function getProductGrps()
    {
        $this->StockReportModel->getProductGrps();
    }

    public function getColors()
    {
        $this->StockReportModel->getColors();
    }

    public function getCups()
    {
        $this->StockReportModel->getCups();
    }

    public function getBrands()
    {
        $this->StockReportModel->getBrands();
    }

    public function getStockData()
    {
        $this->StockReportModel->getStockData();
    }

}