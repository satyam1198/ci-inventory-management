<?php

class User_has_permission_model extends CI_Model
{
    public function getData()
    {
        $this->db->from('user_has_permission');
        $query = $this->db->order_by("name desc")->get()->result_array();
        return $query;
    }
    public function create($formData)
    {
        $formData = $this->prepareArray($formData);

        $this->db->insert('user_has_permission', $formData);
        return $this->db->insert_id();
    }

    public function getDataByID($roleId)
    {
        $this->db->where('id', $roleId);
        return $this->db->get('user_has_permission')->row_array();
    }

    public function updateData($formData, $roleId)
    {
        $this->db->where('id', $roleId);

        $formData = $this->prepareArray($formData);
        $res = $this->db->update('user_has_permission', $formData);
        return $res;
    }

    public function remove($roleId)
    {
        $this->db->where('role_id', $roleId);
        $res = $this->db->delete('user_has_permission');
        return $res;
    }

    public function prepareArray($formData) {
        $formArray = [];
        $now = new DateTime();

        $formArray['name'] = $formData['name'];
        $formArray['display_name'] = $formData['dis_name'];
        $formArray['created_at'] = $now->format('Y-m-d H:i:s');
        return $formArray;
    }

}
