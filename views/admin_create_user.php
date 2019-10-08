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
            $t_usuario = new Tipo_usuario();
                $pais = $t_usuario->getTipopais();
                    $action = "login2";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin PACIFIC </title>
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
                        <a href="admin_list.php" >Atrás</a>
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
                    <small>Crear un Nuevo Administrador</small>
                </h1>    
               
               
<!--  nuevo usuario   -->




<div class="row">
                
<div class="col-md-7 col-sm-7">
    <div class="panel panel-primary">
        <div class="panel-heading"> INFORMACIÓN DEL NUEVO ADMINISTRADOR</div>
        <div class="panel-body">

<form action="../controllers/usuario_controllers.php?action=login2" method="post"> 
            
        <div class="form-group">
            <label>Nombre</label>
            <input name="nombre"type ="text" class="form-control">                      
        </div>
        <div class="form-group">
            <label>Apellido</label>
            <input name="apellido" type ="text" class="form-control">                      
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input name ="telefono" type ="text" class="form-control">                      
        </div>
        <div class="form-group">
            <label>Correo</label>
            <input name="correo" type="email" placeholder="ejemplo@gmail.com" class="form-control">                      
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input name="pass" type="password" class="form-control">                      
        </div>
        <div class="form-group">
            <label>País</label>
            <select name="pais" class="form-control" id="pais" required>
            <option>Seleccione su país</option>
                <?php foreach ($pais as $fila) { ?>
                    <option value="<?= $fila[0] ?>"> <?= utf8_encode($fila[1]) ?> </option>
                <?php }?>
            </select>    
        </div>
        <div class="form-group">
            <td><input type="reset" value="limpiar"></td>
            <td> <input type="submit" value="Registrarse">   </td>
        </div>						   
    </div>
        
    </div>
</div>                      
</form>
</div>

    </div>
    <script src="../assets/js/jquery-3.1.1.min.js"></script>    
    <script src="../assets/js/main.js"></script>
</body>
</html>
<?php }?>