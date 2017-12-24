<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseOrderController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('PurchaseOrderModel');
        }
    }

    public function index()
    {
        $data['page_title'] = 'Purchase Order List';
        $this->load->view('purchaseorder/list', $data);
    }

    public function getData()
    {
        $this->PurchaseOrderModel->getData();
    }

    public function getParties()
    {
        $this->PurchaseOrderModel->getParties();
    }

    public function getProdGrp()
    {
        $this->PurchaseOrderModel->getProdGrp();
    }

    public function add()
    {
        $data['page_title'] = 'Purchase Order Add';
        $currentBill = $this->PurchaseOrderModel->getCurrentBillNo();
        $data['currentBill'] = $currentBill;
        $this->load->view('purchaseorder/add', $data);
    }

    public function create()
    {
        $this->PurchaseOrderModel->purchaseOrderAdd();
    }

    public function update()
    {
        $this->PurchaseOrderModel->updatePurchaseOrder();
    }

    public function delete($id = '')
    {
        $this->PurchaseOrderModel->deletePurchaseOrder($id);
    }

    public function recover($id = '')
    {
        $this->PurchaseOrderModel->recoverPurchaseOrder($id);
    }
}