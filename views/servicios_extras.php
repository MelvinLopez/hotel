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
                        $servicios = $t_usuario->servicios();

                            $action = "agregar";

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Servicios Extras</title>
	<!-- Bootstrap Styles-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 </head>
 
<body>
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="login.php">Salir</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="usuario_lista.php">Tus reservaciones</a>
            </li>
        </ul>
    </div> 
    <div class="card-body">
        <h2 class="card-title">Bienvenido, <small><?= $usuario ?></small></h2>
        <p class="card-text"> Servicios las 24 Horas a tu disposición <small> Escoge el que más te guste</small></p>
    </div>
 
       <!-- INICIA LA TABLA -->
 

<div class="card-deck">
    <form  action="../controllers/usuario_controllers.php?action=taxi24&id=<?= $_GET['id'] ?>" method="post">
        <div class="card">
            <img class="card-img-top" src="../assets/img/taxi24.jpg" alt="Card image cap">
            <div class="card-body">
     
                <?php foreach ($servicios as $fila) { ?>
                    <h5 class="card-title"><?php if ($fila[0] == 1) {
                        echo $fila[1];
                    }  ?></h5>
                <?php }?>
     
                    <p class="card-text"><small class="text-muted">Solicitalo cuando Quieras</small></p>
                <input   type="submit" value="Reservar" class="btn btn-primary">
            </div>
        </div>
    </form>

    <form  action="../controllers/usuario_controllers.php?action=comida24&id=<?= $_GET['id'] ?>" method="post">
  <div class="card">
    <img class="card-img-top" src="../assets/img/comida24.jpg" alt="Card image cap">
    <div class="card-body">
    <?php foreach ($servicios as $fila) { ?>
                    <h5 class="card-title"><?php if ($fila[0] == 2) {
                        echo $fila[1];
                    }  ?></h5>
                <?php }?>
      <p class="card-text"><small class="text-muted">Solicitalo cuando Quieras</small></p>
      <input type="submit" value="Reservar" class="btn btn-primary">
    </div>
  </div>
  </form>

  <form action="../controllers/usuario_controllers.php?action=comida24&id=<?= $_GET['id'] ?>" method="post">
  <div class="card">
    <img class="card-img-top" src="../assets/img/servicio24.jpg" alt="Card image cap">
    <div class="card-body">
    <?php foreach ($servicios as $fila) { ?>
                    <h5 class="card-title"><?php if ($fila[0] == 3) {
                        echo $fila[1];
                    }  ?></h5>
                <?php }?>
      <p class="card-text"><small class="text-muted">Reservamos Lo mejor para tí</small></p>
      <input type="submit" value="Reservar" class="btn btn-primary">
    </div>
  </div>
  </form>

  <form action="../controllers/usuario_controllers.php?action=spa24&id=<?= $_GET['id'] ?>" method="post">
  <div class="card">
    <img class="card-img-top" src="../assets/img/spa24.jpg" alt="Card image cap">
    <div class="card-body">
    <?php foreach ($servicios as $fila) { ?>
                    <h5 class="card-title"><?php if ($fila[0] == 4) {
                        echo $fila[1];
                    }  ?></h5>
                <?php }?>
      <p class="card-text"><small class="text-muted">Reservamos Lo mejor para tí</small></p>
      <input type="submit" value="Reservar" class="btn btn-primary">
    </div>
  </div>
  </form>
</div>


<br>
<div class="card-deck" >

  
<form action="../controllers/usuario_controllers.php?action=gym24&id=<?= $_GET['id'] ?>" method="post">
  <div class="card">
    <img class="card-img-top" src="../assets/img/gym24.jpg" alt="Card image cap">
    <div class="card-body">
    <?php foreach ($servicios as $fila) { ?>
                    <h5 class="card-title"><?php if ($fila[0] == 5) {
                        echo $fila[1];
                    }  ?></h5>
                <?php }?>
      <p class="card-text"><small class="text-muted">Reservamos Lo mejor para tí</small></p>
      <input type="submit" value="Reservar" class="btn btn-primary">
    </div>
  </div>
  </form>

    
  <form action="../controllers/usuario_controllers.php?action=casino24&id=<?= $_GET['id'] ?>" method="post">
  <div class="card">
    <img class="card-img-top" src="../assets/img/casino24.jpg" alt="Card image cap">
    <div class="card-body">
    <?php foreach ($servicios as $fila) { ?>
                    <h5 class="card-title"><?php if ($fila[0] == 6) {
                        echo $fila[1];
                    }  ?></h5>
                <?php }?>
      <p class="card-text"><small class="text-muted">Reservamos Lo mejor para tí</small></p>
      <input type="submit" value="Reservar" class="btn btn-primary">
    </div>
  </div>
  </form>

</div>

	

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html>
<?php }  ?>
