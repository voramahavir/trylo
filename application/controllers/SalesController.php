<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('SalesModel');
        }
    }

    public function index()
    {
        $this->load->view('sales');
    }

    public function add()
    {
        $data['page_title'] = 'Sales Add';
        $currentBill = $this->SalesModel->getCurrentBillNo();
        $data['currentBill'] = $currentBill;
        $this->load->view('sales/sales_add', $data);
    }

    public function getItemInfo()
    {
        $this->load->model('MyModel');
        $this->MyModel->getItemInfo();
    }

    public function salesBill()
    {
        $data['page_title'] = 'Sales Bill';
        $this->load->view('sales/sales_bill', $data);
    }

    public function getSalesBills()
    {
        $this->load->model('SalesModel');
        $this->SalesModel->getSalesBills();
    }

    public function create()
    {
        $this->SalesModel->salesAdd();
    }

    public function printBill($billNo)
    {
        $data = $this->SalesModel->printSalesBill($billNo);
        $this->load->view('sales/sales_bill_print', $data);
    }

    public function getCardByMobile($mobileNo = NULL)
    {
        $mobileNo = ($mobileNo) ? $mobileNo : $_POST['mobileNo'];
        $this->SalesModel->getCardByMobile($mobileNo);
    }

    public function edit($billNo)
    {
        $data['page_title'] = "Edit Sales";
        $data['billNo'] = $billNo;
        $this->load->view("sales/sales_edit", $data);
    }

    public function getBillData($billNo)
    {
        $this->SalesModel->getSalesBill($billNo);
    }

    public function update()
    {
        $this->SalesModel->salesUpdate();
    }

}
