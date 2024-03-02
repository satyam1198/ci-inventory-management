<?php

class Image_upload_model extends CI_Model
{
    public function getData()
    {
        $this->db->from('image_upload');
        $query = $this->db->order_by("creation_timestamp desc")->get()->result_array();
        return $query;
    }
    public function create($formData)
    {
        $formData = $this->prepareArray($formData);
        $this->db->insert('image_upload', $formData);
        return $this->db->insert_id();
    }

    public function getDataByID($userId)
    {
        $this->db->where('id', $userId);
        return $this->db->get('image_upload')->row_array();
    }

    public function updateData($formData, $userId)
    {
        $this->db->where('user_id', $userId);

        $formData = $this->prepareArray($formData);
        $res = $this->db->update('image_upload', $formData);
        return $res;
    }

    public function remove($userId)
    {
        $isSuperAdmin = $this->isSuperAdmin($userId);
        $current_usr_id = $this->session->userData('user_id');

        if (!$isSuperAdmin && ($current_usr_id != $userId)) {
            $this->db->where('user_id', $userId);
            $res = $this->db->delete('image_upload');
            return $res;
        } else {
            return false;
        }
    }

    public function prepareArray($formData) {
        $formArray = [];
        $formArray['product_id'] = $formData['product_id'];
        $formArray['image_url'] = $formData['image_url'];

        return $formArray;
    }
}