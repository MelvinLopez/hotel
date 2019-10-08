<?php

    session_start();
    $usuario = "";
        if(!isset($_SESSION['id_usuarios']) || empty($_SESSION['id_usuarios']) ){
            header('Location: login.php');
        }else{
            $usuario = $_SESSION['nombre'];
        }    
        
        if($_SESSION['id_tusuario'] == 2) { 
            require_once("../models/tipo_usuarios.php");
            $t_usuario =  new Tipo_usuario();

        $stmt = $t_usuario->admin_re();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PACIFIC Reservación</title>
	<!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="login.php" >Cerrar sesión</a>
                        <a href="admin_create_user.php" >Nuevo Usuario Admin</a>
                        <a href="reservacion/reservation_views.php" >Atrás</a>


                    </li>
				</ul>
            </div>
        </nav>

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
            <h4>Buen día, Administrador <?= $usuario ?> </h4>
                <h1 class="page-header">
                    <small>Lista de Habitaciones</small>
                </h1>    

<!--  tabla  -->

<table cellpadding="5" class="table table-striped">
    <thead>
       
</thead>
    <tbody>
        <tr>   
        <td> <a href="habitaciones/habitacion_simple.php"> Habitaciones Simples </a> </td>
        <td> <a href="habitaciones/habitacion_doble.php"> Habitaciones Dobles</a> </td>
        <td> <a href="habitaciones/habitacion_lujosa.php"> Habitaciones lujosas </a> </td>
        <td> <a href="habitaciones/habitacion_penthouse.php"> Penthouse</a> </td>
        </tr>    
    </tbody>
</table> 
           


                  
<script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.metisMenu.js"></script>
</body>
</html>
<?php } ?>



