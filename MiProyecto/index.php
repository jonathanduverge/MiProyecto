<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Contacto</title>
</head>
<body>
    <h2>Contacto</h2>
    <form action="guardar.php" method="POST">
        Nombre: <input type="text" name="nombre" required><br>
        Email: <input type="email" name="email" required><br>
        Mensaje: <textarea name="mensaje" required></textarea><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php
$conexion = new mysqli("base_de_datos", "usuario", "clave", "contacto_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];

$sql = "INSERT INTO mensajes (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

if ($conexion->query($sql) === TRUE) {
    echo "Mensaje guardado correctamente.";
} else {
    echo "Error: " . $sql . "
" . $conexion->error;
}

$conexion->close();
?>