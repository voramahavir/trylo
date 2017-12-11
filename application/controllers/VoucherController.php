<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VoucherController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('SalesModel');
        }
    }

    public function index()
    {
        $data['page_title'] = 'Voucher List';
        $this->load->view('voucher/list', $data);
    }

    public function vouList()
    {
        $data['page_title'] = 'Voucher List';
        $this->load->view('voucher/list', $data);
    }

    public function get()
    {
        $this->load->model('VoucherModel');
        $this->VoucherModel->get();
    }

    public function delete($id = '')
    {
        $this->load->model('VoucherModel');
        $this->VoucherModel->deleteVoucher($id);
    }

    public function recover($id = '')
    {
        $this->load->model('VoucherModel');
        $this->VoucherModel->recoverVoucher($id);
    }

    public function add()
    {
        $this->load->model('VoucherModel');
        $data['page_title'] = 'Add Voucher';
        $data['currentBill'] = $this->VoucherModel->getCurrentBillNo();
        $this->load->view('voucher/add', $data);
    }

    public function create()
    {
        $this->load->model('VoucherModel');
        $this->VoucherModel->addVoucher();
    }

    public function edit($id)
    {
        $this->load->model('VoucherModel');
        $voucherData = $this->VoucherModel->getVoucher($id);
        $data['page_title'] = 'Edit Voucher';
        $data['voucherData'] = $voucherData;
        $this->load->view('voucher/edit', $data);
    }

    public function update()
    {
        $this->load->model('VoucherModel');
        $this->VoucherModel->updateVoucher();
    }
}
