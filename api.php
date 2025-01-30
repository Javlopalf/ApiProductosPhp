<?php
// Establece el encabezado para indicar que se devolverá un JSON
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


// Lee el archivo JSON productos.json
$json_data = file_get_contents('productos.json');

// Decodifica el JSON a un array asociativo de PHP
$productos = json_decode($json_data, true);

// Verifica si el archivo JSON se cargó correctamente
if ($productos === null) {
    echo json_encode(["error" => "No se pudo cargar el archivo JSON"]);
    exit;
}

// Selecciona un producto aleatorio
$producto_aleatorio = $productos[array_rand($productos)];

// Devuelve el producto aleatorio como JSON
echo json_encode($producto_aleatorio, JSON_PRETTY_PRINT);
?>
