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
        <!-- Navbar -->
        <?php include_once('./application/views/layouts/topbar.php') ?>

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
                            Roles List
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                            <span class="d-none d-sm-inline">
                                <a href="<?php echo base_url().'roles/create' ?>" class="btn">
                                Create Role
                                </a>
                            </span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Page body -->
                <div class="page-body">
                    <div class="container-xl">
                        <div class="col py-3">
            
                            <table class="table  table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Role Name</th>
                                        <th>Display Name</th>
                                        <th class="text-center">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($roles)) { foreach($roles as $role) {?> 
                                        <tr>
                                            <td><?php echo ucfirst($role['name']) ?></td>
                                            <td><?php echo $role['display_name']?></td>
                                            <td class="text-center">
                                                <a class="btn btn-primary" href="<?php echo base_url() . 'roles/edit/' . $role['id']?>">Edit</a>
                                                <a class="btn btn-danger" href="<?php echo  base_url() . 'roles/delete/' . $role['id'] ?>" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php }} else {?>
                                        <tr>
                                            <td colspan="5">No Record found</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                
                            </table>
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
<script type="text/javascript">


</script>
</body>
</html>