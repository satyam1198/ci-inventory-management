<?php 
 $logged_in = $this->session->userdata('logged_in');
if($logged_in == 1) {
    return redirect(base_url().'dashboard/index');
}
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <link type="text/css" rel='stylesheet' href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <style type="text/css">

    ::selection { background-color: #E13300; color: white; }
    ::-moz-selection { background-color: #E13300; color: white; }

    body {
        background-color: #fff;
        margin: 40px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
        text-decoration: none;
    }

    a:hover {
        color: #97310e;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #body {
        margin: 0 15px 0 15px;
        min-height: 96px;
    }

    p {
        margin: 0 0 10px;
        padding:0;
    }

    p.footer {
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
    }

    .div-80{
        background-color: #ebecef;
        height: 33rem;
    }

    .div-80 h2{
        margin-top: 30%;
        text-emphasis: circle  #ffd400; 
        
    }

    .div-40{
        background-color: #ffd400;
        height: 33rem;
    }
    .btn-submit {
        background-color: #e0e1e5;
    }

    .right-btn{
        float: right;
    }
    </style>
</head>
<body>
<?php include_once('./application/views/message/incorrect-pass.php') ?>
<?php include_once('./application/views/message/success.php') ?>
<div class="row">
    <div class="col-md-8 div-80">
        <h2 class="text-center">Welcome</h2>
    </div>
    <div class="col-md-4 div-40">
        <div class="mt-5 ">
            <h2 class="text-center"><b>Login</b></h2>
            <hr>
            <div class="row ">
            <form name="login" method="post" action="<?php echo base_url() . 'login/login' ?>">
                <div class="form-group">
                    <label for="email">Email address <i class="text-danger">*</i></label>
                    <input value="<?php echo set_value('email'); ?>" type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <i class="text-danger"><?php echo form_error('email') ?></i>
                </div>
                <div class="form-group">
                    <label for="password">Password <i class="text-danger">*</i></label>
                    <input value="<?php echo set_value('password'); ?>" type="password" class="form-control" name="password" placeholder="Password">
                    <i class="text-danger"><?php echo form_error('password') ?></i>
                </div>           
                <button type="submit" class="btn btn-submit m-2 right-btn ">Login</button>
                <div class="mt-3">
                    <a href="<?php echo base_url() . 'register/index'?>"  class="p-2">Don't have an account?</a><br>
                    <a href="<?php echo base_url() . 'forgetpassword/forget'?>"  class="p-2">Forget password?</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
