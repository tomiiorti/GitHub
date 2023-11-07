<?php

    include 'conexion_be.php';

    $desc = $_POST['desc'];

    $query = "INSERT INTO repeticiones(Descripcion)
            VALUES('$desc')";

    $verificar_serie = mysqli_query($conexion, "SELECT * FROM repeticiones WHERE Descripcion='$desc'");
    if (mysqli_num_rows($verificar_serie)>0){
    
        echo '
            <script>
                window.location = "../coach_user.php";
                alert("Ya hay una serie creada con esa descripción");
            </script>
        ';
        exit();

    }

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {

        echo '
            <script>
            alert("Serie creada exitosamente");
            window.location = "../coach_user.php";
            </script>
            ';
        }else{
            echo '
                <script>
                alert("Inténtalo de nuevo, la serie no pudo ser creada") ;
                window.location = "../coach_user.php";
                </script>
            ';
        }
    mysqli_close($conexion);
?>