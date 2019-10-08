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

        $stmt = $t_usuario->admin_infoID();


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Admin</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="login.php" >Cerrar sesión</a>
                        <a href="reservacion/reservation_views.php" >Atrás</a>
               
                        
                    </li>
				</ul>
            </div>
        </nav>

<!-- inicia la tabla -->
<input type="hidden" name="id_usuarios" value="1">
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
            <h4>Buen día, Administrador <?= $usuario ?> </h4>
                <h1 class="page-header">
                    <small>LISTA DE RESERVACIONES</small>
                </h1>                  
                  
<table class="table">
<thead>
    <tr>
    <th scope="col">Codígo de cuarto </th>
      <th scope="col">Habitación</th>
      <th scope="col">Régimen comida</th>
      <th scope="col">Fecha llegada</th>
      <th scope="col">Fecha llegada</th>
      <th scope="col">Estado </th>
      <th scope="col">Opc solicitud</th>
      <th scope="col">Opc cuarto</th>
    
    </tr>
</thead>
<tbody>
<?php foreach ($stmt as $lista) {   ?>
    
    <?php if ($lista[6] == $_GET['id']) { ?>
    <tr>
    <td><?= $lista[1] ?></td>
            <td><?php
            
            if ($lista[7] == 1) {
                echo "Simple";
            }elseif ($lista[7] == 2) {
                echo "Lujosa";
            }elseif ($lista[7] == 3) {
                echo "Penthouse";
            }else {
                echo "Doble";
            }
            
            ?></td>
            <td><?php 
            if ($lista[2] == 1) {
                echo "Solo alojamiento";
            }elseif ($lista[2] == 2) {
                echo "Alojamiento y Desayuno";
            }elseif ($lista[2] == 3) {
               echo "Desayuno y Cena";
            }elseif ($lista[2] == 4) {
                echo "pencion completa";
            }else{
                echo "Todo Incluido";
            }
            ?></td>
            <td><?= $lista[3] ?></td>
            <td><?= $lista[4] ?></td>
            <td><?= $lista[5] ?></td>

            <td>  <a href="../views/admin_aprovar.php?action=aprovar&id=<?= $lista[0]  ?>">Aprobar</a></td>

            <td>  <a href="../views/aprovar_cuarto.php?action=aprovar_cuarto&id=<?= $lista[1]  ?>">Aprobar </a></td>
           <?php } ?>               
<?php } ?>           
</tbody>
</table>        
</div>
        </div>    
       
<script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <script src="../assets/js/custom-scripts.js"></script>
</body>
</html>
<?php } ?>