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

        $action = "aprovar";

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
    <div id="wrapper" >
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
                    <small>Aprobar Cuarto</small>
                </h1>                 
                 
<form action="../controllers/usuario_controllers.php?action=habilitar_cuarto&id=<?= $_GET['id'] ?>"  method="post">    
<table class="table">
<thead>
    <tr>
   
      <th scope="col">Opciones</th>
    
    </tr>
</thead>
<tbody>
    <tr>
        <td>
            <select name="estado"> 
            <option>D</option>
            <option>M</option>
            </select>

        </td> 
        <td>

            <input type="submit" value="guardar">
        </td>               
<td> 
</tr>                          
</tbody>
</table>   
</form>     
</div>
        </div>    
        <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>
    
</body>
</html>
<?php } ?>