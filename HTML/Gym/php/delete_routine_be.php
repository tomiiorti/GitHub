<?php
    include 'conexion_be.php';

    $id = $_POST['id'];
    $day = $_POST['day'];

    $sql = "DELETE FROM rutina WHERE IDUsuario = $id";

    if (!empty($day)) {
        $sql .= " AND rutina.Dia = $day";
    }

    $query = mysqli_query($conexion, $sql);

    if ($query) {
        echo '
                <script>
                    alert("Se copio la rutina con exito");
                </script>
            ';
            header("Location: ../coach_rutina.php?id=" . $id);

    } else {
        // Hubo un error en la eliminación
        echo "Error al eliminar la rutina: " . mysqli_error($conexion);
        header("Location: ../coach_rutina.php?id=" . $id);
    }