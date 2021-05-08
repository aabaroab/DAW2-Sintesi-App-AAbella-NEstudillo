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
                        <form class="user" action="<?php echo base_url('modificarUsuari') ?>" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p>Nom:</p><input type="text" class="form-control form-control-user" id="NomUsuari" name="NomUsuari" value="<?php echo $info_user->first_name; ?>">
                                </div>
                                <div class="col-sm-6">
                                    <p>Cogonom:</p><input type="text" class="form-control form-control-user" id="CognomsUsuari" name="CognomsUsuari" value="<?php echo $info_user->last_name; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Email:</p><input type="email" class="form-control form-control-user" id="EmailUsuari" name="EmailUsuari" value="<?php echo $info_user->email; ?>">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <p>Nom Usuari:</p><input type="text" class="form-control form-control-user" id="UsernameUsuari" name="UsernameUsuari" value="<?php echo $info_user->username; ?>">
                                </div>
                                <div class="col-sm-6">
                                    <p>Telefon:</p><input type="text" class="form-control form-control-user" id="TelefonUsuari" name="TelefonUsuari" value="<?php echo $info_user->phone; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </form>
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


