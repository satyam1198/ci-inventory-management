<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel='stylesheet' href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <title>Document</title>
</head>
<body>
<?php include('./application/views/message/success.php') ?>
<?php include_once('./application/views/message/incorrect-pass.php') ?>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Forget Password</p>
                <form name="register" class="mx-1 mx-md-4" method="post" action="<?php echo base_url().'forgetpassword/forget' ?>">
                  <input name="email" type="hidden" value="<?= $this->uid = $this->input->get('NMRC') ?>">
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="email">Email Id <i class="text-danger">*</i></label>
                        <input type="email" id="email" class="form-control" name="email" autocomplete="off" required/>
                        <i class="text-danger"><?php echo form_error('email') ?></i>
                    </div>
                  </div>
                  
                  <div class="d-flex justify-content-center mx-4 mb-1 mb-lg-4">
                    <button class="btn btn-primary btn-lg">Reset Password</button>
                  </div>
                </form>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="<?php echo base_url() . '/assets/img/forgot-pwd.avif' ?>"
                  class="img-fluid" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>