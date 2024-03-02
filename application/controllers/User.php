<?php 
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Role_model');
    }
    /**
     * Index will return the view of user's list page
     *
     * @return view
     */
    public function index()
    {
        $users = $this->User_model->getData();
        $data = array();
        foreach($users as $key=> $user) {
            if(isset($user['role_id'])) {
                $users[$key]['role_id'] = $this->Role_model->getRoleNameByID($user['role_id'])['display_name'];
            }
        }

        $data['users'] = $users;
        $this->load->view('users/list', $data);
    }

    /**
     * create function will show create form as well as store the submitted data
     *
     * @return void
     */
    public function create()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        if ($this->form_validation->run() == false) {
            $roles = $this->Role_model->getData();
            $this->load->view('users/create', compact('roles'));
        } else {
            $formArray = $_POST;
            $result = $this->User_model->create($formArray);
            $email = $this->input->post('email');
            if ($result) {
                $this->emailForSetPassword($email, $result);
                $this->session->set_flashdata('success', 'Record inserted successfully!!');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong!');
            }
            redirect(base_url() . 'user/index');
        }
    }

    /**
     * Edit will show edit form with auto filled data
     *
     * @param [type] $userId
     * @return view
     */
    public function edit($userId)
    {
        $this->load->model('User_model');
        $user = $this->User_model->getDataByID($userId);
        $roles = $this->Role_model->getData();
        $data = array();
        $data ['user'] = $user;
        $data ['roles'] = $roles;

        $this->load->view('users/edit', $data);
    }

    /**
     * update will update the signle edited record
     *
     * @param [type] $userID
     * @return view
     */
    public function update($userID)
    {
        $this->load->model('User_model');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        $formData = array();
        $formArray = $_POST;
        $user = $this->User_model->getDataByID($userID);
        $data = array();
        $data ['user'] = $user;
        if ($this->form_validation->run() == false) {
            $this->load->view('users/edit', $data);
        } else {
            $res = $this->User_model->updateData($formArray, $userID);
            if ($res == true) {
                $this->session->set_flashdata('success', 'Record updated successfully!!');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong!');
            }
            redirect(base_url() . 'user/index');
        }
    }

    /**
     * Delete will delete the record
     *
     * @param [type] $userId
     * @return void
     */
    public function delete($userId)
    {
        $this->load->model('User_model');
        $res = $this->User_model->remove($userId);
        if ($res == true) {
            $this->session->set_flashdata('success', 'Record Deleted successfully!!');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong!');
        }
        redirect(base_url() . 'user/index');
    }

    /**
     * Email will shoot at the time of user registration
     *
     * @param string $to
     * @param integer $userId
     * @return void
     */
    public function emailForSetPassword($to = '', $userId=0)
    {
        $this->email->set_mailtype("html");
        $from = 'no-reply@myapp.com';
        $to = $to;

        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject('New email');
        $this->email->message('Click here for set password : '.base_url() . 'register/setUserPassword?uid='.$userId);

        if ($this->email->send()) {
            echo 'Email Sent successfully!';
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
                $this->load->model('User_model');
                $userData  = $this->User_model->getDataByID($data['user_id']);
                $userData['password_hash'] = $pwd;

                $result = $this->User_model->updateData($userData, $data['user_id']);
                if ($result) {
                    $this->session->set_flashdata('success', 'Password generated successfully!!');
                    redirect(base_url() . 'register/setUserPassword');
                } else {
                    $this->session->set_flashdata('failure', 'Something went wrong!');
                }
            }
        }
    }
}
?>