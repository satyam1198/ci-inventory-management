<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Application</title>
    <link href="<?=base_url()?>assets/theme/css/tabler.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/theme/css/tabler-vendors.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/theme/css/demo.min.css" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/style/css/main.css';?>" >
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
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
        <?php ///if (in_array('users_can_see_user', role_based_permission())) { ?>
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
                        Edit User
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
                            <form name="update" method="post" action="<?php echo base_url() . 'user/update/' . $user['user_id']?>" >
                            <div class="row">
                                <div class="col-md-4 p-2">
                                    <div class="form-group">
                                        <label for="name">Name <i class="text-danger">*</i></label>
                                        <input type="text" name="name"  value="<?php echo $user['name'] ?>" class="form-control" autocomplete="off" required>
                                        <i class="text-danger"><?php echo form_error('name') ?></i>
                                    </div>   
                                </div>
                                <!-- <div class="col-md-4 p-2">
                                    <div class="form-group">
                                        <label for="password_hash">Password <i class="text-danger">*</i></label>
                                        <input type="password" name="password_hash"  value="<?php echo $user['password_hash'] ?>" class="form-control" autocomplete="off" required>
                                        <i class="text-danger"><?php echo form_error('password_hash') ?></i>
                                    </div>   
                                </div> -->
                                <div class="col-md-4 p-2">
                                    <div class="form-group">
                                        <label for="email">Email <i class="text-danger">*</i></label>
                                        <input type="email" name="email"  value="<?php echo $user['email'] ?>" class="form-control" autocomplete="off" required>
                                        <i class="text-danger"><?php echo form_error('email') ?></i>
                                    </div>   
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="form-group ">
                                        <label for="active">Is Active</label>
                                        <select class="form-control" name="active" id="active" value="<?php echo $user['active'] ?>">
                                            <option >Select Status</option>
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>

                                        <i class="text-danger"><?php echo form_error('active') ?></i>
                                    </div>   
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-4 p-2">
                                    <div class="form-group ">
                                        <label for="role_id">Account Type <i class="text-danger">*</i></label>
                                        <select class="form-control" name="role_id" id="role_id" required>
                                            <?php foreach($roles as $role) { ?>
                                                <option value="<?= $role['id']; ?>"  <?php echo $user['role_id'] == $role['id']  ? 'selected' : '' ?> > <?= $role['display_name']; ?></option>
                                            <?php } ?>
                                            <!-- <option >Select Account Type</option>
                                            <option value="admin" <?php  //echo $user['role_id'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                            <option value="superaAdmin" <?php  //echo $user['role_id'] == 'superaAdmin' ? 'selected' : '' ?> >Super Admin</option>
                                            <option value="user" <?php  //echo $user['role_id'] == 'user' ? 'selected' : '' ?>>User</option> -->
                                        </select>
                                        <i class="text-danger"><?php echo form_error('role_id') ?></i>
                                    </div>   
                                </div>
                                <div class="col-md-4 p-2">
                                    <div class="form-group">
                                        <label for="provider_type">Provider Type</label>
                                        <input type="text" name="provider_type"  value="<?php echo $user['provider_type'] ?>" class="form-control">
                                        <i class="text-danger"><?php echo form_error('provider_type') ?></i>
                                    </div>   
                                </div>
                                <!-- <div class="col-md-4 p-2">
                                    <div class="form-group">
                                        <label for="upd_docs">Upload Document</label>
                                        <input type="file" name="upd_docs"  value="<?php echo set_value('upd_docs') ?>" class="form-control">
                                        <i class="text-danger"><?php echo form_error('upd_docs') ?></i>
                                    </div>   
                                </div> -->
                            </div>
                            <br>
                            <div class="form-group text-center">
                                <button class="btn btn-primary">Update</button>
                                <a class="btn btn-warning" href="<?php echo base_url() . 'user/edit/' . $user['user_id'] ?>">Reset</a>
                                <a class="btn btn-secondary" href="<?php echo base_url() . 'user/index' ?>">Cancel</a>
                                
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php include_once('./application/views/layouts/footer.php') ?>
        </div>
        <?php ///}  else {
            //redirect(base_url().'404');
        //}?>
        <!-- end permission-->
    </div>

<script src="<?=base_url()?>assets/theme/js/tabler.min.js" defer></script>
<script src="<?=base_url()?>assets/theme/js/demo-theme.min.js"></script>
<script src="<?=base_url()?>assets/theme/js/demo.min.js" defer></script>
</body>
</html>







