<?php

    include 'conexion_be.php';


    $id = $_POST['id'];  // ID de la rutina
    $day = $_POST['day']; // Dia
    $ejercicio = $_POST['idEjer']; // ID del ejercicio
    $repeticion = $_POST['idRep']; // ID de la repeticion

    $sql = "INSERT INTO `rutina` (`IDRutina`, `IDUsuario`, `IDEjercicio`, `Nombre`, `IDRepeticion`, `Dia`) VALUES ('', '$id', '$ejercicio', '', '$repeticion', '$day')";
    $query = mysqli_query($conexion, $sql);

if ($query) {
    // La inserción se realizó con éxito
    // Puedes agregar código adicional o redirigir al usuario a otra página aquí
    echo '
    <script>
        alert("Se agrego un ejercicio a la rutina");
    </script>
    ';
    header("Location: ../coach_rutina.php?id=" . $id);
} else {
    // Hubo un error en la inserción
    // Puedes manejar el error de la manera que desees
    echo 'Error en la inserción: ' . mysqli_error($conexion);
}

// Cierra la conexión a la base de datos cuando hayas terminado
mysqli_close($conexion);

