<?php
include 'php/conexion_be.php';

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Bucle para generar e insertar registros
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= 25; $j++) {
        $descripcion = $i . 'x' . $j; // Combina $i y $j en un solo valor
        $consulta = "INSERT INTO repeticiones (Descripcion) VALUES ('$descripcion')";
        
        if ($conexion->query($consulta) === TRUE) {
            echo "Registro insertado: $descripcion<br>";
        } else {
            echo "Error al insertar registro: " . $conexion->error;
        }
    }
}
?>
