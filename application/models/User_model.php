<?php

class User_model extends CI_Model
{
    public function getData()
    {
        $this->db->from('users');
        $query = $this->db->order_by("creation_timestamp desc")->get()->result_array();
        return $query;
    }
    public function create($formData)
    {
        $formData = $this->prepareArray($formData);
        $this->db->insert('users', $formData);
        return $this->db->insert_id();
    }

    public function getDataByID($userId)
    {
        $this->db->where('user_id', $userId);
        return $this->db->get('users')->row_array();
    }

    public function updateData($formData, $userId)
    {
        $this->db->where('user_id', $userId);

        $formData = $this->prepareArray($formData);
        $res = $this->db->update('users', $formData);
        return $res;
    }

    public function remove($userId)
    {
        $isSuperAdmin = $this->isSuperAdmin($userId);
        $current_usr_id = $this->session->userData('user_id');

        if (!$isSuperAdmin && ($current_usr_id != $userId)) {
            $this->db->where('user_id', $userId);
            $res = $this->db->delete('users');
            return $res;
        } else {
            return false;
        }
    }

    public function isSuperAdmin($userId)
    {
        $this->db->select('role_id');
        $this->db->where('user_id', $userId);
        $chk_acnt_type = $this->db->get('users')->row_array();
        $this->db->select('name');
        $this->db->where('id', $chk_acnt_type['role_id']);
        $roleName = $this->db->get('roles')->row_array();
        if (strtolower($roleName['name']) == 'superadmin') {
            return true;
        }
        return false;
    }

    public function ifUserExist($formData)
    {
        $username = $formData['email'];

        try {
            $this->db->where('email', $username);
            $verify_email_get_data = $this->getDataByEmail($username);

            if ($verify_email_get_data) {
                $verify_password = password_verify($formData['password'] . MIX_PASS, $verify_email_get_data['password_hash']);
                if ($verify_password) {
                    return $verify_email_get_data;
                } else {
                    return false;
                }
            } else {
                return false;
            }

        } catch (Exception $e) {
            log_message('error: ', $e->getMessage());
            return;
        }
    }

    public function prepareArray($formData) {
        $session_id = $this->session->userdata('__ci_last_regenerate');
        $now = new DateTime();
            $create_pass = $formData['password_hash'] . MIX_PASS;
            $stored_hash = password_hash($create_pass, PASSWORD_DEFAULT);

// dd(password_verify($formData['password_hash']. MIX_PASS, $stored_hash));
        $formArray = [];
        $formArray['session_id'] = $session_id;
        $formArray['name'] = $formData['name'];
        if (isset($formData['password_hash'])) {
            $formArray['password_hash'] = $stored_hash;
        }
        $formArray['email'] = $formData['email'];
        $formArray['active'] = isset($formData['active']) ? $formData['active'] : '1';
        $formArray['deleted'] = 0;
        $formArray['role_id'] = isset($formData['role_id']) ? $formData['role_id'] : 'user';
        $formArray['remember_me_token'] = null;
        $formArray['creation_timestamp'] = $now->format('Y-m-d H:i:s');
        $formArray['last_login_timestamp'] = $now->format('Y-m-d H:i:s');
        $formArray['last_failed_login'] = $now->format('Y-m-d H:i:s');
        $formArray['activation_hash'] = null;
        $formArray['password_reset_hash'] = null;
        $formArray['password_reset_timestamp'] = $now->format('Y-m-d H:i:s');
        $formArray['provider_type'] = isset($formData['provider_type']) ? $formData['provider_type'] : '';
        if (!isset($formData['password_hash'])) {
            $formArray['password_token'] = base64_encode(time());
        } else {
            $formArray['password_token'] = null;
        }

        return $formArray;
    }

    public function getDataByPasswordToken($pwd_token)
    {
        $this->db->where('password_token', $pwd_token);
        return $this->db->get('users')->row_array();
    }

    public function getDataByEmail($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('users')->row_array();
    }

    public function getUsersRole($userId)
    {
        $this->db->select('role_id');
        $this->db->where('user_id', $userId);
        $role_id = $this->db->get('users')->row_array();

        $this->db->select('name');
        $this->db->where('id', (isset($role_id['role_id']) && !empty($role_id['role_id'])) ? $role_id['role_id'] : 0);
        $role_name = $this->db->get('roles')->row();
        return $role_name->name;
    }

    public function getAuthRoleId($userId){
        $this->db->select('role_id');
        $this->db->where('user_id', $userId);
        $role_id = $this->db->get('users')->row();

        return $role_id->role_id;
    }
}