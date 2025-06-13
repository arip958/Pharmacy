<?php
require_once ('conexion.php');
class Modulo{
    private $id_modulo;
    private $modulo_nombre;


    public function __construct($id_modulo='', $modulo_nombre=''){
        $this->id_modulo = $id_modulo;
        $this->modulo_nombre = $modulo_nombre;
    }

    public function traer_modulos_por_perfil($rol_id){
        $conexion = new Conexion();
        $query= "SELECT modulo.* FROM modulo INNER JOIN rol_modulo ON rol_modulo.modulo_id = modulo.id_modulo WHERE rol_modulo.rol_id=".$rol_id;
        return $conexion->consultar($query);

    }
}
?>