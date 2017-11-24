<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('PurchaseModel');
        }
    }

    public function index()
    {
        $this->load->view('purchase');
    }

    public function purList()
    {
        $data['page_title'] = 'Purchase List';
        $this->load->view('purchase/list', $data);
    }

    public function verifyList()
    {
        $data['page_title'] = 'Verify InTransit Bill';
        $this->load->view('purchase/verifiedlist', $data);
    }

    public function getData()
    {
        $this->PurchaseModel->getData();
    }

    public function verify($billNo)
    {
        $data['page_title'] = 'Sales Add';
        $billData['billNo'] = $billNo;
        $this->load->view('purchase/purchase_verify', $billData);
    }

    public function getInTrnsBill($billNo = null)
    {
        $billNo = ($billNo) ? $billNo : $_POST['billNo'];
        $billData = $this->PurchaseModel->getInTrnsBill($billNo);
        echo json_encode($billData);
    }

    public function verifyBill(){
        $this->PurchaseModel->verifyBill();
    }
}
