<?php

include 'conexion_be.php';

$id = $_GET['id'];

// Verifica si existen registros en la tabla "rutina" que hacen referencia al ejercicio
$checkSQL = "SELECT COUNT(*) AS count FROM rutina WHERE IDEjercicio = '$id'";
$result = mysqli_query($conexion, $checkSQL);
$row = mysqli_fetch_assoc($result);

if ($row['count'] > 0) {
    // Hay registros en "rutina" que hacen referencia a este ejercicio
    echo "
    <script>
        alert('No se puede eliminar el ejercicio porque está siendo utilizado en una rutina.');
    </script>";
} else {
    // No hay registros en "rutina" que hagan referencia a este ejercicio, entonces se puede eliminar
    $deleteSQL = "DELETE FROM ejercicio WHERE IDEjercicio = '$id'";
    $query = mysqli_query($conexion, $deleteSQL);
    echo "
    <script>
        alert('Se elimino el ejercicio correctamente');
    </script>";
}

header("Location: ../coach_ejercicio.php");
