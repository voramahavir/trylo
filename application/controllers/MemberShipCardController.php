<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberShipCardController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('MemberShipCardModel');
        }
    }

    public function index()
    {
        echo "index";
        $data['page_title'] = 'Dashboard';
        $this->load->view('dashboard', $data);
    }

    public function list()
    {
        $data['page_title'] = 'Membership Card Registration';
        $this->load->view('membershipcard/list', $data);
    }

    public function getMemberShipCardList()
    {
        $this->load->model('MemberShipCardModel');
        $this->MemberShipCardModel->getSalesBills();
    }

    public function add()
    {
        $data['page_title'] = 'Add Membership Card';
        $this->load->view('membershipcard/add', $data);
    }

    public function create()
    {
        $this->MemberShipCardModel->createCard();
    }

    public function details($cardNo = null){
        $cardNo = ($cardNo) ? $cardNo : $_POST['cardNo'];
        $this->MemberShipCardModel->getDataByCardNo($cardNo);
    }
}
