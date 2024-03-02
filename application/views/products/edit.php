<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Application</title>
    <link href="<?=base_url()?>assets/theme/css/tabler.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/theme/css/tabler-vendors.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/theme/css/demo.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            Edit Product
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
                                <form method="post" action="<?php echo base_url() . 'product/update/' . $product['product_id']?>" enctype='multipart/form-data'>
                                    <div class="row">
                                        <div class="col-md-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Title <i class="text-danger">*</i></label>
                                                <input type="text" name="title"  value="<?php echo $product['title'] ?>" class="form-control" autocomplete="off" maxlength="32" required>
                                                <i class="text-danger"><?php echo form_error('title') ?></i>
                                            </div>   
                                        </div>
                                        <?php //dd($prod_cat ,$product) ?>
                                        <div class="col-md-4 p-2">
                                            <div class="form-group">
                                                <label for="category_id">Select Product Category<i class="text-danger">*</i></label>
                                                <select name="category_id" class="form-control" required>
                                                    <option value="">Select Product Categories</option>
                                                    <?php foreach ($prod_cat as $categories) { ?>
                                                        <option value="<?php echo $categories['id'] ?>"  <?= $product['category_id'] == $categories['id'] ? 'selected' : '' ?> > <?= $categories['category'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <i class="text-danger"><?php echo form_error('product_cat') ?></i>
                                            </div>   
                                        </div>
                                        <div class="col-md-4 p-2">
                                            <div class="form-group ">
                                                <label for="active">Is Active</label>
                                                <select class="form-control" name="active" id="active" value="<?php echo set_value('active') ?>">
                                                    <option >Select Status</option>
                                                    <option value="1" <?= $product['is_active'] == 1 ? 'selected' : '' ?> >Active</option>
                                                    <option value="0" <?= $product['is_active'] == 0 ? 'selected' : '' ?>>Inactive</option>
                                                </select>

                                                <i class="text-danger"><?php echo form_error('active') ?></i>
                                            </div>   
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 p-2">
                                            <div class="form-group">
                                                <label for="price">Price <i class="fa fa-rupee"></i><i class="text-danger">*</i></label>
                                                <input type="number" name="price"  value="<?php echo $product['price'] ?>" class="form-control" required>
                                                <i class="text-danger"><?php echo form_error('price') ?></i>
                                            </div>   
                                        </div>
                                        <div class="col-md-8 p-2" style="pointer-events: none;">
                                            <div class="form-group">
                                                <label for="upd_docs">Upload Document</label>
                                                <input type="file" name="upload"  value="<?php echo set_value('upd_docs') ?>" class="form-control">
                                                <i class="text-danger"><?php echo form_error('upd_docs') ?></i>
                                            </div>   
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 p-2">
                                            <div class="form-group ">
                                                <label for="description">Description <i class="text-danger">*</i></label>
                                                <textarea class="form-control" name="description" id="decription" value="<?php echo $product['description'] ?>" cols="30" rows="5" required > <?= $product['description']?> </textarea>
                                                <i class="text-danger"><?php echo form_error('description') ?></i>
                                            </div>   
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group text-center">
                                        <button type="submit"  class="btn btn-primary">Update</button>
                                        <a class="btn btn-secondary" href="<?php echo base_url().'product/index' ?>">Cancel</a>
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