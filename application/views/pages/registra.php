<!DOCTYPE html>
<html lang="en">
<head>
                <title>Registrar usuari</title>
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
                            <h1 class="h4 text-gray-900 mb-4">Crear compte</h1>
                        </div>
                        <form class="user" action="<?php echo base_url('registra') ?>" method="post">
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
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="customCheck">
                                                <label class="custom-control-label" for="customCheck">Accepto les condicions</label>
                                            </div>
                                        </div>
                            <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                        </form>
                        <hr>
                        <!--<div class="text-center">
                            <a class="small" href="<?php echo base_url('mostrarcanviarpassword'); ?>">Canviar Contraseña</a>
                        </div>-->
                        <div class="text-center">
                            <a class="small" href="<?php echo base_url('login'); ?>">Login</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?php echo base_url('videos'); ?>">Pagina principal</a>
                        </div>
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

