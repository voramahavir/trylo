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
        $this->load->view('luckydraw/list', $data);
    }

    public function luckyDrawList()
    {
        $data['page_title'] = 'Lucky Draw List';
        $this->load->view('luckydraw/list', $data);
    }

    public function get()
    {

    }

    public function add()
    {
        $data['page_title'] = 'Add Lucky Draw';
        $data['currentBill'] = $this->LuckydrawFeedbackModel->getCurrentBillNo();
        $this->load->view('luckydraw/add', $data);
    }

    public function create()
    {
        $this->LuckydrawFeedbackModel->addDraw();
    }
}