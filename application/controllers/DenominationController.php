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
        $this->load->view("denomination/add", $data);
    }
}