<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getBranch()
    {
        $search = array('value' => '');
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
        }
        if (isset($search['value'])) {
            $search = $search['value'];
        }
        $start = 0;
        if (isset($_POST['start'])) {
            $start = $_POST['start'];
        }
        $length = 10;
        if (isset($_POST['length'])) {
            $length = $_POST['length'];
        }
        $draw = 1;
        if (isset($_POST['draw'])) {
            $draw = $_POST['draw'];
        }

        $output = array("code" => 0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );
        if (!empty($search)) {
            $this->db->like("branch_name", $search);
        }
        $output['data'] = $this->db->select('branch_id, branch_name, is_active')->get('branch')->result();
        if (!empty($search)) {
            $this->db->like("branch_name", $search);
        }
        $output['recordsTotal'] = $this->db->get('branch')->num_rows();
        $output['recordsFiltered'] = $output['recordsTotal'];
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
        echo json_encode($output);
        exit;
    }

    public function getUsers()
    {
        $search = array('value' => '');
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
        }
        if (isset($search['value'])) {
            $search = $search['value'];
        }
        $start = 0;
        if (isset($_POST['start'])) {
            $start = $_POST['start'];
        }
        $length = 10;
        if (isset($_POST['length'])) {
            $length = $_POST['length'];
        }
        $draw = 1;
        if (isset($_POST['draw'])) {
            $draw = $_POST['draw'];
        }

        $output = array("code" => 0,
            'draw' => $draw,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'search' => $search
        );
        if (!empty($search)) {
            $this->db->like("user_name", $search);
        }
        if (getSessionData('role_id') != 1) {
            $this->db->where('branch_id', getSessionData('branch_id'));
        }
        $output['data'] = $this->db->select('user_id, user_name, is_active')
            ->where('role_id <>', 1)
            ->get('users')
            ->result();
        if (!empty($search)) {
            $this->db->like("user_name", $search);
        }
        $output['recordsTotal'] = $this->db->get('users')->num_rows();
        $output['recordsFiltered'] = $output['recordsTotal'];
        if (!empty($output['data'])) {
            $output['code'] = 1;
        }
        echo json_encode($output);
        exit;
    }

    public function getItemInfo()
    {
        $barcode = $this->input->get('barCode');
        $output = new stdClass();
        $msg = '';
        $code = 0;
        if (!empty($barcode)) {
            $code = 1;
            $this->db->select('t1.*, t.TRITNM, t.TRMRP1, t.TRPURT, t.TRDSPR, p.TRSGSTL, p.TRCGSTL, p.TRIGSTL, p.TRLOW, p.TRSGSTH, p.TRCGSTH, p.TRIGSTH');
            $this->db->join("tritem as t", "t.TRITCD = t1.TRITCD1");
            $this->db->join("trprgrp as p", "t.TRPRDGRP = p.PRDCD");
            $querry = $this->db->get_where('tritem1 as t1', array('BARCODF' => $barcode))->first_row();
            if (count($querry)) {
                $output = $querry;
            } else {
                $code = 0;
                $msg = 'Please Enter Valid Item BarCode.';
            }
        } else {
            $msg = 'Barcode required';
        }

        echo json_encode(array('code' => $code, 'data' => $output, 'message' => $msg));
        exit;
    }

    public function getForms()
    {
        $role_id = getSessionData('role_id');
        $where = "FIND_IN_SET('" . $role_id . "', role_id)";
        $this->db->where($where);
        $data = $this->db->get('forms')->result();
        echo json_encode($data);
        exit();
    }

    public function addBranch()
    {
        $code = 0;
        $msg = "Unable to save data";
        $branchData = $_POST['branchData'];
        $userData = $_POST['userData'];
        if (!$this->validBranchCode($branchData['branch_code'])) {
            $msg = "Branch Code must be unique. Please enter different Branch Code";
        } elseif (!$this->validUserName($userData['user_name'])) {
            $msg = "Username must be unique. Please Enter different Username";
        } else {
            if ($this->db->trans_begin()) {
                $this->db->insert("branch", $branchData);
                $lastId = $this->db->insert_id();
                $userData['branch_id'] = $lastId;
                $userData['password'] = md5($userData['password']);
                $userData['role_id'] = 2;
                $this->db->insert("users", $userData);
                $this->db->trans_complete();
                if ($this->db->trans_status()) {
                    $code = 1;
                    $msg = "Branch added successfully";
                }
            }
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

    public function deleteBranch($id)
    {
        $code = 0;
        $response = "";
        $this->db->where('branch_id', $id)->set(array(
            'is_active' => 0
        ))->update("branch");
        $code = 1;
        $response = "Branch deleted successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function recoverBranch($id)
    {
        $code = 0;
        $response = "";
        $this->db->where('branch_id', $id)->set(array(
            'is_active' => 1
        ))->update("branch");
        $code = 1;
        $response = "Branch recover successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function getBranchDetails($id = "")
    {
        $code = 0;
        $response = "";
        $data = [];
        if (!empty($id)) {
            $this->db->where('branch_id', $id);
            $data = $this->db->get('branch')->first_row();
            $code = 1;
        } else {
            $response = "Branch id is missing.";
        }
        echo json_encode(array("code" => $code, "response" => $response, "data" => $data));
        exit();
    }

    public function updateBranch($id = '')
    {
        $code = 0;
        $msg = "Unable to save data";
        $branchData = $_POST;
        if (!$this->validBranchCode($branchData['branch_code'], $id)) {
            $msg = "Branch Code must be unique. Please enter different Branch Code";
        } else {
            if ($this->db->trans_begin()) {
                $this->db->where('branch_id', $id);
                $this->db->update("branch", $branchData);
                $this->db->trans_complete();
                if ($this->db->trans_status()) {
                    $code = 1;
                    $msg = "Branch Updated successfully";
                }
            }
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit();
    }

    public function getBranches()
    {
        $code = 0;
        $msg = "Unable to get data";
        $this->db->where(array('is_active' => 1));
        $data = $this->db->get("branch")->result();
        if (count($data)) {
            $code = 1;
            $msg = "Data fetched successfully";
        }
        $response = compact("code", "msg", "data");
        echo json_encode($response);
    }

    public function saveSelectedBranch()
    {
        $branchData = $this->input->post('branchData');
        $code = 0;
        $msg = "Unable to set branch. Please try again";
        if ($branchData) {
            $sessionData = getSessionData();
            foreach ($branchData as $key => $value) {
                if (array_key_exists($key, $sessionData)) {
                    $sessionData[$key] = $value;
                }
            }
            $this->session->set_userdata(array('access' => $sessionData));
            if (getSessionData('branch_code')) {
                $code = 1;
                $msg = "Branch selected successfully";
            }
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

    public function addUser()
    {
        $code = 0;
        $msg = "Unable to add user";
        $userData = $_POST;
        $rolesData = array();
        if (isset($userData['roles'])) {
            $rolesData = $userData['roles'];
            unset($userData['roles']);
        }
        if ($userData) {
            if (!$this->validUserName($userData['user_name'])) {
                $msg = "Username must be unique. Please Enter different Username";
            } else {
                $userData['password'] = md5($userData['password']);
                $userData['role_id'] = isset($userData['role_id']) ? $userData['role_id'] : 3;
                if ($this->db->trans_begin()) {
                    $this->db->insert('users', $userData);
                    $last_id = $this->db->insert_id();
                    if (count($rolesData)) {
                        $forms = array();
                        foreach ($rolesData as $form_id) {
                            $forms[] = array(
                                'user_id' => $last_id,
                                'form_id' => $form_id
                            );
                        }
                        $this->db->insert_batch('assign_forms', $forms);
                    }
                    $this->db->trans_complete();
                    if ($this->db->trans_status()) {
                        $code = 1;
                        $msg = "User Added Successfully";
                    }
                }
            }
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

    public function validBranchCode($code, $id = 0)
    {
        $where = array(
            'branch_code' => $code
        );
        if ($id) {
            $where['branch_id != '] = $id;
        }
        $this->db->select('branch_code');
        $this->db->where($where);
        $this->db->limit(1);
        $data = $this->db->get('branch')->row();
        return ($data) ? false : true;
    }

    public function validUserName($userName, $id = 0)
    {
        $where = array(
            'user_name' => $userName
        );
        if ($id) {
            $where['user_id != '] = $id;
        }
        $this->db->select('user_name');
        $this->db->where($where);
        $this->db->limit(1);
        $data = $this->db->get('users')->row();
        return ($data) ? false : true;
    }

    public function getUser($id)
    {
        $code = 0;
        $msg = "Unable to get User details";
        $where = array(
            'users.user_id' => $id,
            'users.is_active' => 1
        );
        $this->db->select('users.user_id, user_name, users.role_id, users.branch_id,group_concat(a.form_id) as form_ids');
        $this->db->join("assign_forms a", "a.user_id = users.user_id");
        $this->db->where($where);
        $this->db->group_by('users.user_id');
        $this->db->limit(1);
        $data = $this->db->get('users')->row();
        if ($data) {
            $code = 1;
            $msg = "data fetched successfully";
        }
        $response = compact("code", "msg", "data");
        echo json_encode($response);
        exit;
    }

    public function updateUser()
    {
        $code = 0;
        $msg = "Unable to add user";
        $userData = $_POST;
        $id = $userData['user_id'];
        $rolesData = array();
        if (isset($userData['roles'])) {
            $rolesData = $userData['roles'];
            unset($userData['roles']);
        }
        if ($userData) {
            if (!$this->validUserName($userData['user_name'], $id)) {
                $msg = "Username must be unique. Please Enter different Username";
            } else {
                if (isset($userData['password'])) {
                    $userData['password'] = md5($userData['password']);
                } else {
                    unset($userData['password']);
                }
                $userData['role_id'] = isset($userData['role_id']) ? $userData['role_id'] : 3;
                if ($this->db->trans_begin()) {
                    $this->db->where('user_id', $id);
                    $this->db->update('users', $userData);
                    $last_id = $id;
                    if (count($rolesData)) {
                        $this->db->where('user_id', $id);
                        $this->db->delete('assign_forms');
                        $forms = array();
                        foreach ($rolesData as $form_id) {
                            $forms[] = array(
                                'user_id' => $last_id,
                                'form_id' => $form_id
                            );
                        }
                        $this->db->insert_batch('assign_forms', $forms);
                    }
                    $this->db->trans_complete();
                    if ($this->db->trans_status()) {
                        $code = 1;
                        $msg = "User Updated Successfully";
                    }
                }
            }
        }
        $response = compact("code", "msg");
        echo json_encode($response);
        exit;
    }

    public function deleteUser($id)
    {
        $code = 0;
        $response = "";
        $this->db->where('user_id', $id)->set(array(
            'is_active' => 0
        ))->update("users");
        $code = 1;
        $response = "User deleted successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }

    public function recoverUser($id)
    {
        $code = 0;
        $response = "";
        $this->db->where('user_id', $id)->set(array(
            'is_active' => 1
        ))->update("users");
        $code = 1;
        $response = "User recover successfully.";
        echo json_encode(array("code" => $code, "response" => $response));
        exit();
    }
}
