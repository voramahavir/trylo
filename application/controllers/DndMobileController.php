<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DndMobileController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!access()) {
            logout();
        } else {
            $this->load->model('DndMobileModel');
        }
    }
}