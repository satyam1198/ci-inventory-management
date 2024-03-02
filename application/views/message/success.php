<div class="row fade-in-text">
    <div class="col-md-12">
        <?php
        $success = $this->session->userdata('success');
        if ($success != '') { ?>
            <div class="alert alert-success">
                <?php echo $success ?>
            </div>  
        <?php } ?>
    </div>
</div>


