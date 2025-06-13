<?php

require_once ('conexion.php');

class Usuario{ //establecer usuario
        private $id_usuario;
        private $nombre_usuario;
        private $contrasena;
        private $rela_persona;
        private $rela_rol;

        public function __construct($id_usuario='', $nombre_usuario='', $contrasena='', $rela_persona='', $rela_rol='') {
        $id_usuario = $id_usuario;
        $this->nombre_usuario = $nombre_usuario;
        $this->contrasena = $contrasena;
        $this->rela_persona = $rela_persona;
        $this->rela_rol = $rela_rol;
        }
        //Lo que hace el constructor es que ni bien se instancie la clase usuario, va a solicitar los parametros, obtenidos del constructor, a los cuales van a ser asignados sus atributos(en donde dice $this->)

        public function guardar(){
        $conexion = new Conexion();
        $contrasena = password_hash($this->contrasena, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO usuario (nombre_usuario, contrasena, rela_persona, rela_rol) VALUES ('$this->nombre_usuario', '$contrasena', '$this->rela_persona', '$this->rela_rol')";
        return $conexion->insertar($query);
        }

        public function actualizar(){
        $conexion = new Conexion();
        $contrasena = password_hash($this->contrasena, PASSWORD_DEFAULT);
        $query = "UPDATE usuario SET nombre_usuario = '$this->nombre_usuario', contrasena = '$contrasena', rela_persona = '$this->rela_persona', rela_rol = '$this->rela_rol' WHERE id_usuario = '$this->id_usuario'";
        return $conexion->actualizar($query);
        }


        public function validar_usuario(){
        $conexion = new Conexion();
        $query = "SELECT * FROM usuario WHERE nombre_usuario = '$this->nombre_usuario'";
        return $conexion->consultar($query);
        } 



        #Funciones getter y setter------------------------------------------------

        

        /**
         * Get the value of id_usuario
         */ 
        public function getId_usuario()
        {
                return $this->id_usuario;
        }

        /**
         * Set the value of id_usuario
         *
         * @return  self
         */ 
        public function setId_usuario($id_usuario)
        {
                $this->id_usuario = $id_usuario;

                return $this;
        }
        

        /**
         * Get the value of nombre_usuario
         */ 
        public function getNombre_usuario()
        {
                return $this->nombre_usuario;
        }

        /**
         * Set the value of nombre_usuario
         *
         * @return  self
         */ 
        public function setNombre_usuario($nombre_usuario)
        {
                $this->nombre_usuario = $nombre_usuario;

                return $this;
        }

        /**
         * Get the value of contrasena
         */ 
        public function getContrasena()
        {
                return $this->contrasena;
        }

        /**
         * Set the value of contrasena
         *
         * @return  self
         */ 
        public function setContrasena($contrasena)
        {
                $this->contrasena = $contrasena;

                return $this;
        }

        /**
         * Get the value of rela_persona
         */ 
        public function getRela_persona()
        {
                return $this->rela_persona;
        }

        /**
         * Set the value of rela_persona
         *
         * @return  self
         */ 
        public function setRela_persona($rela_persona)
        {
                $this->rela_persona = $rela_persona;

                return $this;
        }

        /**
         * Get the value of rela_rol
         */ 
        public function getRela_rol()
        {
                return $this->rela_rol;
        }

        /**
         * Set the value of rela_rol
         *
         * @return  self
         */ 
        public function setRela_rol($rela_rol)
        {
                $this->rela_rol = $rela_rol;

                return $this;
        }
}
//$usuario= new Usuario(null, 'cliente', 123, 3, 3);
//$id=$usuario->guardar();

?>  