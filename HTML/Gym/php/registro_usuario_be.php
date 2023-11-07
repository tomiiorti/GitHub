<?php

    include 'conexion_be.php';

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $password_e = hash('sha512', $password); con esto encriptas la contraseña, si se usa hay que cambiar la variable en "$query"
    $rol = $_POST['rol'];


    $query = "INSERT INTO usuario(Nombre, Usuario, Contraseña, Rol) 
        VALUES('$name', '$username', '$password', '$rol')";

    $verificar_username = mysqli_query($conexion, "SELECT * FROM usuario WHERE Usuario='$username' ");
    if (mysqli_num_rows($verificar_username)>0){
    
        echo '
            <script>
                window.location = "../coach_user.php";
                alert("Ya hay un usuario creado con ese nombre");
            </script>
        ';
        exit();

    }

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {

        echo '
            <script>
            alert("Usuario almacenado exitosamente");
            window.location = "../coach_user.php";
            </script>
            ';
        }else{
            echo '
                <script>
                alert("Inténtalo de nuevo, usuario no almacenado") ;
                window.location = "../coach_user.php";
                </script>
            ';
        }
    mysqli_close($conexion);
?>