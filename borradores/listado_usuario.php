<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="styles/listado_usuario.css">
</head>
<body>
    <div class="usuarios-container">
        <header>
            <img src="assets/Pharmacy_logo.jpg" alt="Pharmacy Logo" class="logo">
            <h1>Listado de Usuarios</h1>
        </header>
        <div class="tabla-wrapper">
            <table class="usuarios-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se deben insertar los usuarios desde PHP -->
                    <?php if(isset($usuarios) && count($usuarios) > 0): ?>
                        <?php foreach($usuarios as $usuario): ?>
                            <tr>
                                <td><?= htmlspecialchars($usuario['id']) ?></td>
                                <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                                <td><?= htmlspecialchars($usuario['nombre_usuario']) ?></td>
                                <td><?= htmlspecialchars($usuario['rol']) ?></td>
                                <td><?= htmlspecialchars($usuario['email']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5">No hay usuarios registrados.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
