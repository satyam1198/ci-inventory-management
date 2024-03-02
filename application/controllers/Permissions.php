<?php

class Permissions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Permission_model');
    }
    public function index()
    {
        $permissions = $this->Permission_model->getData();
        $this->load->view('permission/list', compact('permissions'));
    }

    public function create()
    {
        $data = $this->input->post();
        
        if(empty($data)){
            $this->load->view('permission/create');
        } else {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('description', 'Description Name', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('permission/create');
            } else {
                 $res = $this->Permission_model->create($data);
                 if ($res) {
                    $this->session->set_flashdata('success', 'Permission created successfully!!!');
                    return redirect(base_url() . 'permissions/index');
                 }
            }
        }
    }

    public function edit($permissionId)
    {
        $permission = $this->Permission_model->getDataByID($permissionId);
        $this->load->view('permission/edit', compact('permission'));
    }

    public function update($permissionID)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $formArray = $_POST;
        $permission = $this->Permission_model->getDataByID($permissionID);
        

        if ($this->form_validation->run() == false) {
            $this->load->view('permission/edit', compact('permission'));
        } else {
            $res = $this->Permission_model->updateData($formArray, $permissionID);
        
            if ($res == true) {
                $this->session->set_flashdata('success', 'Permission updated successfully!!');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong!');
            }
            redirect(base_url() . 'permissions/index');
        }
    }

    public function delete($permissionId)
    { 
        $res = $this->Permission_model->remove($permissionId);
        
        if ($res == true) {
            $this->session->set_flashdata('success', 'Permission Deleted successfully!!');
        } 
        redirect(base_url() . 'permissions/index');
    }
}