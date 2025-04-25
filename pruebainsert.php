<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Formulario recibido con los siguientes datos:<br>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
} else {
    echo "Este archivo debe ser accedido desde un formulario.";
}
?>