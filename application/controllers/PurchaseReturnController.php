<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseReturnController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('PurchaseReturnModel');
        }
    }

    public function index()
    {
        $data['page_title'] = 'Purchase Return List';
        $this->load->view('purchasereturn/list', $data);
    }

    public function add()
    {
        $data['page_title'] = 'Purchase Return Add';
        $currentBill = $this->PurchaseReturnModel->getCurrentBillNo();
        $data['currentBill'] = $currentBill;
        $this->load->view('purchasereturn/add', $data);
    }

    public function getParties()
    {
        $this->PurchaseReturnModel->getParties();
    }
}