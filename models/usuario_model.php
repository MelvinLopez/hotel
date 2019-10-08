<?php 
    require_once("conexion.php");
   
    class usuario_model{
        public $id_habitacion;
        public $id_regimen_comida;
        public $f_llegada; 
        public $f_salida; 
        public $estado; 
        public $id_usuarios;
        private $conexion = null;

        public function __construct(){
            $con = new conexion();
            $this->conexion = $con->getconexion();
        }


       

    #LISTAR USUARIOS PARA ADMINISTRADOR.

        public function listarRerva_hab(){
            $sql = "SELECT u.nombre, u.apellido, u.telefono, u.id_pais, re.id_habitacion,";
            $sql .= " re.id_regimen_comida, re.f_llegada, re.f_salida, u.correo, u.pass, re.estado";
            $sql .= " FROM reservacion re INNER JOIN usuarios u ON re.id_usuarios = u.id";

            $lista = $this->conexion->query($sql);
            return $lista->fetch_all();
        }

    #LISTA DE RESERVACIÓN DEL USUARIO.

        public function list_id(){
            session_start();
            $userId = $_SESSION['id_usuarios'];
            $sql = "SELECT * FROM usuarios WHERE id = $userId";

            $lista = $this->conexion->query($sql);  
            return $lista->fetch_all();
        }

        public function list(){
            session_start();
            $userId = $_SESSION['id_usuarios'];
            $sql = "SELECT * FROM reservacion WHERE id_usuarios = $userId";

            $lista1 = $this->conexion->query($sql);
             return $lista1->fetch_all();
        }

    #CÓDIGO PARA LA RESERVACIÓN.

        public function agregar(){
            session_start();
            $userId = $_SESSION['id_usuarios'];
            $sql = "INSERT INTO reservacion (id_habitacion, id_regimen_comida, f_llegada, f_salida, id_usuarios, id_t_habitacion) VALUES ($this->id_habitacion, $this->id_regimen_comida,'$this->f_llegada', '$this->f_salida',$userId, '$this->id_t_habitacion')";
            
            $this->conexion->query($sql);
        }

    #CÓDIGO PARA CREAR UN NUEVO USUARIO.

        public function login(){
            $sql = "SELECT * FROM usuarios WHERE correo = '$this->correo'";
            $stmt = $this->conexion->query($sql);

            if($stmt->num_rows == 0){
                $sql = "INSERT INTO usuarios (nombre, apellido, telefono, correo, pass, id_tusuario, id_pais)";
                $sql .= " VALUES ('$this->nombre', '$this->apellido', '$this->telefono', '$this->correo',";
                $sql .= " '$this->pass', 1,$this->id_pais)";

                $this->conexion->query($sql);
            }
        }
        
        public function login2(){
            $sql = "SELECT * FROM usuarios WHERE correo = '$this->correo'";
            $stmt = $this->conexion->query($sql);

            if($stmt->num_rows == 0){
            $sql = "INSERT INTO usuarios (nombre, apellido, telefono, correo, pass, id_tusuario, id_pais)";
            $sql .= " VALUES ('$this->nombre', '$this->apellido', '$this->telefono', '$this->correo',";
            $sql .= " '$this->pass', 2,'$this->id_pais')";

            $this->conexion->query($sql);
            }

        }

    #CÓDIGO PARA LA VALIDACIÓN DEL USUARIO.

        public function validarUsuario(){
            $sql = "SELECT * FROM usuarios WHERE correo = '$this->correo'";
            $stmt = $this->conexion->query($sql);
            $fila = $stmt->fetch_all();

                if(count($fila) > 0){
                    if(password_verify($this->pass, $fila[0][5])){
                        
                        session_start();
                        $_SESSION['id_usuarios'] = $fila[0][0];
                        $_SESSION['nombre'] = $fila[0][1];
                        $_SESSION['correo'] = $fila[0][4];
                        $_SESSION['id_tusuario'] = $fila[0][6];

                        return 1;
                    }else{    
                        return 0;
                    }
                }
                return 0;
        }

        
        public function eliminar(){
           
            $sql = "DELETE FROM detalle_re WHERE id_reservacion = ?";
            $stml = $this->conexion->prepare($sql);
            $stml->bind_param('i', $this->id);
            $stml->execute();
         
            $sql = "DELETE FROM reservacion WHERE id = ?";
            $stml = $this->conexion->prepare($sql);
            $stml->bind_param('i', $this->id);
            $stml->execute();
        }

        public function eliminar_admin(){         
            $sql = "DELETE FROM usuarios WHERE id = ?";
            $stml = $this->conexion->prepare($sql);
            $stml->bind_param('i', $this->id);
            $stml->execute();
        }

        public function editar(){
            $sql = "UPDATE reservacion SET  id_regimen_comida = ?, f_llegada = ?, f_salida = ? WHERE id = ?";
            $stml = $this->conexion->prepare($sql);
            $stml->bind_param('issi', $this->id_regimen_comida, $this->f_llegada, $this->f_salida, $this->id);
            $stml->execute();
        }

        
            public function editarinfoID(){
                $sql = "UPDATE usuarios SET  nombre = ?, apellido = ?, telefono = ?, id_pais = ?, correo = ?  WHERE id = ?";
                $stml = $this->conexion->prepare($sql);
                $stml->bind_param('sssisi', $this->nombre, $this->apellido, $this->telefono, $this->id_pais, $this->correo, $this->id);
                $stml->execute();
            }
    #ELIMINACIÓN DE HABITACIÓN SIMPLE.

        public function eliminar_cuarto(){
            $sql = "DELETE FROM habitacion WHERE id = ?";
            $stml = $this->conexion->prepare($sql);
            $stml->bind_param('i', $this->id);
            $stml->execute();
        }

    #ELIMINACIÓN DE HABITACIÓN DOBLE.

        public function eliminar_cuarto2(){
            $sql = "DELETE FROM habitacion WHERE id = ?";
            $stml = $this->conexion->prepare($sql);
            $stml->bind_param('i', $this->id);
            $stml->execute();
        }

    #ELIMINACIÓN DE HABITACIÓN LUJOSA.

        public function eliminar_cuarto3(){
            $sql = "DELETE FROM habitacion WHERE id = ?";
            $stml = $this->conexion->prepare($sql);
            $stml->bind_param('i', $this->id);
            $stml->execute();
        }

    #ELIMINACIÓN DE HABITACIÓN PENTHOUSE.

        public function eliminar_cuarto4(){
            $sql = "DELETE FROM habitacion WHERE id = ?";
            $stml = $this->conexion->prepare($sql);
            $stml->bind_param('i', $this->id);
            $stml->execute();
        }

        public function list_admin(){
            $sql = "SELECT * FROM usuarios ";
            $lista = $this->conexion->query($sql);

            return $lista->fetch_all();
        }

        public function admin_infoID(){
            $usuario->id = $_GET['id'];
            $sql = "SELECT * FROM reservacion WHERE id = $usuario";
            $lista = $this->conexion->prepare($sql);

            return $lista->fetch_all();
        }
    
        public function aprovar(){
            $sql = "UPDATE reservacion SET estado = ? WHERE id = ?";
            $stml = $this->conexion->prepare($sql);
            $stml->bind_param('si',$this->estado,$this->id);
            $stml->execute();
        }

          public function aprovar_cuarto(){
            $sql = "UPDATE habitacion SET estado = ? WHERE id = ?";
            $stml = $this->conexion->prepare($sql);
            $stml->bind_param('si',$this->estado,$this->id);
            $stml->execute();
        }

        public function habilitar_cuarto(){
            $sql = "UPDATE habitacion SET estado = ? WHERE id = ?";
            $stml = $this->conexion->prepare($sql);
            $stml->bind_param('si',$this->estado,$this->id);
            $stml->execute();
        }

        public function admin_re(){
            $sql = "SELECT * FROM habitacion ";
            $fila = $this->conexion->prepare($sql);

            return $fila->fetch_all();
        }

    #NUEVA HAB. SIMPLE.

        public function nuevaHabitacion(){
            $sql = "INSERT INTO habitacion (detalle_hab, estado, numero_habitacion, piso, id_t_habitacion)";
            $sql .= " VALUES ('$this->detalle_hab', '$this->estado', '$this->numero_habitacion', '$this->piso',";
            $sql .= " '$this->id_t_habitacion')";
            $this->conexion->query($sql);
        }
    
    #NUEVA HAB. DOBLE.

        public function nuevaHabitacion2(){
            $sql = "INSERT INTO habitacion (detalle_hab, estado, numero_habitacion, piso, id_t_habitacion)";
            $sql .= " VALUES ('$this->detalle_hab', '$this->estado', '$this->numero_habitacion', '$this->piso',";
            $sql .= " '$this->id_t_habitacion')";
            $this->conexion->query($sql);
        }
        
    #NUEVA HAB. LUJOSA.

        public function nuevaHabitacion3(){
            $sql = "INSERT INTO habitacion (detalle_hab, estado, numero_habitacion, piso, id_t_habitacion)";
            $sql .= " VALUES ('$this->detalle_hab', '$this->estado', '$this->numero_habitacion', '$this->piso',";
            $sql .= " '$this->id_t_habitacion')";
            $this->conexion->query($sql);
        }
          
    #NUEVA HAB. PENTHOUSE.
       
        public function nuevaHabitacion4(){
            $sql = "INSERT INTO habitacion (detalle_hab, estado, numero_habitacion, piso, id_t_habitacion)";
            $sql .= " VALUES ('$this->detalle_hab', '$this->estado', '$this->numero_habitacion', '$this->piso',";
            $sql .= " '$this->id_t_habitacion')";
            $this->conexion->query($sql);
        }

        public function lista_thabitacion(){
            $sql = "SELECT * FROM t_habitacion ";
            $fila = $this->conexion->prepare($sql);

            return $fila->fetch_all();
        }

    #SERVICIOS EXTRAS.

        public function taxi24(){
   
            $sql = "INSERT INTO detalle_re (id_reservacion, id_servi_extra) VALUES ('$this->id', 1)";
            $this->conexion->query($sql);
        }

        public function comida24(){
        
            $sql = "INSERT INTO detalle_re (id_reservacion, id_servi_extra) VALUES ('$this->id', 2)";
            $this->conexion->query($sql);
        }

        public function servicio24(){
        
            $sql = "INSERT INTO detalle_re (id_reservacion, id_servi_extra) VALUES ('$this->id', 3)";
            $this->conexion->query($sql);
        }

        public function spa24(){
        
            $sql = "INSERT INTO detalle_re (id_reservacion, id_servi_extra) VALUES ('$this->id', 4)";
            $this->conexion->query($sql);
        }

        public function gym24(){
        
            $sql = "INSERT INTO detalle_re (id_reservacion, id_servi_extra) VALUES ('$this->id', 5)";
            $this->conexion->query($sql);
        }

        public function casino24(){
        
            $sql = "INSERT INTO detalle_re (id_reservacion, id_servi_extra) VALUES ('$this->id', 6)";
            $this->conexion->query($sql);
        }

    #ELIMINAR SERVICIOS EXTRAS.

        public function eliminar_extra(){

            $sql = "DELETE FROM detalle_re WHERE id = ?";
            $stml = $this->conexion->prepare($sql);
            $stml->bind_param('i', $this->id);
            $stml->execute();
        }

        public function boletines(){
            
            $sql = "INSERT INTO boletines (nombre, telefono, correo) VALUES ('$this->nombre', '$this->telefono','$this->correo')";
            $this->conexion->query($sql);
        }



}


?>