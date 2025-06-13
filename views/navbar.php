<?php
require_once(__DIR__ . '/../models/modulos.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<head> <link rel="stylesheet" href="styles/navbar.css"> </head>

<nav class="custom-navbar">
    <div class="navbar-container">
        <a class="navbar-logo" href="index.php">
            <img src="assets/Pharmacy_logo.jpg" alt="Pharmacy Logo">
        </a>
        <ul class="navbar-links">
            <?php
            if (isset($_SESSION['roles_id'])) {
                $modulo = new Modulo();
                $modulos = $modulo->traer_modulos_por_perfil($_SESSION['roles_id']);
                if ($modulos && $modulos->num_rows > 0) {
                    while ($row = $modulos->fetch_assoc()) {
                        if ($row['modulo_nombre'] == 'Usuarios') {
                            echo '<li><a href="index.php?page=signup_admin">Registrar Usuario</a></li>';
                            echo '<li><a href="index.php?page=listado_usuario">Listado de Usuarios</a></li>';
                        }
                        if ($row['modulo_nombre'] == 'Reportes') {
                            echo '<li><a href="index.php?page=reportes">Reportes</a></li>';
                        }
                        if ($row['modulo_nombre'] == 'Proveedores') {
                            echo '<li><a href="index.php?page=proveedores">Proveedores</a></li>';
                        }
                        if ($row['modulo_nombre'] == 'Clientes') {
                            echo '<li><a href="index.php?page=clientes">Clientes</a></li>';
                        }
                        if ($row['modulo_nombre'] == 'Compras') {
                            echo '<li><a href="index.php?page=compras">Compras</a></li>';
                        }
                        if ($row['modulo_nombre'] == 'Ventas') {
                            echo '<li><a href="index.php?page=ventas">Ventas</a></li>';
                        }
                        if ($row['modulo_nombre'] == 'Fidelización') {
                            echo '<li><a href="index.php?page=fidelizacion">Fidelización</a></li>';
                        }
                        if ($row['modulo_nombre'] == 'Productos') {
                            echo '<li><a href="index.php?page=productos">Productos</a></li>';
                        }
                    }
                } else {
                    // Debug temporal: No hay módulos para este rol
                    // echo '<li>No hay módulos asignados a este rol.</li>';
                }
            }
            ?>
            <li><a href="views/salida.php" class="logout-link">Cerrar Sesión</a></li>
        </ul>
    </div>
</nav>