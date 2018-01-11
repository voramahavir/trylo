<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller
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
        checkRight($data['page_title']);
        $this->load->view('dashboard', $data);
    }

    public function branch($view, $id = '')
    {
        $data['page_title'] = 'Branch List';
        $data['id'] = $id;
        switch ($view) {
            case 'list':
                checkRight($data['page_title']);
                $this->load->view('userbranch/branch', $data);
                break;
            case 'add':
                $data['page_title'] = 'Add Branch';
                checkRight($data['page_title']);
                $this->load->view('userbranch/branchadd', $data);
                break;
            case 'edit':
                $data['page_title'] = 'Edit Branch';
                checkRight($data['page_title']);
                $this->load->view('userbranch/branchedit', $data);
                break;
            case 'get':
                $this->load->model('MyModel');
                $this->MyModel->getBranch();
                break;
            case 'adddata':
                $this->load->model('MyModel');
                $this->MyModel->addBranch();
                break;
            case 'delete':
                $this->load->model('MyModel');
                $this->MyModel->deleteBranch($id);
                break;
            case 'recover':
                $this->load->model('MyModel');
                $this->MyModel->recoverBranch($id);
                break;
            case 'branchDetails':
                $this->load->model('MyModel');
                $this->MyModel->getBranchDetails($id);
                break;
            case 'updatedata':
                $this->load->model('MyModel');
                $this->MyModel->updateBranch($id);
                break;
            case 'getAll':
                $this->load->model('MyModel');
                $this->MyModel->getBranches();
                break;
            case 'saveBranch':
                $this->load->model('MyModel');
                $this->MyModel->saveSelectedBranch();
                break;
            default:
                break;
        }
    }

    public function users($view, $id = '')
    {
        $data['page_title'] = 'User List';
        switch ($view) {
            case 'list':
                checkRight($data['page_title']);
                $this->load->view('userbranch/user', $data);
                break;
            case 'get':
                $this->load->model('MyModel');
                $this->MyModel->getUsers();
                break;
            case 'forms':
                $this->load->model('MyModel');
                $this->MyModel->getForms();
                break;
            case 'add':
                $data['page_title'] = 'Add User';
                checkRight($data['page_title']);
                $this->load->view('userbranch/user_add', $data);
                break;
            case 'create':
                $this->load->model('MyModel');
                $this->MyModel->addUser();
                break;
            case 'edit':
                $data['page_title'] = 'Edit User';
                checkRight($data['page_title']);
                $data['id'] = $id;
                $this->load->view('userbranch/user_edit', $data);
                break;
            case 'getUser':
                $this->load->model('MyModel');
                $this->MyModel->getUser($id);
                break;
            case 'update':
                $this->load->model('MyModel');
                $this->MyModel->updateUser();
                break;
            case 'delete':
                $this->load->model('MyModel');
                $this->MyModel->deleteUser($id);
                break;
            case 'recover':
                $this->load->model('MyModel');
                $this->MyModel->recoverUser($id);
                break;
            default:
                break;
        }
    }
}
