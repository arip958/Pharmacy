<?php

require_once ('../models/usuarios.php');
require_once ('../models/roles.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['action'])){
    if($_POST['action'] =='login'){
    $login = new LoginControlador();
    $login->ingresar();
    }
}

class LoginControlador{
    public function ingresar(){
        $usuario = new Usuario();
        $rol = new Rol();
        $usuario->setNombre_usuario($_POST['nombre_usuario']);
        
        $resultado = $usuario->validar_usuario();

        if($resultado->num_rows>0){
            while($row = $resultado->fetch_assoc()){
                if(password_verify($_POST['contrasena'], $row['contrasena'])){
                $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
                
                // Depuración: Ver valor de perfiles_id
                error_log("DEBUG rol_id: " . $row['rol_id']);

                //Obtiene el perfil inicio---------
                $resultado_roles=$rol->traer_rol($row['rela_rol']);
                    while($row_roles = $resultado_roles->fetch_assoc()){
                        $_SESSION['roles_id'] = $row_roles['rol_id'];
                        $_SESSION['roles_nombre'] = $row_roles['nombre_rol'];
                    }
                    //Obtiene el perfil fin----------

                    header('Location: ../index.php?page=listado_usuario');
                }else{header('Location: ../index.php?message=Usuario o contraseña incorrectos&status=danger');}
            }
        }else{
            header('Location: ../index.php?message=Usuario o contraseña incorrectos&status=danger');
        }
    }

    public function registrar(){}
}
?>