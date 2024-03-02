<?php

class Logout extends CI_Controller
{
    /**
     * Logout function will allow user to logout from the system
     *
     * @return void
     */
    public function logout() {
        // dd($this->session->userdata('logged_in'));
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('logged_in');
        $res = $this->session->sess_destroy();
        if (empty($res)) {
            return redirect(base_url().'login/login');
        }
    }
}
?>