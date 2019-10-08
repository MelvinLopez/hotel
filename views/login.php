<?php

    session_start();
    session_destroy();

    require_once("../models/tipo_usuarios.php");
    $t_usuario = new Tipo_usuario();
            $pais = $t_usuario->getTipopais();
                $action = "login";

                $msg = (isset($_GET['mensaje']))? $_GET['mensaje']:"";  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Pacific</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />


    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body >
<form action="../controllers/usuario_controllers.php?action=validarUsuario" method="post"> 
    <div class="contenedor-form">
        <div class="toggle">
            <span> Crear Cuenta</span>
        </div>
        
        <div class="formulario">
            <h2 class ="inni">Iniciar Sesión</h2>
            <form action="#">
                <input name="correo" type="email" placeholder="Correo" required>
                <input  name="pass" type="password" placeholder="Contraseña" required>
                <input type="submit" value="Iniciar Sesión">
            </form>
            <p><?= $msg ?></p>
        </div>
    
</form>

<!--  NUEVO USUARIO   -->
<form action="../controllers/usuario_controllers.php?action=login" method="post"> 
        <div class="formulario">
            <h2 class ="inni">Crea tu Cuenta</h2>
            <form action="#">
                <input name="nombre" type="text" placeholder="Nombre" required>

                <input name="apellido" type="text" placeholder="Apellido" required>

                <input name ="telefono" type="text" placeholder="Teléfono" required>

                <input name ="correo" type="email" placeholder="Correo Electronico" required>
                
                <input name ="pass" type="password" placeholder="Contraseña" required>

                <div class="form-group">
                    <label>País</label>
                <select name="pais" class="form-control" id="pais" required>
                <option>seleccione su país</option>
                    <?php foreach ($pais as $fila) { ?>
                        <option value="<?= $fila[0] ?>"> <?= utf8_encode($fila[1]) ?> </option>
                    <?php }?>
                </select>
			    </div>
                

                <input type="submit" value="Registrarse">            
                                
</form>
        </div>
        
    </div>
    <script src="../assets/js/jquery-3.1.1.min.js"></script>    
    <script src="../assets/js/main.js"></script>
</body>
</html>
