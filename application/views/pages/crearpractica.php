<!DOCTYPE html>
<html lang="en">

<head>
    <title>CodeIgniter Tutorial</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/js/youtube.js'); ?>">

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
                                <h1 class="h4 text-gray-900 mb-4">Crear Practica</h1>
                            </div>

                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Tipus de practica</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th><a href="<?php echo base_url('upload') ?>">Infografia</a></th>
                                    </tr>
                                    <tr>
                                        <th><a href="<?php echo base_url('practicaVideo') ?>">Videorecurs</a></th>
                                    </tr>
                                    <tr>
                                        <th><a href="<?php echo base_url('upload_form') ?>">Fichers de Video</a></th>
                                    </tr>
                                    <tr>
                                        <th><a href="<?php echo base_url('upload_form') ?>">Pissara</a></th>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>



</body>

</html>