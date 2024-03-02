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
        <?php if (in_array('user_can_see_product_list', role_based_permission())) { ?>
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
                            Product List
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                            <span class="d-none d-sm-inline">
                                <a href="<?php echo base_url().'product/create' ?>" class="btn">
                                Add Product
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
                                        <th>Sr No.</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($products)) { foreach($products as $product) {?> 
                                    <tr>
                                        <td><?php echo $product['product_id']?></td>
                                        <td>
                                            <?php //echo $product['image_url'] ?>
                                            <?php if (!empty($product['image_url'])) { ?>
                                                <!-- Display the image using an <img> tag -->
                                                <img src="<?php echo base_url('uploads/' . $product['image_url']); ?>" alt="Image" width="100">
                                            <?php } else { ?>
                                                <!-- Display a placeholder or alternative content if there is no image -->
                                                No Image
                                            <?php }  ?>
                                        </td>
                                        <td><?php echo $product['title'] ?></td>
                                        <td><?php echo $product['description'] ?></td>
                                        <td><?php echo $product['price'] ?></td>
                                        <td><?php echo $product['category'] ?></td>
                                        <td><?php echo $product['is_active'] == 1 ? PRODUCT_STATUS[1] : PRODUCT_STATUS[0]; ?></td>
                                        <td>
                                            <a class="btn btn-primary" href="<?php echo base_url().'product/edit/'.$product['product_id']?>">Edit</a>
                                            <a class="btn btn-danger" href="<?php echo  base_url().'product/delete/'.$product['product_id'] ?>" onclick="return confirm('Are you sure to delete?')">Delete</a>
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
            redirect(base_url() .'404');
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