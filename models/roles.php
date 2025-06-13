<?php
require_once ('conexion.php');

class Rol{
    private $id_rol;
    private $nombre_rol;

    public function __construct($id_rol='', $nombre_rol=''){
        $this->id_rol = $id_rol;
        $this->nombre_rol = $nombre_rol;
    }

    public function traer_roles(){
        $conexion = new Conexion();
        $query = "SELECT * FROM rol";
        return $conexion->consultar($query);
    }

    public function traer_rol($id_rol){
        $conexion = new Conexion();
        $query = "SELECT id_rol as rol_id, nombre_rol FROM rol WHERE id_rol = '$id_rol'";
        return $conexion->consultar($query);
    }

    public function guardar(){
        $conexion = new Conexion();
        $query = "INSERT INTO rol (nombre_rol) VALUES ('$this->nombre_rol')";
        return $conexion->insertar($query);
    }
}
?>