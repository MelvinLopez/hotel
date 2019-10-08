<?php
session_start();
$usuario = "";
if(!isset($_SESSION['id_usuarios']) || empty($_SESSION['id_usuarios']) ){
    header('Location: ../../login.php');
}else{
    $usuario = $_SESSION['nombre'];
}    
  
if($_SESSION['id_tusuario'] == 1) { 
                require_once("../../../models/tipo_usuarios.php");
                $t_usuario =  new Tipo_usuario();
                $habitacion = $t_usuario->gethabitacion();
                    $comida = $t_usuario->getcomida();
                    $hab_doble = $t_usuario->hab_doble();
                    $getT_habitacion = $t_usuario->getT_habitacion();
                    $action = "agregar";

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
                <a class="nav-link active" href="../../login.php">Salir</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../reservation_views.php">atras</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <h2 class="card-title">Bienvenido, <?= $usuario ?></h2>
        <p class="card-text"> HAZ TU RESERVACION <small> Seleccione Su habitacion</small></p>
    </div>
 
    </div>

    <div class="container">
    <form action="../../../controllers/usuario_controllers.php?action=agregar" method="post">

                                 
  
    <div class="form-group">
    <label>Codigo de Habitación</label>       

            <select name="id_habitacion" class="form-control" required>
                <?php if(empty($hab_doble)){ ?>
                    <option value="0">No hay Habitaciones</option>
                <?php }else{ ?>    

                <?php foreach ($hab_doble as $fila) { ?>    
                    <option value="<?= $fila[0] ?>"> <?= $fila[0] ?> </option>
                <?php } } ?>

            </select>
        </div>
							 							 
							  <div class="form-group">
                                            <label>Régimen de comidas</label>
                                            <select name="regimen_comida" class="form-control" required>

                                        <?php foreach ($comida as $fila) { ?>    

                                        <option value="<?= $fila[0] ?>"><?= utf8_encode($fila[1]) ?> </option>
                                        <?php }?>

                                        </select>
                              </div>
							  <div class="form-group">
                                            <label>Entrada</label>
                                            <input name="f_llegada" type ="date" class="form-control">
                                            
                               </div>
							   <div class="form-group">
                                            <label>Salida</label>
                                            <input name="f_salida" type ="date" class="form-control">        
                               </div>
                               <div class="form-group">
                                            <label>tipo de Habitacion</label>
                                            <select name="id_t_habitacion" class="form-control" required>
                                   
                                            <option value="4"> Doble</option>
                          
                                            </select>
                               </div>
   
  

                               <div class="form-group">
                                    <td><input type="reset" class="btn btn-danger" value="limpiar"></td>
                                    <td><input type="submit" class="btn btn-success" value="guardar"></td>
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