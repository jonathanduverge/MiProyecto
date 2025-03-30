<?php
$apiKey = "e6c7a32f445c20c140255c90f2094d75"; // Reemplazar con la clave real
$ciudad = isset($_GET["ciudad"]) ? $_GET["ciudad"] : "Santiago";
$url = "https://api.openweathermap.org/data/2.5/weather?q=$ciudad&appid=$apiKey&units=metric&lang=es";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$respuesta = curl_exec($ch);
curl_close($ch);

$datos = json_decode($respuesta, true);

if ($datos["cod"] == 200) {
    echo "<h2>Clima en " . $datos["name"] . "</h2>";
    echo "<p><strong>Descripción:</strong> " . $datos["weather"][0]["description"] . "</p>";
    echo "<p><strong>Temperatura:</strong> " . $datos["main"]["temp"] . "°C</p>";
} else {
    echo "<p>No se pudo obtener la información del clima.</p>";
}
?>