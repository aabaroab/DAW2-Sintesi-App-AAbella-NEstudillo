<!DOCTYPE html>
<html lang="en">

<head>
    <title>CodeIgniter Tutorial</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/js/youtube.js'); ?>">

</head>
<script>

function infografia(){
    if(document.getElementById('valueselect').value == 1){
        document.getElementById('mostrarfeina').innerHTML = '<input type="file"/>'
    }else if (document.getElementById('valueselect').value == 2){
        document.getElementById('mostrarfeina').innerHTML =' <div><input type="text" id="fname" name="fname" style="width: 30%; margin-left: 28%;" autofocus="true" /><button onclick="checkVideo()" id="botoCarrega">Cargar</button></div><div id="player" style="margin-left: 25%;"></div><br/><input type="range" onclick="checkVolumen()" id="sound" style="margin-left: 35%;" /><button id="botoProva" onclick="ckeckProva()">Pause</button><button id="botoProva" onclick="ckeckStop()">Guardar</button>'
    }else if (document.getElementById('valueselect').value == 3){
    }
}

</script>


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

                            <form class="user" action="<?php echo base_url('perfilusuari') ?>" method="post">
                                <div class="form-group">
                                    <p>Titol:</p>
                                    <input type="email" class="form-control" id="EmailUsuari" name="EmailUsuari">
                                </div>
                                <div class="form-group">
                                    <p>Descripció Curata:</p>
                                    <!--<input type="email" class="form-control form-control-user" id="EmailUsuari" name="EmailUsuari">-->
                                    <textarea class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <p>Descripció Llarga:</p>
                                    <!--<input type="email" class="form-control form-control-user" id="EmailUsuari" name="EmailUsuari">-->
                                    <textarea class="form-control"></textarea>
                                </div>

                                <select id="valueselect" onclick="infografia()" class="form-select form-select-sm" style="width: 100%;" aria-label=".form-select-sm example">
                                    <option selected>Tipo de Practica</option>
                                    <option value="1" >Infografia</option>
                                    <option value="2">Vido</option>
                                    <option value="3">Pisarra</option>
                                </select>

                                <div id="mostrarfeina" style="border: 1px solid black; margin-top: 10%;"></div>

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