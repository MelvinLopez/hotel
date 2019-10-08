<?php

    session_start();
    $usuario = "";
        if(!isset($_SESSION['id_usuarios']) || empty($_SESSION['id_usuarios']) ){
            header('Location: login.php');
        }else{
            $usuario = $_SESSION['nombre'];
        }  

        if($_SESSION['id_tusuario'] == 2) { 
    


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin PACIFIC</title>
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
                         <a href="reservation_views.php">Reservaciones pendientes</a>
                         <a href="#" >Clientes aprobados</a>

                    </li>
                    
					</ul>

            </div>

        </nav>

       <!-- INICIA LA TABLA -->

        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-13">
                        <h1 class="page-header">
                        <small> CLIENTES APROBADOS </small>
                        </h1>
                    </div>
                </div> 
                 
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Teléfono</th>
      <th scope="col">País</th>
      <th scope="col">Tipo de habitación</th>
      <th scope="col">Régimen Comida</th>
      <th scope="col">Fecha de Llegada</th>
      <th scope="col">Fecha de Salida</th>
      <th scope="col">Correo</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Estado</th>
      <th scope="col">Opciones</th>
      <th> Opciones </th>
    </tr>
</thead>
<tbody>
  <?php foreach ($lista as $fila) { ?>
    <tr>
        <td><?= $fila[0] ?></td>
        <td><?= $fila[1] ?></td>
        <td><?= $fila[2] ?></td>
        <td><?= $fila[3] ?></td>
        <td><?= $fila[4] ?></td>
        <td><?= $fila[5] ?></td>
        <td><?= $fila[6] ?></td>
        <td><?= $fila[7] ?></td>
        <td><?= $fila[8] ?></td>
        <td><?= $fila[9] ?></td>
        <td><?= $fila[10] ?></td>
  <?php } ?>
        <td>
            <input type="submit" value="Editar"> 
            <input type="submit" value="Eliminar">   
        </td> 
    </tr>
</tbody>
</table>                     
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <script src="../assets/js/custom-scripts.js"></script>
    </div>
</body>
</html>
<?php }  ?>
