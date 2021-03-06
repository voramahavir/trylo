<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (access()) {
            redirect(site_url('dashboard'));
        }
        $this->load->view('login');
    }

    public function verify()
    {
        $this->load->model('LoginModel');
        $this->LoginModel->verify();
    }

    public function logout()
    {
        logout();
    }

    public function setViewMode()
    {
        $this->load->model('LoginModel');
        $this->LoginModel->setViewMode();
    }

    public function getAllBranches()
    {
        $this->load->model('MyModel');
        $this->MyModel->getBranches();
    }

    public function saveBranch()
    {
        $this->load->model('MyModel');
        $this->MyModel->saveSelectedBranch();
    }
}
