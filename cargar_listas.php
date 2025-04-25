<?php
$mysqli = new mysqli("localhost", "root", "gianeilla", "pharmacy");

if ($mysqli->connect_errno) {
    echo "Error de conexión: " . $mysqli->connect_error;
    exit();
}

function cargarOpciones($tabla, $idColumna, $descripcionColumna) {
    global $mysqli;
    $query = "SELECT $idColumna, $descripcionColumna FROM $tabla";
    $resultado = $mysqli->query($query);

    if (!$resultado) {
        error_log("Error al cargar opciones: " . $mysqli->error);
        exit("Ocurrió un error, contacte al administrador.");
    }

    $opciones = "";
    while ($fila = $resultado->fetch_assoc()) {
        $opciones .= "<option value='{$fila[$idColumna]}'>{$fila[$descripcionColumna]}</option>";
    }

    return $opciones;
}

// Cargar opciones para los select
$opcionesTipoProducto = cargarOpciones("tipo_producto", "id_tipo_producto", "tipo_producto_descri");
$opcionesCategoria = cargarOpciones("categoria", "id_categoria", "categoria_descri");
$opcionesLaboratorio = cargarOpciones("laboratorio", "id_laboratorio", "laboratorio_descri");
$opcionesDroga = cargarOpciones("droga", "id_droga", "droga_descri");
$opcionesOrigen = cargarOpciones("origen", "id_origen", "origen_descri");
$opcionesMarca = cargarOpciones("marca", "id_marca", "marca_descri");
$opcionesTipoVenta = cargarOpciones("tipo_venta", "id_tipoventa", "tipoventa_descri");
$opcionesForma = cargarOpciones("forma", "id_forma", "forma_descri");
$opcionesMetodoAdministracion = cargarOpciones("metodo_administracion", "id_metodo_administracion", "metodo_administracion_descri");
$opcionesConservacion = cargarOpciones("conservacion", "id_conservacion", "conservacion_descri");
?>
