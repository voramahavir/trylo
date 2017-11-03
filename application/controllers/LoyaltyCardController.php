<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoyaltyCardController extends CI_Controller
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
        $data['page_title'] = 'Dashboard';
        $this->load->view('dashboard', $data);
    }

    public function cardList()
    {
        $data['page_title'] = 'Loyalty Card Issue Entry';
        $this->load->view('loyaltycard/list', $data);
    }

    public function getLoyaltyCardList()
    {
        $this->load->model('LoyaltyCardModel');
        $this->LoyaltyCardModel->getLoyaltyCardList();
    }

    public function delete($id)
    {
        $this->load->model('LoyaltyCardModel');
        $this->LoyaltyCardModel->delete($id);
    }

    public function recover($id)
    {
        $this->load->model('LoyaltyCardModel');
        $this->LoyaltyCardModel->recover($id);
    }

    public function add()
    {
        $data['page_title'] = 'Add Membership Card';
        $this->load->view('membershipcard/add', $data);
    }

    public function create()
    {
        $this->load->model('LoyaltyCardModel');
        $this->LoyaltyCardModel->createCard();
    }

    public function details($cardNo = null)
    {
        $this->load->model('LoyaltyCardModel');
        $cardNo = ($cardNo) ? $cardNo : $_POST['cardNo'];
        $this->LoyaltyCardModel->getDataByCardNo($cardNo);
    }
}
