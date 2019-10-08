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
            $habitacion = $t_usuario->gethabitacion();
                $comida = $t_usuario->getcomida();
            $fila1 = $t_usuario->list();
                $action = "editar";
            

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
        <p class="card-text"> EDITE SU INFORMACIÓN <small> </small></p>
        <p class="card-text">   <small> Por el momento no se puede editar su tipo de habitación. Gracias por su comprensión </small></p>
    </div>
    </div>
<form action="../controllers/usuario_controllers.php?action=editar&id=<?= $_GET['id']?>" method="post">                
          
          
<table class="table">
  <thead>
    <tr>
      <th scope="col">Régimen comida</th>
      <th scope="col">Fecha llegada</th>
      <th scope="col">Fecha salida</th>
      <th scope="col">Opción</th>
    </tr>
</thead>
<tbody>

    <tr>

        <td>    <select name="id_regimen_comida" class="form-control" required>

<?php foreach ($comida as $fila) { ?>    

<option value="<?= $fila[0] ?>"><?= utf8_encode($fila[1]) ?> </option>
<?php }?>

</select> </td>
<td>   <input name="f_llegada" type ="date" class="form-control">  </td>
<td>   <input name="f_salida" type ="date" class="form-control"></td>
<td><input type="reset" value="limpiar">
                                    <input type="submit" value="Guardar"></td>
                                    
    </tr>
   
            
</tbody>
</table>   

</form>
<?php } ?>

</body>
</html>
