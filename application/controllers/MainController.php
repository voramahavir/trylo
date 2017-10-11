<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!access()) {
			logout();
		}
	}

	public function index() {
		$data['page_title'] = 'Dashboard';
		$this->load->view('dashboard', $data);
	}

	public function branch($view) {
		$data['page_title'] = 'Branch';
		switch ($view) {
			case 'list':
				$this->load->view('branch', $data);
				break;
			case 'get':
				$this->load->model('MyModel');
				$this->MyModel->getBranch();
				break;
			default:
				break;
		}
	}

	public function user($view) {
		$data['page_title'] = 'Branch';
		switch ($view) {
			case 'list':
				$this->load->view('user', $data);
				break;
			case 'get':
				$this->load->model('MyModel');
				$this->MyModel->getUsers();
				break;
			default:
				break;
		}
	}
}
