<?php

$mysqli = new mysqli("localhost", "root", "gianeilla", "pharmacy");

if ($mysqli->connect_errno) {
    echo "Error de conexión: " . $mysqli->connect_error;
    exit();
}

// Escapar y validar los datos del formulario
$codigoLote = $mysqli->real_escape_string($_POST["codigoLote"]);
$cantidadLote = $mysqli->real_escape_string($_POST["cantidadLote"]);
$fechaVencimiento = $mysqli->real_escape_string($_POST["fechaVencimiento"]);
$id_producto = $mysqli->real_escape_string($_POST["id_producto"]);

// Validar que el producto existe
$resultado = $mysqli->query("SELECT COUNT(*) AS total FROM producto WHERE id_producto = '$id_producto'");
if ($resultado->fetch_assoc()["total"] == 0) {
    echo "Error: El producto con ID $id_producto no existe.";
    exit();
}

// Insertar lote en la base de datos
$query = "INSERT INTO lotes (rela_producto, cantidadxlote, lote_codigo, lote_vencimiento) 
          VALUES ('$id_producto', '$cantidadLote', '$codigoLote', '$fechaVencimiento')";

if (!$mysqli->query($query)) {
    echo "Error al insertar lote: " . $mysqli->error;
    exit();
}

echo "Lote agregado correctamente.";
$mysqli->close();

?>