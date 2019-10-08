<?php
session_start();
$usuario = "";
if(!isset($_SESSION['id_usuarios']) || empty($_SESSION['id_usuarios']) ){
    header('Location: ../login.php');
}else{
    $usuario = $_SESSION['nombre'];
}    
  
if($_SESSION['id_tusuario'] == 1) { 
                require_once("../../models/tipo_usuarios.php");
                $t_usuario =  new Tipo_usuario();
                $habitacion = $t_usuario->gethabitacion();
                    $comida = $t_usuario->getcomida();
                    $action = "agregar";

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PACIFIC Reservación</title>
	<!-- Bootstrap Styles-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
 </head>
<body>
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="../login.php">Salir</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../usuario_lista.php">Tus reservaciones</a>
            </li>
            
        </ul>
    </div>
    <div class="card-body">
        <h2 class="card-title">Bienvenido, <small><?= $usuario ?></small></h2>
        <p class="card-text"> HAZ TU RESERVACIÓN <small> Seleccione Su Tipo de Habitación</small></p>
    </div>
 
       <!-- INICIA LA TABLA -->
 

  <div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="../../assets/img/simple.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Habitación Simple</h5>
      <p class="card-text"><small class="text-muted">Reservamos Lo mejor para tí</small></p>
      <a href="select_hab/hab_simple.php" class="btn btn-primary">Reservar</a>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="../../assets/img/lujo2.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Habitación de Lujo</h5>
      <p class="card-text"><small class="text-muted">Reservamos Lo mejor para tí</small></p>
      <a href="select_hab/hab_lujosa.php" class="btn btn-primary">Reservar</a>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="../../assets/img/pent.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Penthouse</h5>
      <p class="card-text"><small class="text-muted">Reservamos Lo mejor para tí</small></p>
      <a href="select_hab/hab_penthouse.php" class="btn btn-primary">Reservar</a>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="../../assets/img/doble.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Habitacion Doble</h5>
      <p class="card-text"><small class="text-muted">Reservamos Lo Mejor para ti</small></p>
      <a href="select_hab/hab_doble.php" class="btn btn-primary">Reservar</a>
    </div>
  </div>
</div>	
</div>	




<br>
<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Sobre Nosotros</a>
    </p>
    <p>Te damos la bien venida a nuestra pagina de Reservaciones &copy; </p> Tenemos las mejores ofertas para ti 
    <p>Quieres saber mas Sobre nosotros <a href="https://getbootstrap.com/">visita nuestra pagina Oficial de Facebook </a> y nuestra pagina de Instragram <a href="/docs/4.3/getting-started/introduction/"> Instagram </a>.</p>
  </div>
</footer>
	

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html>
<?php }  ?>

<?php

if($_SESSION['id_tusuario'] == 2) { 

require_once("../../models/tipo_usuarios.php");
$t_usuario =  new Tipo_usuario();

$stmt = $t_usuario->list_admin();
?>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List Clientes</title>
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../../assets/css/custom-styles.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="../login.php" >Cerrar sesión</a>
                        <a href="../admin_list.php" >Usuarios Administrativos</a>
                        <a href="../list_cuartos.php" >Estado de Habitaciones</a>
                    </li>
				</ul>
            </div>
        </nav>

<!-- INICIA LA TABLA -->

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
            <h4>Buen día, Administrador <?= $usuario ?> </h4>
                <h1 class="page-header">
                    <small>LISTA DE CLIENTES</small>
                </h1>                       
<table class="table">
<thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Teléfono</th>
      <th scope="col">correo</th>
      <th scope="col">País</th>
      <th scope="col">Ver Reservación</th>
    </tr>
</thead>
<tbody>
<?php foreach ($stmt as $fila) { ?>
    <?php if ($fila[6] == 1) { ?>
        
    
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
          <td>
                <a href="../admin_info.php?action=admin_infoID&id=<?= $fila[0]?>">Info Reserva</a>
           </td> 
    </tr>
<?php } ?><!-- Ciere if  -->
<?php } ?>    <!-- Ciere foreach -->
            
</tbody>
</table>        
</div>
        </div>    
       
<script src="../../assets/js/jquery-1.10.2.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery.metisMenu.js"></script>
    <script src="../../assets/js/custom-scripts.js"></script>

</body>
<?php } ?><!-- Ciere if admin  -->