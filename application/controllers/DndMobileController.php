<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DndMobileController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('DndMobileModel');
        }
    }

    public function index()
    {
        $this->load->view("dnd", $data);
    }

    public function list(){
		$this->load->view('dnd/list');
	}

	public function add() {
		$this->load->model('DndMobileModel');
		$this->DndMobileModel->add();
	}

	public function get() {
		$this->load->model('DndMobileModel');
		$this->DndMobileModel->get();
	}

	public function delete($id=""){
		$this->load->model('DndMobileModel');
		$this->DndMobileModel->deleteMobileNo($id);
	}

	public function recover($id=""){
		$this->load->model('DndMobileModel');
		$this->DndMobileModel->recoverMobileNo($id);
	}

	public function edit($id=""){
		$this->load->model('DndMobileModel');
		$this->DndMobileModel->updateMobileNo($id);
	}
}