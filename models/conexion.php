<?php 

//Autores:
//Fecha:

#CONEXIÓN A LA DE DATOS.

    class conexion {
        private $host = "localhost";
        private $usuario = "root";
        private $clave = "";
        private $db= "hotel";
        private $con = null;

        public function __construct(){
            $this->con = new mysqli($this->host, $this->usuario, $this->clave, $this->db);
        }

        public function getConexion(){
            return $this->con;
        }

        public function setConexion(){
            $this->con->close();
        }
}

?>