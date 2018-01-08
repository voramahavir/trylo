<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function verify()
    {
        $data = $this->input->post(array('user_name', 'password'));

        if (!isset($data['user_name']) || empty($data['user_name'])) {
            $output = array('code' => 0, 'message' => "Username missing");
        } else if (!isset($data['password']) || empty($data['password'])) {
            $output = array('code' => 0, 'message' => "Password missing");
        } else {
            $this->db->query('SET SESSION group_concat_max_len = 100000000;');
            $this->db->select('users.user_id, user_name, users.role_id, users.branch_id, branch.*,concat(
      \'[\',
      group_concat(concat(\'{\', \'"main_form_name":\', \'"\',
                          ifnull(mf.form_name,\'\'),
                          \'","main_active_tabs":\', \'"\',
                          ifnull(mf.active_tabs,f.active_tab),
                          \'","main_icon":\', \'"\',
                          ifnull(mf.icon,f.icon),
                          \'","form_name":\', \'"\',
                          f.form_name,
                          \'","icon":\', \'"\',
                          f.icon,
                          \'","redirect_url":\', \'"\',
                          f.redirect_url,
                          \'","view_mode":\', \'"\',
                          ifnull(mf.view_mode,f.view_mode),
                          \'","active_tabs":\', \'"\',
                          f.active_tab, \'"}\')), \']\') AS form_data');
            $this->db->join("branch", "branch.branch_id = users.branch_id", "LEFT");
            $this->db->join("assign_forms a", "a.user_id = users.user_id");
            $this->db->join("forms f", "a.form_id = f.form_id");
            $this->db->join("main_forms mf", "f.main_form_id = mf.id", "LEFT");
            $data['password'] = md5($data['password']);
            $data['users.is_active'] = 1;
            $this->db->limit(1);
            $res = $this->db->get_where('users', $data)->row_array();
            if ($res && isset($res['user_id'])) {
                $this->session->set_userdata(array('access' => $res));
                $_form_data = json_decode(getSessionData('form_data'));
                $this->form_data = array();
                array_map(function ($array) {
                    if ($array->main_form_name) {
                        if (isset($this->form_data[$array->main_form_name])) {
                            array_push($this->form_data[$array->main_form_name]['forms'], array(
                                'form_name' => $array->form_name,
                                'active_tabs' => $array->active_tabs,
                                'icon' => $array->icon,
                                'redirect_url' => $array->redirect_url,
                            ));
                        } else {
                            $this->form_data[$array->main_form_name] = array(
                                'main_active_tabs' => $array->main_active_tabs,
                                'main_icon' => $array->main_icon,
                                'view_mode' => $array->view_mode,
                                'forms' => array(
                                    array(
                                        'form_name' => $array->form_name,
                                        'active_tabs' => $array->active_tabs,
                                        'icon' => $array->icon,
                                        'redirect_url' => $array->redirect_url,
                                    )
                                )
                            );
                        }
                    } else {
                        array_push($this->form_data, array(
                            'main_active_tabs' => $array->main_active_tabs,
                            'main_icon' => $array->main_icon,
                            'view_mode' => $array->view_mode,
                            'forms' => array(
                                'form_name' => $array->form_name,
                                'active_tabs' => $array->active_tabs,
                                'icon' => $array->icon,
                                'redirect_url' => $array->redirect_url,
                            )
                        ));
                    }
                }, $_form_data);
                $_SESSION['access']['form_data'] = $this->form_data;
                $output = array('code' => 1, 'message' => "Login Successfully", 'data' => getSessionData('role_id'));
            } else {
                $output = array('code' => 0, 'message' => "Invalid Credentials");
            }
        }
        echo json_encode($output);
        exit;
    }

    public function setViewMode()
    {
        $viewMode = $_POST['view_mode'];
        $form_data = getSessionData('form_data');
        $redirect_url = "";
        foreach ($form_data as $data) {
            if ($data['view_mode'] == $viewMode) {
                if (isset($data['forms'][0])) {
                    $redirect_url = $data['forms'][0]['redirect_url'];
                } else {
                    $redirect_url = $data['forms']['redirect_url'];
                }
                break;
            }
        }
        $_SESSION['access']['view_mode'] = $viewMode;
        $_SESSION['access']['redirect_url'] = $redirect_url;
        echo json_encode(array('redirect_url' => $redirect_url));
        exit;
    }
}
