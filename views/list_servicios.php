<?php

    session_start();
    $usuario = "";
        if(!isset($_SESSION['id_usuarios']) || empty($_SESSION['id_usuarios']) ){
            header('Location: login.php');
        }else{
            $usuario = $_SESSION['nombre'];
        }  

        if($_SESSION['id_tusuario'] == 1) { 
        
            require_once("../models/tipo_usuarios.php");
            $t_usuario =  new Tipo_usuario();
            $stmt = $t_usuario->list_id();
            $fila1 = $t_usuario->list();
            $lista = $t_usuario->detalle_re($_GET['id']);
 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PACIFIC Reservación</title>
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
                <a class="nav-link active" href="usuario_lista.php" >Atrás</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="reservacion/reservation_views.php" >Nueva reservación</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <h2 class="card-title">Bienvenido, <?= $usuario ?></h2>
     
    </div>

    <div class="container">
</table>                     

<div class="col-md-12">
<h1 class="page-header"> <small> Sus Servicios Extras </small></h1>                        
<table class="table">
  <thead>
    <tr>
      <th scope="col">Código de Reservación</th>
      <th scope="col">Servicio Adquerido</th>
      <th scope="col">Opciones</th>
    </tr>
</thead>
<tbody>

<?php if(empty($lista)){ ?>
<tr>
<td colspan="3"> <h1>   <a value="0">No hay Servicios Extras </a> </h1>  <td>   
</tr>
<?php }else{ ?> 
<!-- -------------------------->
<?php foreach ($lista as $fila) { ?>
    <tr>
    <?php if ($fila[1] == $_GET['id']) { ?>
        <td><?= $fila[1] ?></td>
            <td><?php if ($fila[2] == 1) { 
              echo "Servicio de taxi las 24 horas"; 
              
            }elseif ($fila[2] == 2) {
                echo "Aperitivos a su Gusto";
            }elseif ($fila[2] == 3) {
                echo "Servicio al cuarto las 24 horas";
            }elseif ($fila[2] == 4) {
                echo "Pacific Spa";
            }elseif ($fila[2] == 5) {
                echo "Pacific Gym";
            }elseif ($fila[2] == 6) {
                echo "Casino";
            }
    
           ?></td>
       <?php    }  ?>
<td>
    <a onclick="return confirm('¿Desea eliminar el servicio extra?')" href="../controllers/usuario_controllers.php?action=eliminar_extra&id=<?= $fila[0]?>">Eliminar</a>
</td> 
            </tr>
<?php } } ?>               
</tbody>
</table>  
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<?php } ?>  
