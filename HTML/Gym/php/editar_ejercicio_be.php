<?php

include 'conexion_be.php';

$id = $_POST['id'];
$name = $_POST['name']; // Nombre debe coincidir con el nombre de la columna en tu tabla, por ejemplo, 'Nombre'
$img = $_POST['img'];
$desc = $_POST['desc'];

$sql = "UPDATE ejercicio SET Nombre='$name', Imagen='$img', Descripcion='$desc' WHERE IDEjercicio='$id'";

$query = mysqli_query($conexion, $sql);

if ($query) {
    Header("location: ../coach_ejercicio.php");
}
// no te deja modificar el ejercicio si no subis una imagen, se tiene que arreglar