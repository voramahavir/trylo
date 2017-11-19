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

    public function list()
    {
        $data['page_title'] = 'Purchase List';
        $this->load->view('purchase/list', $data);
    }

    public function getData()
    {
        $this->PurchaseModel->getData();
    }
}
