<html>

<head>
    <title>CodeIgniter Tutorial</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    

</head>
<?php if(!isset($grocery)){?>
<script type="text/javascript" src='<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>'></script>
<?php }?>


<!---------------------------------------------------------------------------------------------------------------------------->



<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="<?php echo base_url('videos'); ?>">
        <img style="width: 50%;" src="assets/img/logoApp.svg">
        <div class="sidebar-brand-text">DAWTube<sup></sup></div>
    </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Privada
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Gestionar</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="<?php echo base_url('adminUsuaris'); ?>">Gestionar Usuaris</a>
                    <a class="collapse-item" href="<?php echo base_url('admingroceryusuaris'); ?>">Gestionar Grups</a>
                    <a class="collapse-item"  href="<?php echo base_url('administrarPractiquesadmin'); ?>">Gestionar Practiques</a>
                    <a class="collapse-item"  href="<?php echo base_url('adminTags'); ?>">Gestionar Tags</a>
                    <a class="collapse-item"  href="<?php echo base_url('administratCursos'); ?>">Gestionar Cursos</a>
                    <a class="collapse-item"  href="<?php echo base_url('administrarTags'); ?>">Gestionar Tags</a>
                    <a class="collapse-item" href="<?php echo base_url('crearusuariadmin'); ?>">Crear Usuaris</a>
                    <a class="collapse-item" href="<?php echo base_url('crearpractica'); ?>">Creear Practica</a>
                   <!-- <a class="collapse-item" href="<?php echo base_url('crearTag'); ?>">Crear Tag</a> -->
                </div>
            </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Publica
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Opcions</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="<?php echo base_url('perfilusuari'); ?>">Perfil</a>
                    <a class="collapse-item" href="<?php echo base_url('logout'); ?>">Logout</a>
                    <!--<a class="collapse-item" href="<?php echo base_url('registra'); ?>">Register</a>-->
                    <a class="collapse-item" href="<?php echo base_url('mostrarcanviarpassword'); ?>">Forgot Password</a>

                </div>
            </div>
        </li>
                            
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('videos'); ?>">
                <i class="fas fa-user-friends"></i>
                <span>Recursos</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>



    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    

                  

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php
                                echo $user->username; ?>
                            </span>
                            <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                       <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?php echo base_url('perfilusuari'); ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" href="<?php echo base_url('logout'); ?>"></i> Logout
                            </a>
                        </div> -->
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->