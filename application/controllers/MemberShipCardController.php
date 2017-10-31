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
		$data['page_title'] = 'Dashboard';
		$this->load->view('dashboard', $data);
	}

	public function list(){
		$data['page_title'] = 'Membership Card Registration';
        $this->load->view('membershipcard/list', $data);
	}

	public function getMemberShipCardList(){
        $this->load->model('MemberShipCardModel');
        $this->MemberShipCardModel->getMemberShipCardList();
	}

	public function delete($id){
        $this->load->model('MemberShipCardModel');
        $this->MemberShipCardModel->delete($id);
	}

	public function recover($id){
        $this->load->model('MemberShipCardModel');
        $this->MemberShipCardModel->recover($id);
	}
}
