<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesReturnController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('SalesReturnModel');
        }
    }

    public function index()
    {
        $this->load->view('salesreturn');
    }

    public function add()
    {
        $this->load->model('SalesModel');
        $data['page_title'] = 'Sales Return Add';
        $currentBill = $this->SalesReturnModel->getCurrentBillNo();
        $data['currentBill'] = $currentBill;
        $this->load->view('salesreturn/sales_return_add', $data);
    }

    public function salesreturnList()
    {
        $data['page_title'] = 'Sales Return List';
        $this->load->view('salesreturn/sales_return_list', $data);
    }

    public function getSalesReturns()
    {
        $this->SalesReturnModel->getSalesReturns();
    }

    public function validateBillNo()
    {
        $this->SalesReturnModel->validateBillNo();
    }
}
