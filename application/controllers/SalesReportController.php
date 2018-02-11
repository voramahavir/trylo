<?php

class SalesReportController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('SalesReportModel');
        }
    }

    public function index()
    {
        $data['page_title'] = "Sales Register";
        $this->load->view("sales_report/sales_register", $data);
    }

    public function getDateWiseRpt()
    {
        $this->SalesReportModel->getDateWiseRpt();
    }

    public function getSalesRetRpt()
    {
        $this->SalesReportModel->getSalesRetRpt();
    }
}