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

        $stmt = $t_usuario->list_admin();
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

<!-- inicia la tabla -->

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
            <h4>Buen día, Administrador <?= $usuario ?> </h4>
                <h1 class="page-header">
                    <small>LISTA DE USUARIOS ADMINISTRATIVOS</small>
                </h1>    
                    
<table class="table">
<thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Correo</th>
      <th scope="col">País</th>
      <th scope="col">Eliminar usuario</th>
    </tr>
</thead>
<tbody>
<?php foreach ($stmt as $fila) { ?>
    <?php if ($fila[6] == 2) { ?>
        
    
    <tr>
     
        <td><?= $fila[1] ?> </td>
        <td><?= $fila[2] ?></td>
        <td><?= $fila[3] ?></td>
        <td><?= $fila[4] ?></td>
        <td><?php
        if ( $fila[7] == 1) {
            echo "Italia";
        }elseif ($fila[7] == 2) {
            echo "India";
        }elseif ($fila[7] == 3) {
            echo "Egipto";
        }elseif ($fila[7] == 4) {
            echo "China";
        }elseif ($fila[7] == 5) {
            echo "Chile";
        }elseif ($fila[7] == 6) {
            echo "Brasil";
        }elseif ($fila[7] == 7) {
            echo "Canada";
        }elseif ($fila[7] == 8) {
            echo "Mexico";
        }elseif ($fila[7] == 9) {
            echo "Estados Unidos";
        }elseif ($fila[7] == 10) {
            echo "Argentina";
        }elseif ($fila[7] == 11) {
            echo "España";
        }elseif ($fila[7] == 12) {
            echo "Alemania";
        }elseif ($fila[7] == 13) {
            echo "Republica de Corea";
        }else {
            echo "El Salvador";
        }
       
        ?></td>
<td>   <a onclick="return confirm('¿Desea eliminar el registro?')" href="../controllers/usuario_controllers.php?action=eliminar_admin&id=<?= $fila[0]?>">Eliminar</a> </td> 
    </tr>
<?php } ?><!-- Ciere if  -->
<?php } ?>    <!-- Ciere foreach -->
            
</tbody>
</table>        



    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>
    
 
</body>
</html>
<?php } ?> <!-- cierre if -->
<?php
      
        if($_SESSION['id_tusuario'] == 1) { 
            require_once("../models/tipo_usuarios.php");
            $t_usuario =  new Tipo_usuario();
            $paiss = $t_usuario->getTipopais();
        $stmt = $t_usuario->list_id();
        
$nombre = $stmt [0][1];  
$apellido = $stmt [0][2];
$telefono = $stmt [0][3];
$pais = $stmt [0][7];
$correo = $stmt [0][4];
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
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
            <a class="nav-link active" href="login.php" >Cerrar sesión</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link active" href="usuario_lista.php" >Atras</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <h2 class="card-title">Bienvenido, <?= $usuario ?></h2>
        <p class="card-text"> HAZ TU RESERVACIÓN <small> Seleccione Su habitación</small></p>
    </div>
    </div>

    <form action="../controllers/usuario_controllers.php?action=editarinfoID&id=<?= $_GET['id'] ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
      <input type="text" class="form-control" value="<?= $nombre ?>" name="nombre">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Apellido</label>
      <input type="text" class="form-control" value="<?= $apellido ?>" name="apellido">
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Telefono</label>
      <input type="text" class="form-control"  value="<?= $telefono ?>" name="telefono">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Pais</label>
      <select class="form-control" name="id_pais" >

        <?php foreach ($paiss as $fila) { ?>
            <option value="<?= $fila[0] ?>"> <?= utf8_encode($fila[1]) ?> </option>
        <?php }?>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Correo</label>
      <input type="text" class="form-control" value="<?= $correo ?>"  name="correo">
    </div>
  </div>
  <div class="form-group col-md-2">
    <div class="form-check">
    <button type="reset" class="btn btn-primary">Limpiar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
  
</form>


<?php } ?> <!-- cierre if -->