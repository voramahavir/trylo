<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockController extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!access()) {
			logout();
		} else {
			$this->load->model('StockModel');
		}
	}

	public function index() {
		$this->load->view('sales');
	}

	public function add() {
		$data['page_title'] = 'Stock Add';
		$this->load->view('stock/stock_add', $data);
	}

	public function getItemInfo()
	{
		$this->load->model('MyModel');
		$this->MyModel->getItemInfo();
	}
}
