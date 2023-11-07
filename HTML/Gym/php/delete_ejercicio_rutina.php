<?php

    include 'conexion_be.php';
    
    $idRutina=$_GET['id'];
    $idUsuario=$_GET['userID'];


    $sql = "DELETE FROM rutina WHERE IDRutina='$idRutina'";
    $query = mysqli_query($conexion, $sql);

    if ($query) {
        echo '
        <script>
        alert("Se elimino el ejercicio de la rutina");
        </script>
        ';
        header("Location: ../coach_rutina.php?id=" . $idUsuario);
    }