<?php

include 'conexion_be.php';

$id = $_POST['id'];
$name = $_POST['name']; // Nombre debe coincidir con el nombre de la columna en tu tabla, por ejemplo, 'Nombre'
$username = $_POST['username'];
$password = $_POST['password'];
$rol = $_POST['rol'];

$sql = "UPDATE usuario SET Nombre='$name', Usuario='$username', `Contraseña`='$password', Rol='$rol' WHERE ID='$id'";

$query = mysqli_query($conexion, $sql);

if ($query) {
    Header("location: ../coach_user.php");
}
