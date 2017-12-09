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
        $this->load->view('voucher');
    }

    public function list()
    {
        $data['page_title'] = 'Voucher List';
        $this->load->view('voucher/list', $data);
    }

    public function get()
    {
        $this->load->model('VoucherModel');
        $this->VoucherModel->get();
    }

    public function delete($id='')
    {
        $this->load->model('VoucherModel');
        $this->VoucherModel->deleteVoucher($id);
    }

    public function recover($id='')
    {
        $this->load->model('VoucherModel');
        $this->VoucherModel->recoverVoucher($id);
    }
}
