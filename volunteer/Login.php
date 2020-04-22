<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        if (isset($this->session->userdata('quiz_volunteer')['user_id'])) {
            redirect(base_url('volunteer/Dashboard'));
        } else {
            $data['title'] = 'Volunteer | Login';
          
            $this->load->view('volunteer/login');
           
        }
    }
    public function check_login()
    {        
        if (isset($this->session->userdata('quiz_volunteer')['user_id'])) {
            redirect(base_url('volunteer/Dashboard'));
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($this->input->post('user') && !empty($this->input->post('password')))) {

                $login_data = array(
                    'user_id'   => strip_tags(trim($this->input->post('user'))),
                    'password' => bin2hex(strip_tags(trim($this->input->post('password')))),
                );
                $this->load->model('volunteer/Model_volunteer', 'mv');
                $result_data = $this->mv->check_login($login_data);
                if ($result_data) {
                    $this->session->set_userdata('quiz_volunteer', $result_data['0']);
                    redirect(base_url('volunteer/Dashboard'));
                } else {
                    redirect(base_url('volunteer/Login'));
                }
            }
        }
    }
    public function logout()
    {
        if (isset($this->session->userdata('quiz_volunteer')['user_id'])) {
            $this->session->unset_userdata('quiz_volunteer');
        } 
        redirect(base_url('volunteer/Login'));
    }
}
