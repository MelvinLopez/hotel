<?php

if ( isset($_GET['action']) ){

    require_once("../models/usuario_model.php");
    $usuario = new usuario_model(); 

    switch ($_GET['action']) {
        case 'agregar':
     
            $usuario->id_habitacion = $_POST['id_habitacion'];
            $usuario->id_regimen_comida = $_POST['regimen_comida'];
            $usuario->f_llegada = $_POST['f_llegada'];
            $usuario->f_salida = $_POST['f_salida'];
            $usuario->id_t_habitacion = $_POST['id_t_habitacion'];
        
            $usuario->agregar();
            header('location: ../views/usuario_lista.php');
            die(); 

            break;

         case 'editar':

            $usuario->id = $_GET['id'];
            $usuario->id_habitacion = $_POST['id_habitacion'];
            $usuario->id_regimen_comida = $_POST['id_regimen_comida'];
            $usuario->f_llegada = $_POST['f_llegada'];
            $usuario->f_salida = $_POST['f_salida'];
         
            $usuario->editar();
            header('location: ../views/usuario_lista.php');
            die(); 
          
            break;

        case 'editarinfoID':
            $usuario->id = $_GET['id'];
            $usuario->nombre = $_POST['nombre'];
            $usuario->apellido = $_POST['apellido'];
            $usuario->telefono = $_POST['telefono'];
            $usuario->id_pais = $_POST['id_pais'];
            $usuario->correo = $_POST['correo'];
         
            $usuario->editarinfoID();
            header('location: ../views/usuario_lista.php');
            die(); 
          
            break;

    #SERVICIOS EXTRAS.

        case 'taxi24':
   
            $usuario->id = $_GET['id'];     
            $usuario->taxi24();
    
            header('location: ../views/usuario_lista.php');
            die(); 

            break;

        case 'comida24':
   
            $usuario->id = $_GET['id'];     
            $usuario->comida24();
    
            header('location: ../views/usuario_lista.php');
            die(); 

            break;

         case 'servicio24':

            $usuario->id = $_GET['id'];     
            $usuario->servicio24();
    
            header('location: ../views/usuario_lista.php');
            die(); 

            break;

        case 'spa24':
   
            $usuario->id = $_GET['id'];     
            $usuario->spa24();
    
            header('location: ../views/usuario_lista.php');
            die();

            break;

        case 'gym24':
   
            $usuario->id = $_GET['id'];     
            $usuario->gym24();
    
            header('location: ../views/usuario_lista.php');
            die(); 

            break;

        case 'casino24':
   
            $usuario->id = $_GET['id'];     
            $usuario->casino24();
    
            header('location: ../views/usuario_lista.php');
            die();

            break;

    #ELIMINAR SERVICIOS EXTRAS.

        case 'eliminar_extra':

            $usuario->id = $_GET['id'];
            $usuario->eliminar_extra();

            header('location: ../views/usuario_lista.php');
            die(); 

            break;

    #ELIMINAR  RESERVACIONES.
 
        case 'eliminar':

            $usuario->id = $_GET['id'];
            $usuario->eliminar();

            header('location: ../views/usuario_lista.php');
            die();

            break;

        case 'eliminar_admin':

            $usuario->id = $_GET['id'];
            $usuario->eliminar_admin();

            header('location: ../views/admin_list.php');
            die();

            break;

    #ELIMINACIÓN DE HABITACIÓN SIMPLE.

        case 'eliminar_cuarto':

            $usuario->id = $_GET['id'];
            $usuario->eliminar_cuarto();

            header('location: ../views/habitaciones/habitacion_simple.php');
            die(); 

            break;

    #ELIMINACIÓN DE HABITACIÓN DOBLE.

        case 'eliminar_cuarto2':

            $usuario->id = $_GET['id'];
            $usuario->eliminar_cuarto2();

            header('location: ../views/habitaciones/habitacion_doble.php');
            die();

            break;
    #ELIMINACIÓN DE HABITACIÓN LUJOSA.

        case 'eliminar_cuarto3':

            $usuario->id = $_GET['id'];
            $usuario->eliminar_cuarto3();

            header('location: ../views/habitaciones/habitacion_lujosa.php');
            die();

            break;

    #ELIMINACIÓN DE HABITACIÓN PENTHOUSE.

        case 'eliminar_cuarto4':
            $usuario->id = $_GET['id'];
            $usuario->eliminar_cuarto4();

            header('location: ../views/habitaciones/habitacion_penthouse.php');
            die(); 

            break;
            
        case 'aprovar':

            $usuario->id = $_GET['id'];
            $usuario->estado = $_POST['Aprobada'];
            $usuario->aprovar();

            header('location: ../views/reservacion/reservation_views.php');
            die(); 

            break;

        case 'aprovar_cuarto':

            $usuario->id = $_GET['id'];
            $usuario->estado = $_POST['estado'];
            $usuario->aprovar_cuarto();

            header('location: ../views/reservacion/reservation_views.php');
            die(); 

            break;

        case 'habilitar_cuarto':

            $usuario->id = $_GET['id'];
            $usuario->estado = $_POST['estado'];
            $usuario->habilitar_cuarto();

            header('location: ../views/list_cuarto.php');
            die(); 

            break;

        case 'admin_infoID':
            $usuario->id = $_GET['id'];
            $usuario->admin_infoID();

            break;

        case 'login':
            $usuario->pass = password_hash($_POST['pass'], PASSWORD_DEFAULT) ;
            $usuario->nombre = $_POST['nombre'];
            $usuario->apellido = $_POST['apellido'];
            $usuario->id_pais = $_POST['pais'];
            $usuario->telefono = $_POST['telefono'];
            $usuario->correo = $_POST['correo']; 
            $msg = ($usuario->login())?"El Usuario no se pudo crear" : "Usuario Creado Con Exito, Ahora ya puede iniciar Sesion";

            header('location: ../views/login.php?mensaje='.$msg);
            die(); 
         
            break;
#crear usuario administrador.
        case 'login2':
            
            $usuario->pass = password_hash($_POST['pass'], PASSWORD_DEFAULT) ;
            $usuario->nombre = $_POST['nombre'];
            $usuario->apellido = $_POST['apellido'];
            $usuario->id_pais = $_POST['pais'];
            $usuario->telefono = $_POST['telefono'];
            $usuario->correo = $_POST['correo']; 
            $usuario->login2();

            header('location: ../views/admin_list.php');
            die(); 
      
            break;

    #NUEVA HABITACIÓN SIMPLE.

        case 'nuevaHabitacion':

            $usuario->detalle_hab = $_POST['detalle_hab'];
            $usuario->estado = $_POST['estado'];
            $usuario->numero_habitacion = $_POST['numero_habitacion'];
            $usuario->piso = $_POST['piso'];
            $usuario->id_t_habitacion = $_POST['id_t_habitacion']; 
            $usuario->nuevaHabitacion();

            header('location: ../views/habitaciones/habitacion_simple.php');
            die();

            break;

    #NUEVA HABITACIÓN DOBLE.
     
        case 'nuevaHabitacion2':
   
            $usuario->detalle_hab = $_POST['detalle_hab'];
            $usuario->estado = $_POST['estado'];
            $usuario->numero_habitacion = $_POST['numero_habitacion'];
            $usuario->piso = $_POST['piso'];
            $usuario->id_t_habitacion = $_POST['id_t_habitacion']; 
            $usuario->nuevaHabitacion2();

            header('location: ../views/habitaciones/habitacion_doble.php');
            die();

            break;

    #NUEVA HABITACIÓN LUJOSA.

        case 'nuevaHabitacion3':
     
            $usuario->detalle_hab = $_POST['detalle_hab'];
            $usuario->estado = $_POST['estado'];
            $usuario->numero_habitacion = $_POST['numero_habitacion'];
            $usuario->piso = $_POST['piso'];
            $usuario->id_t_habitacion = $_POST['id_t_habitacion']; 
            $usuario->nuevaHabitacion3();

            header('location: ../views/habitaciones/habitacion_lujosa.php');
            die();

            break;
    #NUEVA HABITACIÓN PENTHOUSE.

        case 'nuevaHabitacion4':
    
            $usuario->detalle_hab = $_POST['detalle_hab'];
            $usuario->estado = $_POST['estado'];
            $usuario->numero_habitacion = $_POST['numero_habitacion'];
            $usuario->piso = $_POST['piso'];
            $usuario->id_t_habitacion = $_POST['id_t_habitacion']; 
            $usuario->nuevaHabitacion4();

            header('location: ../views/habitaciones/habitacion_penthouse.php');
            die();

            break;

    #combo 1.

        case 'combo1':
    echo $_POST['fecha_llegada']; die();
        $usuario->fecha_llegada = $_POST['fecha_llegada'];
        $usuario->combo1();

        header('location: ../views/usuario_lista.php');
        die();

        break;

    #VALIDACIÓN DE USUARIOS.

        case 'validarUsuario':
            
            $usuario->correo = $_POST['correo'];
            $usuario->pass = $_POST['pass'];

                if($usuario->validarUsuario() > 0){
                    header('Location: ../views/reservacion/reservation_views.php');    
                }else{ 
                    header('Location: ../views/login.php'); 
                }
                return 0;

                break;
        require_once("../views/login.php");

        case 'boletines':
            //echo $_POST['nombre']." - ".$_POST['telefono']." - ".$_POST['correo']; die();
            $usuario->nombre = $_POST['nombre'];
            $usuario->telefono = $_POST['telefono'];
            $usuario->correo = $_POST['correo'];            
        
            $usuario->boletines();
            header('location: ../index.php');
            die(); 
        
            break;
          
    }


    require_once("../models/usuario_model.php");

    $usuario = new usuario_model();
    $lista = $usuario->listarRerva_hab();

    require_once("../views/usuario_lista.php");

}

?>