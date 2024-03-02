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

        <?php // if (in_array('user_can_see_dashboard', role_based_permission())) { ?>
            <div class="page-wrapper">            
            <!-- Page body -->
                <div class="page-body">
                    <div class="container-xl">
                        <div class="col py-3">
                        <div class="row">
                            <div class="col-md-10">
                                <h2 class="text-center" style="margin-top: 25%;">Dashboard</h2>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <?php include_once('./application/views/layouts/footer.php') ?>
            </div>
        <?php // }  else {
            //redirect(base_url() . '404');
        //}?>
    </div>
    
<script src="<?=base_url()?>assets/theme/js/tabler.min.js" defer></script>
<script src="<?=base_url()?>assets/theme/js/demo-theme.min.js"></script>
<script src="<?=base_url()?>assets/theme/js/demo.min.js" defer></script>
</body>
</html>