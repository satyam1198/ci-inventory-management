<?php

class Role_model extends CI_Model
{
    public function getData()
    {
        $this->db->from('roles');
        $query = $this->db->order_by("name desc")->get()->result_array();
        return $query;
    }
    public function create($formData)
    {
        $formData = $this->prepareArray($formData);

        $this->db->insert('roles', $formData);
        return $this->db->insert_id();
    }

    public function getDataByID($roleId)
    {
        $this->db->where('id', $roleId);
        return $this->db->get('roles')->row_array();
    }

    public function getRoleNameByID($roleId)
    {
        $this->db->select('display_name');
        $this->db->where('id', $roleId);
        $this->db->from('roles');
        return $this->db->get()->row_array();
       
    }

    public function updateData($formData, $roleId)
    {
        $this->db->where('id', $roleId);

        $formData = $this->prepareArray($formData);
        $res = $this->db->update('roles', $formData);
        return $res;
    }

    public function remove($roleId)
    {
        $this->db->from('user_has_role');
        $userHasNotPermission = $this->db->where('role_id', $roleId)->get()->result_array();
        $this->db->from('role_has_permission');
        $roleHasNotPermission = $this->db->where('role_id', $roleId)->get()->result_array();

        if (empty($roleHasNotPermission) && empty($userHasNotPermission)) {
            $this->db->where('id', $roleId);
            $res = $this->db->delete('roles');
            return $res;
        } else {
            $this->session->set_flashdata('failure', 'This role is granted to user!');
            return redirect(base_url() . 'roles/index');
        }
    }

    public function prepareArray($formData)
    {
        $formArray = [];
        $now = new DateTime();

        $formArray['name'] = $formData['name'];
        $formArray['display_name'] = $formData['dis_name'];
        $formArray['created_at'] = $now->format('Y-m-d H:i:s');
        return $formArray;
    }
}
