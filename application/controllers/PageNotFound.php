<?php

class PageNotFound extends CI_Controller{
    public function pageNotFound(){
        $this->load->view('404');
    }
}
?>