<!DOCTYPE html>
<html lang="en">
<head>
                <title>Canviar contrasenya</title>
        <!--<link rel="stylesheet" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">-->
        
        </head>


<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                        <!------------------Imatge del canto del login--------------------------------->
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <!------------------Imatge del canto del login--------------------------------->

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Canviar contrasenya</h1>
                                    </div>
                                    <form class="user" action="<?php echo base_url('canviarpassword') ?>" method="post">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="contraseñavella" name="contraseñavella" aria-describedby="emailHelp"
                                                placeholder="Contraseña actual">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="novacontraseña" name="novacontraseña" placeholder="Nova contraseña">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="repetircontraseña" name="repetircontraseña" placeholder="Verificar contraseña">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-lg">Enviar</button>

                                    </form>
                                    <hr>
                                </div>
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

</html>