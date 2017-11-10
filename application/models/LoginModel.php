<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function verify() {
		$data = $this->input->post(array('user_name', 'password'));

		if (!isset($data['user_name']) || empty($data['user_name'])) {
			$output = array('code' => 0, 'message' => "Username missing");
		} else if (!isset($data['password']) || empty($data['password'])) {
			$output = array('code' => 0, 'message' => "Password missing");
		} else {
			$this->db->select('user_id, user_name, branch.*');
			$this->db->join("branch", "branch.branch_id = users.branch_id");
			$data['password'] = md5($data['password']);
			$data['users.is_active'] = 1;
			$res = $this->db->get_where('users', $data)->result_array();
			if (count($res)) {
				$this->session->set_userdata(array('access' => $res[0]));
				$output = array('code' => 1, 'message' => "Login Successfully");
			} else {
				$output = array('code' => 0, 'message' => "Invalid Credentials");
			}
		}
		echo json_encode($output);
		exit;
	}
}
