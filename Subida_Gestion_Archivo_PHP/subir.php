<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    $archivo = $_FILES["archivo"];
    $nombreOriginal = basename($archivo["name"]);
    $rutaDestino = "uploads/" . $nombreOriginal;
    $tipo = $archivo["type"];

    // Verificar tipo de archivo permitido
    $extensionesPermitidas = ["image/png", "image/jpeg", "application/pdf"];
    if (!in_array($tipo, $extensionesPermitidas)) {
        die("Tipo de archivo no permitido.");
    }

    // Mover archivo a la carpeta de destino
    if (move_uploaded_file($archivo["tmp_name"], $rutaDestino)) {
        $sql = "INSERT INTO archivos (nombre_original, ruta, tipo) VALUES ('$nombreOriginal', '$rutaDestino', '$tipo')";
        $conn->query($sql);
        echo "Archivo subido exitosamente.";
    } else {
        echo "Error al subir el archivo.";
    }
}
?>