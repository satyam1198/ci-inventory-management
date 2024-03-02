<?php

class ForgetPassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    /**
     * Forget function load the forget password page where user can enter email
     *
     * @return void
     */
    public function forget()
    {
        $data = $this->input->post();

        if (!empty($data)) {
            $this->emailForSetPassword($data['email']);
        } else {
            return $this->load->view('forget_pwd/forget');
        }
    }

    /**
     * Email will shoot after entering email for reset password
     *
     * @param string $to
     * @param integer $userId
     * @return void
     */
    public function emailForSetPassword($to = '')
    {
        $from = 'no-reply@myapp.com';
        $to_email = base64_encode($to);

        $mesg = $this->load->view('./template/mail-forget-pwd', compact('to_email'), true);
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
            return redirect(base_url().'login/login');
        } else {
            show_error($this->email->print_debugger());
        }
    }

    /**
     * Forget Password will allow to reset the users data based on the given Email
     *
     * @return void
     */
    public function forgetPassword()
    {
        $data = $this->input->post();

        if (empty($data)) {
            return $this->load->view('forget_pwd/forget_password');
        } else {
            $pwd = $data['password_hash'];
            $cnf_pwd = $data['conf_hash_password'];

            if ($pwd === $cnf_pwd) {
                $userData  = $this->User_model->getDataByEmail(base64_decode($data['email']));

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

?>