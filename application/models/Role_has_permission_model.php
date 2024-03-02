<?php

class Role_has_permission_model extends CI_Model
{
    public function getData()
    {
        $this->db->from('role_has_permission');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function create($formData, $roleId)
    { 
        unset($formData['name']);
        unset($formData['dis_name']);
        $this->db-> trans_begin();
        $res = $this->remove($roleId);
            foreach($formData as $key => $data) {
                //$ifRoleHasPerm = $this->ifRoleHasPermission($roleId, $data);
                if($res) {
                    $formData = $this->prepareArray($data, $roleId);
                    $this->db->insert('role_has_permission', $formData);
                }
            }
        $this->db->trans_complete ();
    }

    public function getDataByID($roleId)
    {
        $this->db->where('role_id', $roleId);
        return $this->db->get('role_has_permission')->result_array();
    }

    public function updateData($formData, $roleId)
    {
        $this->db->where('id', $roleId);

        $formData = $this->prepareArray($formData);
        $res = $this->db->update('role_has_permission', $formData);
        return $res;
    }

    public function remove($roleId)
    {
        $this->db->where('role_id', $roleId);
        $res = $this->db->delete('role_has_permission');
        return $res;
    }

    public function ifRoleHasPermission($roleId, $permission_id)
    {
        $this->db->select('*'); // You can select specific columns you need
        $this->db->from('role_has_permission'); // Replace 'your_permission_table' with your actual table name
        $this->db->where('role_id', $roleId);
        $this->db->where('permission_id', $permission_id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            // Role has the permission
            return true;
        } else {
            // Role doesn't have the permission
            return false;
        }
    }

    public function prepareArray($permission_id, $role_id)
    {
        $formArray = [];

        $formArray['role_id'] =  $role_id;
        $formArray['permission_id'] = $permission_id;
        return $formArray;
    }

    public function getPermissionByRoleId($roleId)
    {
        $this->db->select( 'permission_id');
        $this->db->where('role_id', $roleId);
        $permissions = $this->db->get('role_has_permission')->result_array();

        $this->load->model('Permission_model');
        foreach($permissions as $key => $permission){ 
            $permissions[$key] = $this->Permission_model->getPemissionById($permission['permission_id']);
        }

        return $permissions;
    }
}
