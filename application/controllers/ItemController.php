<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemController extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!access()) {
			logout();
		} else {
			$this->load->model('ItemModel');
		}
	}

	public function index() {
		$this->load->view('item');
	}

	public function searchIem() {
		$data['page_title'] = 'Search Item';
		$this->load->view('item/search_item', $data);
	}

	public function getItems(){
		$this->load->model('ItemModel');
		$this->ItemModel->getItems();
	}
}
