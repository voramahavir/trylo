<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('StockModel');
        }
    }

    public function index()
    {
        $data['page_title'] = 'Stock List';
        checkRight($data['page_title']);
        $this->load->view('stock/stock_list', $data);
    }

    public function getData()
    {
        $this->StockModel->getData();
    }

    public function add()
    {
        $data['page_title'] = 'Stock Add';
        checkRight($data['page_title']);
        $currentBill = $this->StockModel->getCurrentBillNo();
        $data['currentBill'] = $currentBill;
        $this->load->view('stock/stock_add', $data);
    }

    public function getItemInfo()
    {
        $this->load->model('MyModel');
        $this->MyModel->getItemInfo();
    }

    public function create()
    {
        $this->StockModel->stockAdd();
    }

    public function update()
    {
        $this->StockModel->updatePurchaseOrder();
    }

    public function delete($id = '')
    {
        $this->StockModel->deleteStock($id);
    }

    public function recover($id = '')
    {
        $this->StockModel->recoverStock($id);
    }
}
