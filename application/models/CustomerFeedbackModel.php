<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerFeedbackModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}