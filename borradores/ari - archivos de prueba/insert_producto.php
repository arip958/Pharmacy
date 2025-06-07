<?php
session_start(); // Inicia la sesión para manejar mensajes

$mysqli = new mysqli("localhost", "root", "gianeilla", "pharmacy");

if ($mysqli->connect_errno) {
    $_SESSION['message'] = "Error de conexión: " . $mysqli->connect_error;
    $_SESSION['message_type'] = "error";
    header("Location: alta_producto.php");
    exit();
}

// Obtener la fecha actual
$fecha_alta = date("Y-m-d");
$estado = "Activo";

// Validar y asignar valores a las variables
$nombre = isset($_REQUEST["nombre"]) ? $mysqli->real_escape_string($_REQUEST["nombre"]) : '';
$codigoBarra = isset($_REQUEST["codigoBarra"]) ? $mysqli->real_escape_string($_REQUEST["codigoBarra"]) : '';
$descripcion = isset($_REQUEST["descripcion"]) ? $mysqli->real_escape_string($_REQUEST["descripcion"]) : '';
$tipoProducto = isset($_REQUEST["tipoProducto"]) ? $mysqli->real_escape_string($_REQUEST["tipoProducto"]) : '';
$precioUnitario = isset($_REQUEST["precioUnitario"]) ? $mysqli->real_escape_string($_REQUEST["precioUnitario"]) : 0;
$cantidad = isset($_REQUEST["cantidad"]) ? $mysqli->real_escape_string($_REQUEST["cantidad"]) : 0;
$cantidadMinima = isset($_REQUEST["cantidadMinima"]) ? $mysqli->real_escape_string($_REQUEST["cantidadMinima"]) : 0;
$alfabeta = isset($_REQUEST["alfabeta"]) ? $mysqli->real_escape_string($_REQUEST["alfabeta"]) : '';
$codigoRegistro = isset($_REQUEST["codigoRegistro"]) ? $mysqli->real_escape_string($_REQUEST["codigoRegistro"]) : '';
$origen = isset($_REQUEST["origen"]) ? $mysqli->real_escape_string($_REQUEST["origen"]) : '';
$tipoVenta = isset($_REQUEST["tipoVenta"]) ? $mysqli->real_escape_string($_REQUEST["tipoVenta"]) : '';
$presentacion = isset($_REQUEST["presentacion"]) ? $mysqli->real_escape_string($_REQUEST["presentacion"]) : '';
$potencia = isset($_REQUEST["potencia"]) ? $mysqli->real_escape_string($_REQUEST["potencia"]) : '';

// Campos opcionales
$categoria = !empty($_REQUEST["categoria"]) ? "'" . $mysqli->real_escape_string($_REQUEST["categoria"]) . "'" : "NULL";
$accionFarmaceutica = !empty($_REQUEST["accionFarmaceutica"]) ? "'" . $mysqli->real_escape_string($_REQUEST["accionFarmaceutica"]) . "'" : "NULL";
$droga = !empty($_REQUEST["droga"]) ? "'" . $mysqli->real_escape_string($_REQUEST["droga"]) . "'" : "NULL";
$laboratorio = !empty($_REQUEST["laboratorio"]) ? "'" . $mysqli->real_escape_string($_REQUEST["laboratorio"]) . "'" : "NULL";
$marca = !empty($_REQUEST["marca"]) ? "'" . $mysqli->real_escape_string($_REQUEST["marca"]) . "'" : "NULL";
$forma = !empty($_REQUEST["forma"]) ? "'" . $mysqli->real_escape_string($_REQUEST["forma"]) . "'" : "NULL";
$metodoAdministracion = !empty($_REQUEST["metodoAdministracion"]) ? "'" . $mysqli->real_escape_string($_REQUEST["metodoAdministracion"]) . "'" : "NULL";
$conservacion = !empty($_REQUEST["conservacion"]) ? "'" . $mysqli->real_escape_string($_REQUEST["conservacion"]) . "'" : "NULL";

// Insertar producto en la base de datos
$query = "INSERT INTO producto (
    producto_nombre, producto_codigobarra, producto_preciounitario, producto_cantidad, 
    producto_cantidadmin, producto_descripcion, producto_fecha_alta, producto_estado, 
    producto_cod_nroregistro, producto_potencia, producto_presentacion,
    rela_tipoproducto, rela_tipoventa, rela_alfabeta, rela_accion_farmaceutica,
    rela_categoria, rela_marca, rela_droga, rela_forma, rela_metodo_administracion,
    rela_origen, rela_laboratorio, rela_conservacion
) VALUES (
    '$nombre', '$codigoBarra', '$precioUnitario', '$cantidad', 
    '$cantidadMinima', '$descripcion', '$fecha_alta', '$estado', 
    '$codigoRegistro', '$potencia', '$presentacion', 
    '$tipoProducto', '$tipoVenta', '$alfabeta', $accionFarmaceutica,
    $categoria, $marca, $droga, $forma, $metodoAdministracion,
    '$origen', $laboratorio, $conservacion
)";

if (!$mysqli->query($query)) {
    $_SESSION['message'] = "Error al insertar producto: " . $mysqli->error;
    $_SESSION['message_type'] = "error";
    header("Location: alta_producto.php");
    exit();
}

// Recuperar el ID del producto recién creado
$id_producto = $mysqli->insert_id;

// Insertar lotes si existen
if (!empty($_REQUEST["lotes"])) {
    foreach ($_REQUEST["lotes"] as $lote) {
        $codigoLote = isset($lote["codigoLote"]) ? $mysqli->real_escape_string($lote["codigoLote"]) : '';
        $cantidadLote = isset($lote["cantidadLote"]) ? $mysqli->real_escape_string($lote["cantidadLote"]) : 0;
        $fechaVencimiento = isset($lote["fechaVencimiento"]) ? $mysqli->real_escape_string($lote["fechaVencimiento"]) : '';

        $queryLote = "INSERT INTO lotes (rela_producto, lote_codigo, cantidadxlote, lote_vencimiento)
                      VALUES ($id_producto, '$codigoLote', $cantidadLote, '$fechaVencimiento')";

        if (!$mysqli->query($queryLote)) {
            $_SESSION['message'] = "Error al insertar lote: " . $mysqli->error;
            $_SESSION['message_type'] = "error";
            header("Location: alta_producto.php");
            exit();
        }
    }
}

// Si todo fue exitoso
$_SESSION['message'] = "Producto guardado exitosamente.";
$_SESSION['message_type'] = "success";
header("Location: alta_producto.php");
$mysqli->close();
?>
