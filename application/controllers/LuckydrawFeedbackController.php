<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LuckydrawFeedbackController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('LuckydrawFeedbackModel');
        }
    }

    public function index()
    {
        $data['page_title'] = 'Lucky Draw List';
        checkRight($data['page_title']);
        $this->load->view('luckydraw/list', $data);
    }

    public function luckyDrawList()
    {
        $data['page_title'] = 'Lucky Draw List';
        checkRight($data['page_title']);
        $this->load->view('luckydraw/list', $data);
    }

    public function get()
    {
        $this->LuckydrawFeedbackModel->getData();
    }

    public function add()
    {
        $data['page_title'] = 'Add Lucky Draw';
        checkRight($data['page_title']);
        $data['currentBill'] = $this->LuckydrawFeedbackModel->getCurrentBillNo();
        $this->load->view('luckydraw/add', $data);
    }

    public function create()
    {
        $this->LuckydrawFeedbackModel->addDraw();
    }

    public function edit($id)
    {
        $luckyDrawData = $this->LuckydrawFeedbackModel->getLuckyDraw($id);
        $data['page_title'] = 'Edit Lucky Draw';
        checkRight($data['page_title']);
        $data['luckyDrawData'] = $luckyDrawData;
        $this->load->view('luckydraw/edit', $data);
    }

    public function update()
    {
        $this->LuckydrawFeedbackModel->updateLuckyDraw();
    }

    public function delete($id = '')
    {
        $this->LuckydrawFeedbackModel->deleteLuckydraw($id);
    }

    public function recover($id = '')
    {
        $this->LuckydrawFeedbackModel->recoverLuckydraw($id);
    }
}