<?php
    include 'conexion_be.php';

    $id = $_POST['id'];
    $idUser = $_POST['idUser'];
    $day = $_POST['day'];
    $dayDest = $_POST['dayDest'];

    // Primero, obtén los registros que deseas copiar
    $sql = "SELECT IDEjercicio, Nombre, IDRepeticion, Dia FROM rutina WHERE IDUsuario = $idUser";

    if (!empty($day)) {
        $sql .= " AND rutina.Dia = $day";
        $result = $conexion->query($sql);
        if ($result) {
            // Si la consulta se ejecutó correctamente
            while ($row = $result->fetch_assoc()) {
                // Ahora, inserta los registros para el nuevo usuario (USUARIO2)
                $insertQuery = "INSERT INTO rutina (IDUsuario, IDEjercicio, Nombre, IDRepeticion, Dia) 
                                VALUES ($id, {$row['IDEjercicio']}, '{$row['Nombre']}', {$row['IDRepeticion']}, $dayDest)";
                
                // Ejecuta la consulta de inserción para cada registro
                $insertResult = $conexion->query($insertQuery);
    
                if (!$insertResult) {
                    // Si la inserción falla, puedes mostrar un mensaje de error
                    echo "Error al copiar los registros: " . $conexion->error;
                    exit; // Termina la ejecución del script
                }
            }
    
            // Si todo salió bien, puedes mostrar un mensaje de éxito
            echo '
                <script>
                    alert("Se copio la rutina con exito");
                </script>
            ';
            header("Location: ../coach_rutina.php?id=" . $id);
        } else {
            // Si la consulta falla, muestra un mensaje de error
            echo "Error al obtener los registros: " . $conexion->error;
        }
    } else{
        $result = $conexion->query($sql);
        if ($result) {
            // Si la consulta se ejecutó correctamente
            while ($row = $result->fetch_assoc()) {
                // Ahora, inserta los registros para el nuevo usuario (USUARIO2)
                $insertQuery = "INSERT INTO rutina (IDUsuario, IDEjercicio, Nombre, IDRepeticion, Dia) 
                                VALUES ($id, {$row['IDEjercicio']}, '{$row['Nombre']}', {$row['IDRepeticion']}, {$row['Dia']})";
                
                // Ejecuta la consulta de inserción para cada registro
                $insertResult = $conexion->query($insertQuery);
    
                if (!$insertResult) {
                    // Si la inserción falla, puedes mostrar un mensaje de error
                    echo "Error al copiar los registros: " . $conexion->error;
                    exit; // Termina la ejecución del script
                }
            }
    
            // Si todo salió bien, puedes mostrar un mensaje de éxito
            echo '
                <script>
                    alert("Se copio la rutina con exito");
                </script>
            ';
            header("Location: ../coach_rutina.php?id=" . $id);
        } else {
            // Si la consulta falla, muestra un mensaje de error
            echo "Error al obtener los registros: " . $conexion->error;
        }
    }
    $conexion->close();
?>
