<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberShipCardController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        }
    }

    public function index()
    {
        $data['page_title'] = 'Membership Card Registration';
        checkRight($data['page_title']);
        $this->load->view('membershipcard/list', $data);
    }

    public function cardList()
    {
        $data['page_title'] = 'Membership Card Registration';
        checkRight($data['page_title']);
        $this->load->view('membershipcard/list', $data);
    }

    public function getMemberShipCardList()
    {
        $this->load->model('MemberShipCardModel');
        $this->MemberShipCardModel->getMemberShipCardList();
    }

    public function delete($id)
    {
        $this->load->model('MemberShipCardModel');
        $this->MemberShipCardModel->delete($id);
    }

    public function recover($id)
    {
        $this->load->model('MemberShipCardModel');
        $this->MemberShipCardModel->recover($id);
    }

    public function add()
    {
        $data['page_title'] = 'Add Membership Card';
        checkRight($data['page_title']);
        $this->load->view('membershipcard/add', $data);
    }

    public function create()
    {
        $this->load->model('MemberShipCardModel');
        $this->MemberShipCardModel->createCard();
    }

    public function details($cardNo = null)
    {
        $this->load->model('MemberShipCardModel');
        $cardNo = ($cardNo) ? $cardNo : $_POST['cardNo'];
        $this->MemberShipCardModel->getDataByCardNo($cardNo);
    }
}
