<?php

class  Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    /**
     * Index load register view
     *
     * @return view
     */
    public function index()
    {
        return $this->load->view('register/register.php');
    }

    /**
     * Register for user's account
     *
     * @return view
     */
    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

        if ($this->form_validation->run() == false) {
            $this->load->view('register/register');
        } else {
            $formArray = $_POST;

            $result = $this->User_model->create($formArray);
            $email = $this->input->post('email');
            //$email = $this->input->post('id');
            if ($result) {
                $this->session->set_flashdata('success', 'User registered successfully!!');
                $this->emailForSetPassword($email, $result);
                return  $this->load->view('welcome_message');
                // redirect(base_url() . 'index.php/dashboard/index');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong!');
            }
        }
    }

    /**
     * Email will shoot at the time of user registration
     *
     * @param string $to
     * @param integer $userId
     * @return void
     */
    public function emailForSetPassword($to = '', $userId = 0)
    {
        $from = 'no-reply@myapp.com';
        $to = $to;
        $user = $this->User_model->getDataByID($userId);
        $pwd_token = '';
        if (!empty($user)) {
            $pwd_token  = $user['password_token'];
        }
        $mesg = $this->load->view('./template/mail-set-password', compact('pwd_token'), true);

        $config = array(
            'charset' => 'utf-8',
            'wordwrap' => true,

        );

        $this->email->initialize($config);

        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject('Set Password');
        $this->email->message($mesg);

        if ($this->email->send()) {
            $this->session->set_flashdata('success', 'Email Sent successfully!');
        } else {
            show_error($this->email->print_debugger());
        }
    }

    /**
     * Set password is functio to set password by user first time through email
     *
     * @return void
     */
    public function setUserPassword()
    {
        $data = $this->input->post();

        if (empty($data)) {
            return $this->load->view('setPassword');
        } else {
            $pwd = $data['password_hash'];
            $cnf_pwd = $data['conf_hash_password'];

            if ($pwd === $cnf_pwd) {
                $userData  = $this->User_model->getDataByPasswordToken($data['pwd_token']);

                $userData['password_hash'] = $pwd;
                $result = $this->User_model->updateData($userData, $userData['user_id']);

                if ($result) {
                    $this->session->set_flashdata('success', 'Password generated successfully!!');
                    return $this->load->view('welcome_message');
                } else {
                    $this->session->set_flashdata('failure', 'Something went wrong!');
                }
            } else {
                $this->session->set_flashdata('failure', "Password doesn't matched.");
            }
        }
    }
}
