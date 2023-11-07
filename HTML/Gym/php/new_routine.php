<?php
include 'conexion_be.php';

$name = $_POST['name'];
$desc = $_POST['desc'];

// Verificamos si se ha subido una imagen
if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
    $imgName = $_FILES['img']['name'];
    $imgTempPath = $_FILES['img']['tmp_name'];

    // Ruta donde se guardará la imagen
    $uploadDirectory = "../img_ejercicio/";
    $imgPath = $uploadDirectory . $imgName;

    // Movemos el archivo cargado a la carpeta destino
    if (move_uploaded_file($imgTempPath, $imgPath)) {
        // El archivo se ha cargado correctamente
        // Ahora insertamos la URL de la imagen en la base de datos
        $query = "INSERT INTO ejercicio(Nombre, Imagen, Descripcion) VALUES ('$name', '$imgPath', '$desc')";
        $ejecutar = mysqli_query($conexion, $query);

        if ($ejecutar) {
            echo '
            <script>
                alert("Ejercicio almacenado exitosamente");
                window.location = "../coach_ejercicio.php";
            </script>
            ';
        } else {
            echo '
            <script>
                alert("Inténtalo de nuevo, ejercicio no almacenado");
                window.location = "../coach_ejercicio.php";
            </script>
            ';
        }
    } else {
        echo '
        <script>
            alert("Error al cargar la imagen");
            window.location = "../coach_ejercicio.php";
        </script>
        ';
    }
} else {
    // No se ha subido una imagen
    echo '
    <script>
        alert("Debes seleccionar una imagen");
        window.location = "../coach_ejercicio.php";
    </script>
    ';
}

mysqli_close($conexion);
?>
