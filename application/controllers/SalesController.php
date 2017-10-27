<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesController extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!access()) {
			logout();
		} else {
			$this->load->model('SalesModel');
		}
	}

	public function index() {
		$this->load->view('sales');
	}

	public function add() {
		$data['page_title'] = 'Sales Add';
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

    public function getSalesBills(){
    	$this->load->model('SalesModel');
		$this->SalesModel->getSalesBills();
    }
}
