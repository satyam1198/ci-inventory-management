<?php

class Login extends CI_Controller
{
    /**
     * Login will allow user to logged in
     *
     * @return void
     */
    public function login()
    {
        $this->load->model('User_model');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $formData = $_POST;
        if ($this->form_validation->run() == false) {
            $this->load->view('welcome_message');
        } else {
            $result = $this->User_model->ifUserExist($formData);

            if ($result || $result > 0) {
                $newdata = array(
                    'user_id' => $result['user_id'],
                    'user_name' => $result['name'],
                    'user_email' => $result['email'],
                    'logged_in' => true,
                );
                $this -> session -> set_userdata($newdata);
                return redirect(base_url() . 'dashboard/index');
            } else {
                $this->session->set_flashdata('failure', 'Username or Password is incorrect!!!');
                return redirect(base_url() . 'login/login');
            }
            return false;
        }
    }
}
