
<?php
echo "¡PHP funciona en el navegador!<br>";

// Incluir otro archivo PHP
include 'cargar_listas.php';

// Mostrar todas las variables definidas
echo "<pre>";
print_r(get_defined_vars());
echo "</pre>";
?>