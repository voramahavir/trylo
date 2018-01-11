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
        $data['page_title'] = 'Loyalty Card Issue Entry';
        checkRight($data['page_title']);
        $this->load->view('loyaltycard/list', $data);
    }

    public function cardList()
    {
        $data['page_title'] = 'Loyalty Card Issue Entry';
        checkRight($data['page_title']);
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
        $data['page_title'] = 'Add Loyalty Card';
        checkRight($data['page_title']);
        $this->load->view('loyaltycard/add', $data);
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

    public function schemeList()
    {
        $data['page_title'] = 'Loyalty Card Setup';
        checkRight($data['page_title']);
        $this->load->view('loyaltycard/scheme_list', $data);
    }

    public function schemeAdd()
    {
        $data['page_title'] = 'Add Loyalty Card Scheme';
        checkRight($data['page_title']);
        $this->load->view('loyaltycard/scheme_add', $data);
    }

    public function schemeCreate()
    {
        $this->load->model('LoyaltyCardModel');
        $this->LoyaltyCardModel->schemeCreate();
    }

    public function schemeListCard()
    {
        $this->load->model('LoyaltyCardModel');
        $this->LoyaltyCardModel->schemeListCard();
    }
}
