<?php 
 $logged_in = $this->session->userdata('logged_in');
 
    if ($logged_in == 1) {
     
    }	else{
        return redirect(base_url().'login/login');
    }
?>