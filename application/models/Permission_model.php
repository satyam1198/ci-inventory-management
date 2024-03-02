<?php

class Permission_model extends CI_Model
{
    public function getData()
    {
        $this->db->from('permissions');
        $query = $this->db->order_by("name desc")->get()->result_array();
        return $query;
    }
    public function create($formData)
    {
        $formData = $this->prepareArray($formData);

        $this->db->insert('permissions', $formData);
        return $this->db->insert_id();
    }

    public function getDataByID($permissionId)
    {
        $this->db->where('id', $permissionId);
        return $this->db->get('permissions')->row_array();
    }

    public function updateData($formData, $permissionId)
    {
        $this->db->where('id', $permissionId);

        $formData = $this->prepareArray($formData);
        $res = $this->db->update('permissions', $formData);
        return $res;
    }

    public function remove($permissionId)
    {
        $this->db->from('role_has_permission');
        $roleHasNotPermission = $this->db->where('permission_id', $permissionId)->get()->result_array();
        $this->db->from('user_has_permission');
        $userHasNotPermission = $this->db->where('permission_id', $permissionId)->get()->result_array();
        if (empty($roleHasNotPermission) && empty($userHasNotPermission)) {
            $this->db->where('id', $permissionId);
            $res = $this->db->delete('permissions');
            return $res;
        } else {
            $this->session->set_flashdata('failure', 'Looks this permission is granted to any user!');
            return redirect(base_url() . 'permissions/index');
        }
    }

    public function prepareArray($formData)
    {
        $formArray = [];
        $now = new DateTime();

        $formArray['name'] = $formData['name'];
        $formArray['description'] = $formData['description'];
        $formArray['created_at'] = $now->format('Y-m-d H:i:s');
        return $formArray;
    }

    public function ifPermissionNotAssigned()
    {
        $this->load->model('Role_has_permission_model');
        $this->load->model('User_has_permission_model');
    }

    public function getPemissionById($permissionId)
    {
        $this->db->select('name');
        $this->db->where('id', $permissionId);
        $permission = $this->db->get('permissions')->row();
        return $permission->name;
        
    }

    public function getSelectedData($columnName)
    {
        $this->db->select($columnName);
        $query = $this->db->order_by("name desc");
        $permissions = $query->get('permissions')->result_array();
        
        foreach($permissions as $key => $permission){
            $permissions[$key] = $permission['name'];
        }

        return $permissions;
    }
}
