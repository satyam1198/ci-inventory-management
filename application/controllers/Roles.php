<?php

class Roles extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_model');
        $this->load->model('Permission_model');
        $this->load->model('Role_has_permission_model', 'role_has_permis');
    }
    public function index()
    {
        $roles = $this->Role_model->getData();
        $this->load->view('role/list', compact('roles'));
    }

    public function create()
    {
        $data = $this->input->post();

        if(empty($data)){
            $this->load->view('role/create');
        } else {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('dis_name', 'Display Name', 'required');

            if($this->form_validation->run() == false){
                $this->load->view('role/create');
            } else{
                 $res = $this->Role_model->create($data);
                 if($res){
                    $this->session->set_flashdata('success', 'Roles created successfully!!!');
                    return redirect(base_url() . 'roles/index');
                 }
            }
        }
    }

    public function edit($roleId)
    {
        $role = $this->Role_model->getDataByID($roleId);
        $permissions = $this->Permission_model->getData();
        $role_has_permission = $this->role_has_permis->getDataByID($roleId);
        
        foreach($permissions as $key=>$permission){
            foreach($role_has_permission as $role_has_permis){
                if($role_has_permis['permission_id'] == $permission['id']){
                    
                    $permissions[$key]['assigned_permission_id'] = $role_has_permis['permission_id'];
                }
            }
        }
        
        $this->load->view('role/edit', compact('role', 'permissions'));
    }

    public function update($roleID) {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('dis_name', 'Display Name', 'required');
        $formArray = $_POST;

        $role = $this->Role_model->getDataByID($roleID);
        if ($this->form_validation->run() == false) {
            $this->load->view('role/edit', compact('role'));
        } else {
            $res = $this->Role_model->updateData($formArray, $roleID);
            if ($res == true) {
                $role_has_perm = new Role_has_permission_model;
                $role_has_perm->create($formArray, $roleID);
                $this->session->set_flashdata('success', 'Roles updated successfully!!');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong!');
            }
            redirect(base_url() . 'roles/index');
        }
    }

    public function delete($roleId)
    {
        $res = $this->Role_model->remove($roleId);

        if ($res == true) {
            $this->session->set_flashdata('success', 'Record Deleted successfully!!');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong!');
        }
        redirect(base_url() . 'roles/index');
    }
}