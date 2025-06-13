<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once ('models/usuarios.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}else{echo 'Ya inició sesión previamente.';}
//print_r($_SESSION);
?>

<!DOCTYPE html>

<html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Pharmacy</title>
            <link href="assets/css/bootstrap.min.css" rel="stylesheet"> 
    </head>

<body>

    <!-- Contenido del Navbar- Inicio-->
    <?php
        if (isset($_SESSION['roles_nombre'])) {
            include('views/navbar.php');
        }
    ?>
    <!-- Contenido del Navbar- Fin-->
    
    <?php
        if(isset($_GET['message'])){
            echo '<div class="alert alert-'.$_GET['status'].'" role="alert">'.$_GET['message'].'</div>';
    }
    ?>

    <div class="container">
        <?php
            if(isset($_GET['page'])){
                if(isset($_SESSION['nombre_usuario'])){
                    if ($_GET['page'] == 'login_sistema'
                        || $_GET['page'] == 'listado_usuario'
                        || $_GET['page'] == 'salida'
                        || $_GET['page'] == 'signup_admin'){
                        include('views/'.$_GET['page'].'.php');
                    } else {
                        include('views/404.php');
                    }
                }else{include('views/403.php');}
            }else{
                if(isset($_SESSION['nombre_usuario'])){
                    include('views/listado_usuario.php');
                }else{
                    include ('views/login_sistema.php');
                }
                
            }
        ?>
    </div>

    <!--------------Bootstrap JavaScript ------------------>
    <!-- jquery -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>