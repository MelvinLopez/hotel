<?php
    require_once("conexion.php");

  class Tipo_usuario{
    private $conexion = null;

        public function __construct(){

            $con = new conexion();
            $this->conexion = $con->getconexion();
        }

        public function getTipopais(){

            $fila = $this->conexion->query("SELECT * FROM pais");

            return $fila->fetch_all();
        }

        public function gethabitacion(){

            $fila = $this->conexion->query("SELECT * FROM habitacion");

            return $fila->fetch_all();
        }

        public function getcomida(){

            $fila = $this->conexion->query("SELECT * FROM regimen_comida");

            return $fila->fetch_all();
        }

        public function getT_habitacion(){

            $fila = $this->conexion->query("SELECT * FROM t_habitacion");

            return $fila->fetch_all();
        }

        public function hab_simple(){

            $fila = $this->conexion->query("SELECT * FROM habitacion WHERE id_t_habitacion = 1 AND estado = 'D'");

            return $fila->fetch_all();
        }

        public function hab_lujosa(){

            $fila = $this->conexion->query("SELECT * FROM habitacion WHERE id_t_habitacion = 2  AND estado = 'D'");

            return $fila->fetch_all();
        }

        public function hab_penthouse(){

            $fila = $this->conexion->query("SELECT * FROM habitacion WHERE id_t_habitacion = 3  AND estado = 'D'");

            return $fila->fetch_all();
        }

        public function hab_doble(){

            $fila = $this->conexion->query("SELECT * FROM habitacion WHERE id_t_habitacion = 4  AND estado = 'D'");

            return $fila->fetch_all();
        }

       public function listarReserva_hab(){

            $fila = $this->conexion->query("SELECT u.nombre, u.apellido, u.telefono, u.id_pais, re.id_habitacion, re.id_regimen_comida, re.f_llegada, re.f_salida, u.correo, u.pass, re.estado FROM reservacion re INNER JOIN usuarios u ON re.id_usuarios = u.id");

            return $fila->fetch_all();   
        }

        public function list_id(){

            $userId = $_SESSION['id_usuarios'];
            $sql = "SELECT * FROM usuarios WHERE id = $userId";
            $stmt = $this->conexion->query($sql);

            return $stmt->fetch_all();
  
        }

        public function list(){
            
            $userId = $_SESSION['id_usuarios'];
            $sql = "SELECT * FROM reservacion WHERE id_usuarios = $userId";
            $fila = $this->conexion->query($sql);
  
            return $fila->fetch_all();
  
        }

        public function list_admin(){

            $sql = "SELECT * FROM usuarios";
            $stmt = $this->conexion->query($sql);

            return $stmt->fetch_all();
        }

       public function admin_infoID(){

            $sql = "SELECT * FROM reservacion";
            $fila = $this->conexion->query($sql);

            return $fila->fetch_all();
        }

        public function admin_re(){

            $sql = "SELECT * FROM habitacion";
            $fila = $this->conexion->query($sql);

            return $fila->fetch_all();
        }

        public function lista_thabitacion(){

            $sql = "SELECT * FROM t_habitacion";
            $fila = $this->conexion->query($sql);

            return $fila->fetch_all();
        }

        public function servicios(){

            $fila = $this->conexion->query("SELECT * FROM servi_extra ");
   
            return $fila->fetch_all();
        }
        
        public function detalle_re($id){

            $fila = $this->conexion->query("SELECT * FROM detalle_re WHERE id_reservacion = ".$id);

            return $fila->fetch_all();
        }

        

        public function factura($id){
            $sql = "SELECT r.id, CONCAT(u.nombre, ' ', u.apellido) usuario, h.numero_habitacion, 
                        h.detalle_hab, c.detalle, r.f_llegada, r.f_salida, t.precio
                    FROM reservacion r
                    INNER JOIN habitacion h ON r.id_habitacion = h.id
                    INNER JOIN usuarios u ON r.id_usuarios = u.id
                    INNER JOIN regimen_comida c ON r.id_regimen_comida = c.id
                    INNER JOIN t_habitacion t ON h.id_t_habitacion = t.id
                    WHERE r.id = $id";
            $data = $this->conexion->query($sql);
            $row = $data->fetch_all();

            $dias = $this->diferenciaDias($row[0][5], $row[0][6]);
            $precio_h = ($dias * $row[0][7]);

            $content = '<br><p align="center"><b>PACIFIC HOTEL</b></p>Detalle de Reservación:<br><hr>';

            $content .= '<br>'.
                            '<b>Código :</b> '.$row[0][0].' <br>'.
                            '<b>Usuario :</b> '.$row[0][1].' <br><br>'.

                            '<b>Fecha de Llegada :</b> '.$row[0][5].' <br>'.
                            '<b>Fecha de Salida :</b> '.$row[0][6].' <br><br>'.

                            '<b>Número Habitación :</b> '.$row[0][2].' <br>'.
                            '<b>Detalle Habitación :</b> '.$row[0][3].' <br><br>'.

                            '<b>Detalle Comida :</b> '.utf8_encode($row[0][4]).' <br>'.
                            '<b>Precio Habitación :</b> '.$row[0][7].' <br>'.

                            '<b>Precio Estadía :</b> '.$precio_h;

            

            $query = "SELECT d.id, s.descripcion, s.precio 
                        FROM detalle_re d 
                        INNER JOIN servi_extra s ON d.id_servi_extra = s.id
                        WHERE d.id_reservacion = $id";
            $detalle = $this->conexion->query($query);

            $precio = 0;
            if($detalle->num_rows > 0){
                $content .= '<br><br><br><p align="left">Servicios Extras</p><br><hr>';

                foreach ($detalle->fetch_all() as $v) {
                    $content .= '<br> '.$v[0].' - '.$v[1].' <b>Precio :$</b>'.$v[2].'<br>';
                    $precio += $v[2];
                }
            }
            $pagar = $precio_h + $precio;
            $content .= '<br><br><br><hr><p align="left"><b>Total a Pagar: $'.$pagar.'</b></p><br>';

            return $content; 
                        
        }

        public function diferenciaDias($inicio, $fin) {
            $inicio = strtotime($inicio);
            $fin = strtotime($fin);
            $dif = $fin - $inicio;
            $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
            return ceil($diasFalt);
        }
    }

?>