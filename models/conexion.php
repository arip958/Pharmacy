<?php
class Conexion {
    private $_con;
    private $servidor;
    private $usuario;
    private $password;
    private $base_datos;
    
    public function __construct(){
        $this->servidor = '127.0.0.1';
        $this->usuario = 'root';
        $this->password = 'gianeilla';
        $this->base_datos = 'pharmacy';
    }     

    public function conectar(){
        $this->_con = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);
    }

    public function desconectar(){
        $this->_con->close();
    }

    public function consultar($query){ 
        $this->conectar(); //establecemos la conexión para la consulta
        $resultado = $this->_con->query($query); // guardamos el resultado
        $this->desconectar();
        return $resultado; //obtenemos el resultado
    }

    public function insertar($query){
        $this->conectar(); //establecemos la conexión para el insert
        $this->_con->query($query); //ejecutamos la query
        $id= $this->_con->insert_id; //obtenemos el último id
        $this->desconectar(); //realizamos la desconexión
        return $id; //retornamos el id
    }

    public function actualizar($query){
        $this->conectar();
        $resultado = $this->_con->query($query);
        $this->desconectar();
        return $resultado;
    }
}
?>