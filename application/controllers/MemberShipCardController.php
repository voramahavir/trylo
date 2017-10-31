<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberShipCardController extends CI_Controller {

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

	public function list(){
		$data['page_title'] = 'Membership Card Registration';
        $this->load->view('membershipcard/list', $data);
	}

	public function getMemberShipCardList(){
        $this->load->model('MemberShipCardModel');
        $this->MemberShipCardModel->getSalesBills();
	}
}
