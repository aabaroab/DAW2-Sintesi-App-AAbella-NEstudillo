<!DOCTYPE html>
<html lang="en">
<head>
                <title>CodeIgniter Tutorial</title>
                <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
        
        </head>


<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="<?php echo base_url('registra') ?>" method="post">

                                
                                <div class="form-group">
                                    <input type="user" class="form-control form-control-user" id="exampleInputUser" placeholder="User" name="exampleInputUser"/>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="exampleInputEmail"/>
                                </div>

                                <div class="form-group">
                                    <input type="pass" class="form-control form-control-user" id="exampleInputPass" placeholder="Password" name="exampleInputPass"/>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('login'); ?>">Already have an account? Login!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url(''); ?>">Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
    <script type="text/javascript" src='<?php echo base_url('assets/ src="js/sb-admin-2.min.js'); ?>'></script>
<script type="text/javascript" src='<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>'></script>
<script type="text/javascript" src='<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>'></script>
<script type="text/javascript" src='<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>'></script>
</body>

