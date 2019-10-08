<?php

    session_start();
    $usuario = "";
        if(!isset($_SESSION['id_usuarios']) || empty($_SESSION['id_usuarios']) ){
            header('Location: login.php');
        }else{
            $usuario = $_SESSION['nombre'];
            $id_usuaio = $_SESSION['id_usuarios'];
        }  

        if($_SESSION['id_tusuario'] == 1) { 
 
    require_once("../models/tipo_usuarios.php");
    $t_usuario =  new Tipo_usuario();
    $stmt = $t_usuario->list_id();
    $lista1 = $t_usuario->list();
    $lista = $t_usuario->servicios();
 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PACIFIC Reservacion</title>
	<!-- Bootstrap Styles-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <a class="nav-link active" href="reservacion/reservation_views.php" >Nueva reservación</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <h2 class="card-title">Bienvenido, <?= $usuario ?></h2>
        <p class="card-text"> HAZ TU RESERVACIÓN <small> Seleccione Su habitación</small></p>
    </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Correo</th>
      <th scope="col">País</th>
      <th scope="col">Opciones</th>
    </tr>
</thead>
<tbody>
<?php foreach ($stmt as $fila) { ?>
    <tr>

        <td><?= $fila[1] ?> </td>
        <td><?= $fila[2] ?></td>
        <td><?= $fila[3] ?></td>
        <td><?= $fila[4] ?></td>
        <td><?php
        if ( $fila[7] == 1) {
            echo "Estados Unidos";
        }elseif ($fila[7] == 2) {
            echo "China";
        }elseif ($fila[7] == 3) {
            echo "Italia";
        }elseif ($fila[7] == 4) {
            echo "México";
        }elseif ($fila[7] == 5) {
            echo "Reino Unido";
        }elseif ($fila[7] == 6) {
            echo "Turquía";
        }elseif ($fila[7] == 7) {
            echo "Francia";
        }elseif ($fila[7] == 8) {
            echo "España";
        }elseif ($fila[7] == 9) {
            echo "Corea del Sur";
        }elseif ($fila[7] == 10) {
            echo "Corea del Norte";
        }elseif ($fila[7] == 11) {
            echo "El Salvador";
        }elseif ($fila[7] == 12) {
            echo "Turquía";
        }elseif ($fila[7] == 13) {
            echo "Alemania";
        }elseif ($fila[7] == 14) {
            echo "Rusia";
        }else {
            echo "Hong Kong";
        }
       
        ?></td>
        <td> <a onclick="return confirm('¿Desea Editar su información?')" href="admin_list.php?&id=<?= $id_usuaio ?>" class="btn btn-info">Editar información</a></td>

    </tr>
<?php } ?>    
            
</tbody>
</table>                     

<div class="col-md-12">
<h1 class="page-header"> <small> Sus Reservaciones </small></h1>                        
<table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Tipo de habitación</th>
      <th scope="col">Régimen Comida</th>
      <th scope="col">Fecha de Llegada</th>
      <th scope="col">Fecha de Salida</th>
      <th scope="col">Estado</th>
      <th scope="col">Agregar Servicios</th>
      <th scope="col">Opciones</th>
    </tr>
</thead>
<tbody>
<?php foreach ($lista1 as $fila) { ?>
    <tr>
    <td><?= $fila[0] ?></td>
            <td><?php
            
            if ($fila[7] == 1) {
                echo "Simple";
            }elseif ($fila[7] == 2) {
                echo "Lujosa";
            }elseif ($fila[7] == 3) {
                echo "Penthouse";
            }else {
                echo "Doble";
            }
            
            ?></td>
            <td><?php 
            if ($fila[2] == 1) {
                echo "Solo alojamiento";
            }elseif ($fila[2] == 2) {
                echo "Alojamiento y Desayuno";
            }elseif ($fila[2] == 3) {
               echo "Desayuno y Cena";
            }elseif ($fila[2] == 4) {
                echo "pencion completa";
            }else{
                echo "Todo Incluido";
            }
            ?></td>
            <td><?= $fila[3] ?></td>
            <td><?= $fila[4] ?></td>
            <td><?= $fila[5] ?></td>
<td> <a onclick="return confirm('¿Desea Agregar Servicios extras a su reservación?')" href="servicios_extras.php?&id=<?= $fila[0] ?>" class="btn btn-info">Agregar</a></td>
<td>
<a href="list_servicios.php?&id=<?= $fila[0]?>" class="btn btn-info">Ver Servicios</a>&nbsp; 
    <a onclick="return confirm('¿Desea editar el registro?')" href="../views/editar_info.php?action=editar&id=<?= $fila[0]?>" class="btn btn-info">Editar</a> &nbsp;        
    <a onclick="return confirm('¿Desea eliminar el registro?')" href="../controllers/usuario_controllers.php?action=eliminar&id=<?= $fila[0]?>" class="btn btn-info">Eliminar</a>
    <a onclick="return confirm('¿Desea imprimir el registro?')" href="factura.php?&id=<?= $fila[0]?>" class="btn btn-info">Factura</a>

</td> 
            </tr>
<?php } ?>               
</tbody>
</table>        

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html>
<?php }  ?>