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
		echo "index";
		$data['page_title'] = 'Dashboard';
		$this->load->view('dashboard', $data);
	}

	public function branch($view) {
		$data['page_title'] = 'Branch List';
		switch ($view) {
			case 'list':
				echo "list";
				$this->load->view('userbranch/branch', $data);
				break;
			case 'get':
				$this->load->model('MyModel');
				$this->MyModel->getBranch();
				break;
			default:
				break;
		}
	}

	public function users($view) {
		$data['page_title'] = 'User List';
		switch ($view) {
			case 'list':
				$this->load->view('userbranch/user', $data);
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
