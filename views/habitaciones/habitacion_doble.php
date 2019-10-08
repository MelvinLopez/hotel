<?php

    session_start();
    $usuario = "";
        if(!isset($_SESSION['id_usuarios']) || empty($_SESSION['id_usuarios']) ){
            header('Location: login.php');
        }else{
            $usuario = $_SESSION['nombre'];
        }    
        
        if($_SESSION['id_tusuario'] == 2) { 
            require_once("../../models/tipo_usuarios.php");
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
        <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FontAwesome Styles-->
        <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
            <!-- Custom Styles-->
        <link href="../../assets/css/custom-styles.css" rel="stylesheet" />
        <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="../login.php" >Cerrar sesión</a>
                        <a href="../list_cuartos.php" >Atrás</a>
                        
                        <a href="habitacion_simple.php">Habitaciones Simples</a>
                        <a href="#" >Habitaciones Doble</a>
                        <a href="habitacion_lujosa.php">Habitaciones Lujosas</a>
                        <a href="habitacion_penthouse.php">Penthouse</a>
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
                    <small>Estado de habitaciones</small>
                </h1>    

<table cellpadding="5" class="table table-striped"  >
                <thead>
                <tr>
                        <th>Habitación Doble</th>
          
                    </tr>
                   
                    <tr>
                    <th scope="col">Codigo </th>
                        <th>Número de habitación</th>
                        <th>Estado</th>
                        <th>Detalle de Habitación</th>
                        <th><a href="nueva_hab/nueva_doble.php"> Agregar Cuartos </a></th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php foreach ($stmt as $fila){ 
                         if ($fila[5] == 4) {
                             
                            if($fila[2] == 'O'){
                                $style="background-color:   #fa362a;";                                 
                            }elseif($fila[2] == 'R'){
                                $style="background-color:  #7DD6DD;";
                            }else{
                                $style="background-color:  #32CD32;";
                            }
                            ?>
                           
                        <tr>
                        <td > <?= $fila[0] ?> </td>
                            <td > <?= $fila[3] ?> </td>
                            <!--  -->
                            <td style="<?= $style ?>" >  
                            <?php if($fila[2] == 'O'){                                            
                                echo "Ocupado";                                   
                            }elseif($fila[2] == 'R'){                                    
                                echo "Reservado";
                            }else{
                                echo "Disponible";
                            }  ?> </td>
                            <!--  -->
                            <td > <?= $fila[1] ?> </td>
                            
                        <td>
<a onclick="return confirm('Esta seguro que quiere eliminar el registo')" href="../../controllers/usuario_controllers.php?action=eliminar_cuarto2&id=<?= $fila[0] ?>" class= "btn btn-success">Eliminar</a>
<a onclick="return confirm('Esta Seguro Que quiere Hbilitar la Habitacion')" href="../habilitar_cuarto.php?action=aprovar_cuarto&id=<?= $fila[0] ?>" class= "btn btn-success">Habilitar </a>
 
                        </td>
                            
                        </tr>    
                        <?php } ?>
                        

                        <?php } ?>
                </tbody>
            </table> 
                  
<script src="../../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery.metisMenu.js"></script>
</body>
</html>
<?php } ?>
