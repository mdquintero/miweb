<?php
// seguridad de paginación
session_start();
$varsesion= $_SESSION['Codigo'];
if($varsesion== null || $varsesion=''){
    header("location:http://localhost/proyectotls/Vista/login.php");
    die();
}
?>


<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
        <title>Perfil</title>
        <link rel="Website Icon" type="png" href="../image/logo_ls.jfif">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
     <!-- framework datatable -->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">

     <!-- genera un cuadro de consola para confirmar l acción -->
     
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <img class="logo" src="../image/logosolo.jpg" alt="Logo de la empresa">
            <div class="h-100">
                <div class="sidebar-logo">
                    <center><a href="#">THE LEGAL SOLUTIONS S.A.S</a></center>
                </div>
                <ul>

                <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill mr-2" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                </svg>
                
                <a class="options" href="http://localhost/proyectotls/Vista/Coordinador/Usuarios/index.php">&nbsp; &nbsp; Abogados</a>
                </div>

                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-feather mr-2" viewBox="0 0 16 16">
                        <path d="M15.807.531c-.174-.177-.41-.289-.64-.363a3.8 3.8 0 0 0-.833-.15c-.62-.049-1.394 0-2.252.175C10.365.545 8.264 1.415 6.315 3.1S3.147 6.824 2.557 8.523c-.294.847-.44 1.634-.429 2.268.005.316.05.62.154.88q.025.061.056.122A68 68 0 0 0 .08 15.198a.53.53 0 0 0 .157.72.504.504 0 0 0 .705-.16 68 68 0 0 1 2.158-3.26c.285.141.616.195.958.182.513-.02 1.098-.188 1.723-.49 1.25-.605 2.744-1.787 4.303-3.642l1.518-1.55a.53.53 0 0 0 0-.739l-.729-.744 1.311.209a.5.5 0 0 0 .443-.15l.663-.684c.663-.68 1.292-1.325 1.763-1.892.314-.378.585-.752.754-1.107.163-.345.278-.773.112-1.188a.5.5 0 0 0-.112-.172M3.733 11.62C5.385 9.374 7.24 7.215 9.309 5.394l1.21 1.234-1.171 1.196-.027.03c-1.5 1.789-2.891 2.867-3.977 3.393-.544.263-.99.378-1.324.39a1.3 1.3 0 0 1-.287-.018Zm6.769-7.22c1.31-1.028 2.7-1.914 4.172-2.6a7 7 0 0 1-.4.523c-.442.533-1.028 1.134-1.681 1.804l-.51.524zm3.346-3.357C9.594 3.147 6.045 6.8 3.149 10.678c.007-.464.121-1.086.37-1.806.533-1.535 1.65-3.415 3.455-4.976 1.807-1.561 3.746-2.36 5.31-2.68a8 8 0 0 1 1.564-.173"/>
                    </svg>
                    <a class="options" href="http://localhost/proyectotls/Vista/Coordinador/ProcesosJuridicos/index.php">&nbsp; &nbsp; Procesos Jurídicos</a>
                </div>

                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                    </svg>
                    <a class="options" href="http://localhost/proyectotls/Vista/Coordinador/Afiliados/index.php">&nbsp; &nbsp; Afiliados</a>
                </div>
                    
                </ul>
            </div>
        </aside>
        <div class="main">
            <!-- Botón para ocultar el sidebar -->
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="../image/logosolo.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                           
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="../informacion.php?id=<?= $_SESSION['Codigo'] ?>" class="dropdown-item">Perfil</a>
                                <a href="http://localhost/proyectotls/Vista/CerrarSesion.php" class="dropdown-item">Cerrar Sesion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                    <center><h4> <?= $_SESSION['Nombres'] ?> </h4></center>
            
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="input-group rounded mb-3">
                                <!-- Buscador de usuarios -->
                            </div>
                            <table class="table table-bordered nowrap" style="width:100%" id="myTable">