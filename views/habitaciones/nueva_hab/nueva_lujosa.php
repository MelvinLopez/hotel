<?php

    session_start();
    $usuario = "";
        if(!isset($_SESSION['id_usuarios']) || empty($_SESSION['id_usuarios']) ){
            header('Location: login.php');
        }else{
            $usuario = $_SESSION['nombre'];
        }    
        
        if($_SESSION['id_tusuario'] == 2) { 
            require_once("../../../models/tipo_usuarios.php");
            $t_usuario =  new Tipo_usuario();
                $stmt = $t_usuario->admin_re();
                $stmt1 = $t_usuario->lista_thabitacion();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
             <title>PACIFIC Reservación</title>
             <!-- Bootstrap Styles-->
             <link href="../../../assets/css/bootstrap.css" rel="stylesheet" />
             <!-- FontAwesome Styles-->
             <link href="../../../assets/css/font-awesome.css" rel="stylesheet" />
             <!-- Custom Styles-->
             <link href="../../../assets/css/custom-styles.css" rel="stylesheet" />
             <!-- Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="../habitacion_lujosa.php" >Atrás</a>
                    </li>
				</ul>
            </div>
        </nav>

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-13 col-sm-13">
            <h4>Buen día, Administrador <?= $usuario ?> </h4>
                <h1 class="page-header">
                    <small>Nuevas habitaciones</small>
                </h1>    
<div class="row">
                
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                       
                        <div class="panel-body">

<form action="../../../controllers/usuario_controllers.php?action=nuevaHabitacion3" method="post">
            
        <div class="form-group">
            <label>Tipo de habitación</label>
        <select name="id_t_habitacion" class="form-control" required>
            <option > 2 </option>
        </select>      
        </div>

                                    
        <div class="form-group">
                    <label>Número de Habitación</label>
                    <input type="number" name="numero_habitacion" class="form-control" required>
        </div>
        <div class="form-group">
                    <label>detalle de Habitación</label>
                    <select name="detalle_hab" class="form-control" required>
       
                    <option > Una cama King, Baño, Cocina, Televisión, WIFI, Armario grande </option>
                
            </select> 
        </div>
        <div class="form-group">
                    <label>Número de Piso</label>
                    <select name="piso" class="form-control" required>
                    <option > 2 </option>
                    </select> 
        </div>
        <div class="form-group">
                    <label> Estado </label>
                    <select name="estado" class="form-control" required>
                    <option > D </option>
                    </select> 
        </div>

        <div class="form-group">
            <td><input type="reset" value="limpiar"></td>
            <td><input type="submit" value="guardar"></td>
        </div>						   
        </div>
        
    </div>
</div>
</form>  

<!--    -->
<div class="col-md-3 col-sm-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
        INFORMACIÓN
        </div>
            <div>  

                </table>
                <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Significado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">2</th>
                    <td>Habitación Lujosa</td>
                    </tr>
                </tbody>

                </table>
                <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Significado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">E</th>
                    <td>Habitación en Espera</td>
                    </tr>
                </tbody>
            </div>     
    </div>
</div>
 
				
					</div>
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
                
        <script src="../../../assets/js/jquery-1.10.2.js"></script>
    <script src="../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/jquery.metisMenu.js"></script>
    <script src="../../../assets/js/custom-scripts.js"></script>
</body>
</html>
<?php } ?>