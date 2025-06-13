<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../styles/signup.css"> 
</head>
<body>

    <div class="login-container">
    <div class="logo">
        <img src="../assets/Pharmacy_logo.jpg" alt="Pharmacy Logo">
        <h1>Pharmacy</h1>
    </div>
    <div class="login-box">
        <h2>¡Quiero registrarme!</h2>
        <form action="#" method="POST">
            <div class="form-grid">
                <!-- Datos de Persona -->
                <div class="input-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
                </div>
                <div class="input-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido" required>
                </div>
                <div class="input-group">
                    <label for="fecha_nac">Fecha de Nacimiento</label>
                    <input type="date" id="fecha_nac" name="fecha_nac" required>
                </div>
                <div class="input-group">
                    <label for="dni">DNI</label>
                    <input type="text" id="dni" name="dni" placeholder="Ingrese su DNI" required>
                </div>
                <div class="input-group">
                    <label for="sexo">Sexo</label>
                    <select id="sexo" name="sexo">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" placeholder="Ingrese su dirección" required>
                </div>
                <!-- Datos de Usuario -->
                <div class="input-group">
                    <label for="usuario">Nombre de Usuario</label>
                    <input type="text" id="usuario" name="usuario" placeholder="Crea un nombre de usuario" required>
                </div>
                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Crea una contraseña" required>
                </div>
                <div class="input-group">
                    <label for="confirm-password">Confirmar Contraseña</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Repite la contraseña" required>
                </div>
                <div class="input-group">
                    <label for="rol">Seleccionar Rol</label>
                    <select id="rol" name="rol" required>
                        <option value="">Selecciona un rol</option>
                        <option value="1">Administrador</option>
                        <option value="2">Empleado</option>
                        <option value="3">Cliente</option>
                    </select>
                </div>
            </div>
            <!-- Contactos (puedes dejarlo en una sola columna para mejor visualización) -->
            <div id="contactos-persona">
                <div class="input-group contacto-item">
                    <select name="tipo_contacto[]" required>
                        <option value="1">Teléfono</option>
                        <option value="2">Email</option>
                        <option value="3">WhatsApp</option>
                    </select>
                    <input type="text" name="contacto_valor[]" placeholder="Ingrese el valor" required>
                    <button type="button" class="btn-contacto" title="Agregar contacto" onclick="agregarContacto()">+</button>
                </div>
            </div>
                <button type="submit">Registrarse</button>

                <p>¿Ya tienes una cuenta? <a href="../views/login_web.html">Iniciar sesión</a></p>
                
            </form>
        </div>
    </div>
<script>
function agregarContacto() {
    const div = document.createElement('div');
    div.className = 'input-group contacto-item';
    div.innerHTML = `
    <select name="tipo_contacto[]" required>
        <option value="1">Teléfono</option>
        <option value="2">Email</option>
        <option value="3">WhatsApp</option>
    </select>
    <input type="text" name="contacto_valor[]" placeholder="Ingrese el valor" required>
    <button type="button" class="btn-contacto" title="Eliminar contacto" onclick="this.parentElement.remove()">−</button>
    `;
    document.getElementById('contactos-persona').appendChild(div);
}
</script>
</body>
</html>