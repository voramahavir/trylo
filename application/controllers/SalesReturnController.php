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
        $data['page_title'] = 'Sales Return List';
        checkRight($data['page_title']);
        $this->load->view('salesreturn/sales_return_list', $data);
    }

    public function add()
    {
        $data['page_title'] = 'Sales Return Add';
        checkRight($data['page_title']);
        $currentBill = $this->SalesReturnModel->getCurrentBillNo();
        $data['currentBill'] = $currentBill;
        $this->load->view('salesreturn/sales_return_add', $data);
    }

    public function getSalesReturns()
    {
        $this->SalesReturnModel->getSalesReturns();
    }

    public function validateBillNo()
    {
        $this->SalesReturnModel->validateBillNo();
    }

    public function create()
    {
        $this->SalesReturnModel->salesRetAdd();
    }
}
