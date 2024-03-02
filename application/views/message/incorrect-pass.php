<div class="row">
    <div class="col-md-12">
        <?php
        // $incorrect_password = $this->session->userdata('incorrect_password');
        $incorrect_password = $this->session->userdata('failure');
        if ($incorrect_password != '') { ?>
            <div class="alert alert-danger">
                <?php echo $incorrect_password ?>
            </div>  
        <?php } ?>
    </div>
</div>