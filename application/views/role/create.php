<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Application</title>
    <link href="<?=base_url()?>assets/theme/css/tabler.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/theme/css/tabler-vendors.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/theme/css/demo.min.css" rel="stylesheet" type="text/css">
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
</head>
<body>
    <div class="page">
        <!-- Sidebar -->
        <?php include_once('./application/views/layouts/sidebar.php') ?>

        <!-- give permission to the user for this module-->
        <?php if (in_array('user_can_see_roles', role_based_permission())) { ?>
            <div class="page-wrapper">
                <!-- Page header -->
                <div class="page-header d-print-none">
                    <div class="container-xl">
                        <div class="row g-2 align-items-center">
                            <div class="col">
                                <!-- Page pre-title -->
                                <div class="page-pretitle">
                                Overview
                                </div>
                                <h2 class="page-title">
                                Create Role
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- Page body -->
                <div class="page-body">
                    <div class="container-xl">
                        <div class="col py-3">
                            <div class="row">
                                <form name="create" method="post" action="<?php echo base_url().'roles/create'?>" >
                                <div class="row">
                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label for="name">Role Name <i class="text-danger">*</i></label>
                                            <input type="text" name="name"  value="<?php echo set_value('name') ?>" class="form-control" autocomplete="off" maxlength="64" required>
                                            <i class="text-danger"><?php echo form_error('name') ?></i>
                                        </div>   
                                    </div>
                                
                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label for="dis_name">Display Name <i class="text-danger">*</i></label>
                                            <input type="text" name="dis_name"  value="<?php echo set_value('dis_name') ?>" class="form-control" autocomplete="off" maxlength="64"= required>
                                            <i class="text-danger"><?php echo form_error('dis_name') ?></i>
                                        </div>   
                                    </div>                                
                                </div>
                                <br>
                                <div class="form-group text-center">
                                    
                                    <button class="btn btn-primary">Create</button>
                                    <a class="btn btn-secondary" href="<?php echo base_url().'roles/index' ?>">Cancel</a>
                                </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>
            
                <?php include_once('./application/views/layouts/footer.php') ?>
            </div>
        <?php }  else {
            redirect(base_url().'404');
        }?>
        <!-- end permission-->


       
    </div>

<script src="<?=base_url()?>assets/theme/js/tabler.min.js" defer></script>
<script src="<?=base_url()?>assets/theme/js/demo-theme.min.js"></script>
<script src="<?=base_url()?>assets/theme/js/demo.min.js" defer></script>
</body>
</html>