<?php
include("db.php");
$resultado = $conexion->query("SELECT * FROM archivos");

echo "<h2>Archivos Subidos</h2>";
while ($fila = $resultado->fetch_assoc()) {
    echo "<p><a href='" . $fila["ruta"] . "' download>" . $fila["nombre_original"] . "</a></p>";
}
?>