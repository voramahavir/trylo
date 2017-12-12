<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerFeedbackController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('CustomerFeedbackModel');
        }
    }

    public function index()
    {
        $data['page_title'] = 'Customer Experience List';
        $this->load->view('custfeedback/list', $data);
    }

    public function custFeedbackList()
    {
        $data['page_title'] = 'Customer Experience List';
        $this->load->view('custfeedback/list', $data);
    }

    public function get()
    {
        $this->CustomerFeedbackModel->getData();
    }

    public function add()
    {
        $data['page_title'] = 'Add Customer Experience';
        $data['currentBill'] = $this->CustomerFeedbackModel->getCurrentBillNo();
        $this->load->view('custfeedback/add', $data);
    }

    public function create()
    {
        $this->CustomerFeedbackModel->addCustFeedback();
    }

    public function edit($id)
    {
        $custFeedbackData = $this->CustomerFeedbackModel->getCustFeedback($id);
        $data['page_title'] = 'Edit Customer Experience';
        $data['custFeedbackData'] = $custFeedbackData;
        $this->load->view('custfeedback/edit', $data);
    }

    public function update()
    {
        $this->CustomerFeedbackModel->updateCustFeedback();
    }

    public function delete($id = '')
    {
        $this->CustomerFeedbackModel->deleteCustFeedback($id);
    }

    public function recover($id = '')
    {
        $this->CustomerFeedbackModel->recoverCustFeedback($id);
    }
}