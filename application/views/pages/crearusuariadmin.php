<!DOCTYPE html>
<html lang="en">
<head>
                <title>CodeIgniter Tutorial</title>
                <!--<link rel="stylesheet" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">-->
        
        </head>


<body class="bg-gradient-primary">

    <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <!--<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>-->
                <div class="col-lg-7" style="margin-left: 20%;">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="<?php echo base_url('crearusuariadmin') ?>" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="NomUsuari" name="NomUsuari" placeholder="Nom">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="CognomsUsuari" name="CognomsUsuari" placeholder="Cognoms">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="EmailUsuari" name="EmailUsuari" placeholder="Email">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="UsernameUsuari" name="UsernameUsuari" placeholder="Username">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="TelefonUsuari" name="TelefonUsuari" placeholder="telefon">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="PassUsuari" name="PassUsuari" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="GrupUsuari" name="GrupUsuari" placeholder="Grup">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg" style="margin-left: 40%;">Crear</button>
                        </form>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    </div>

    
    <!--<script type="text/javascript" src='<?php echo base_url('assets/ src="js/sb-admin-2.min.js'); ?>'></script>
<script type="text/javascript" src='<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>'></script>
<script type="text/javascript" src='<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>'></script>
<script type="text/javascript" src='<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>'></script>-->
</body>

