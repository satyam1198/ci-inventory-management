<?php

function role_based_permission()
{
    $CI =& get_instance();
    $CI->load->model('User_model');
    $CI->load->model('Role_has_permission_model', 'rp');
    $CI->load->model('Permission_model');
    $user_id = $CI->session->userData('user_id');
    $role_id = $CI->User_model->getAuthRoleId($user_id);
    $user_permissions = $CI->rp->getPermissionByRoleId($role_id);
    $total_permission = $CI->Permission_model->getSelectedData('name');

    //this total permissions are assigned to the user
    $role_based_permission = array_intersect($total_permission, $user_permissions);
    return $role_based_permission;
}
?>