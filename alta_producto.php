<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="alta_producto.css">
    <title>Alta de Productos</title>
</head>

<body>
    <?php 
    if (file_exists('cargar_listas.php')) {
        include 'cargar_listas.php';
    } else {
        echo "<p>Error: No se pudo cargar la lista de opciones.</p>";
    }
    ?>
    <div class="form-container">
        <h2>Alta de Productos</h2>
        <!-- Formulario principal para agregar productos --> 
        <form action="insert_producto.php" method="POST">
            <div class="form-grid">
                <!-- Campos básicos -->
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="codigoBarra">Código de Barra</label>
                    <input type="text" name="codigoBarra" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" name="descripcion" required>
                </div>
                
                <div class="form-group">
                    <label for="tipoProducto">Tipo de Producto</label>
                    <select name="tipoProducto" required>
                        <?php echo $opcionesTipoProducto; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select name="categoria">
                        <option value="">Ninguna</option>
                        <?php echo $opcionesCategoria; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="accionFarmaceutica">Acción Farmacéutica</label>
                    <select name="accionFarmaceutica">
                        <option value="">Ninguna</option>
                        <?php echo $opcionesAccionFarmaceutica; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alfabeta">Alfabeta</label>
                    <select name="alfabeta" required>
                        <option value="1">Sí</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="codigoRegistro">Código Nro. Registro</label>
                    <input type="text" name="codigoRegistro">
                </div>
                
                <div class="form-group">
                    <label for="droga">Droga</label>
                    <select name="droga">
                        <option value="">Ninguna</option>
                        <?php echo $opcionesDroga; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="origen">Origen</label>
                    <select name="origen" required>
                        <?php echo $opcionesOrigen; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="laboratorio">Laboratorio</label>
                    <select name="laboratorio">
                        <option value="">Ninguno</option>
                        <?php echo $opcionesLaboratorio; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <select name="marca">
                        <?php echo $opcionesMarca; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tipoVenta">Tipo de Venta</label>
                    <select name="tipoVenta" required>
                        <?php echo $opcionesTipoVenta; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="forma">Forma</label>
                    <select name="forma">
                        <?php echo $opcionesForma; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="presentacion">Presentación</label>
                    <input type="text" name="presentacion" required>
                </div>
                <div class="form-group">
                    <label for="metodoAdministracion">Método de Administración</label>
                    <select name="metodoAdministracion">
                        <?php echo $opcionesMetodoAdministracion; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="conservacion">Conservación</label>
                    <select name="conservacion">
                        <?php echo $opcionesConservacion; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="potencia">Potencia</label>
                    <input type="text" name="potencia">
                </div>
                <div class="form-group">
                    <label for="precioUnitario">Precio Unitario</label>
                    <input type="number" name="precioUnitario" required>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" required>
                </div>
                <div class="form-group">
                    <label for="cantidadMinima">Cantidad Mínima</label>
                    <input type="number" name="cantidadMinima" required>
                </div>
                
                <!-- Botón para guardar el producto -->
                <div class="form-group">
                    <button type="submit">Guardar Producto</button>
                </div>


                <!-- Sección para lotes -->
                <div class="form-group">
                    <label for="lotes">Lotes</label>
                    <select name="lotes[]" multiple>
                        <option value="">Seleccione Lotes</option>
                    </select>
                    <button type="button" id="btnAgregarLote">Agregar Nuevo</button>
                </div>

                <!-- Modal para agregar un nuevo lote -->
                <div id="modalLote" style="display:none;">
                    <div class="modal-content">
                        <h3>Agregar Nuevo Lote</h3>
                        <form action="procesar_lote.php" method="POST">
                            <!-- Campo oculto para asociar el lote con el producto -->
                            <input type="hidden" id="idProducto" name="id_producto" value="<?php echo $_GET['id_producto'] ?? ''; ?>">

                            <label for="codigoLote">Código de Lote:</label>
                            <input type="text" id="codigoLote" name="codigoLote" required><br>

                            <label for="cantidadLote">Cantidad por Lote:</label>
                            <input type="number" id="cantidadLote" name="cantidadLote" required><br>

                            <label for="fechaVencimiento">Fecha de Vencimiento:</label>
                            <input type="date" id="fechaVencimiento" name="fechaVencimiento" required><br>

                            <input type="submit" value="Guardar">
                        </form>
                        <button onclick="cerrarModal()">Cerrar</button>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <!-- Estilo del modal -->
    <style>
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0px 4px 8px rgba(0,0,0,0.2);
        }
        #modalLote {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }
    </style>

    <!-- JavaScript para manejar el modal -->
    <script>
        // Mostrar el modal al hacer clic en el botón "Agregar Nuevo Lote"
        document.getElementById('btnAgregarLote').addEventListener('click', function () {
            var modal = document.getElementById("modalLote");
            modal.style.display = "block";

            // Obtener el ID del producto de la URL si está disponible
            var idProducto = new URLSearchParams(window.location.search).get('id_producto');
            if (idProducto) {
                document.getElementById('idProducto').value = idProducto;
            } else {
                alert('Por favor, guarde un producto antes de agregar lotes.');
                modal.style.display = "none";
            }
        });

        // Cerrar el modal
        function cerrarModal() {
            var modal = document.getElementById("modalLote");
            modal.style.display = "none";
        }
    </script>
</body>
</html>
