<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DenominationController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('DenominationModel');
        }
    }

    public function index()
    {
        $data['page_title'] = 'Denomination List';
        $this->load->view("denomination/list", $data);
    }

    public function add()
    {
        $data['page_title'] = 'Add Denomination';
        $data['currentBill'] = $this->DenominationModel->getCurrentBillNo();
        $this->load->view("denomination/add", $data);
    }

    public function get()
    {
        $this->DenominationModel->getData();
    }

    public function create()
    {
        $this->DenominationModel->addDenomination();
    }

    public function edit($id)
    {
        $denominationData = $this->DenominationModel->getDenomination($id);
        $data['page_title'] = 'Edit Denomination';
        $data['denominationData'] = $denominationData;
        $this->load->view('denomination/edit', $data);
    }

    public function update()
    {
        $this->DenominationModel->updateDenomination();
    }

    public function delete($id = '')
    {
        $this->DenominationModel->deleteDenomination($id);
    }

    public function recover($id = '')
    {
        $this->DenominationModel->recoverDenomination($id);
    }

    public function accs()
    {
        $this->DenominationModel->getAccs();
    }
}