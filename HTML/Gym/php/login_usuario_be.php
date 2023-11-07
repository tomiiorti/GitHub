<?php

    session_start();

    include 'conexion_be.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    //$password_e = hash('sha512', $password); con esto encriptas la contraseña, si se usa hay que cambiar la variable en "$query" el coso de sha encripta a 129 caracteres (cambiar codigo)

    $validar_login_client = mysqli_query($conexion, "SELECT * FROM usuario WHERE Usuario='$username' and Contraseña='$password' and Rol=1 ");
    $validar_login_user = mysqli_query($conexion, "SELECT * FROM usuario WHERE Usuario='$username' and Contraseña='$password' and Rol=0 ");

    
    if(mysqli_num_rows($validar_login_user) > 0){
        $_SESSION['Coach'] = $username;
        header("location: ../coach_user.php");

    } elseif(mysqli_num_rows($validar_login_client) > 0){
        $_SESSION['Client'] = $username;
        $row = mysqli_fetch_assoc($validar_login_client);
        $IDUsuario = $row['ID'];
        header("location: ../cliente.php?id=$IDUsuario");

    } else{
        echo '
        <script>
        alert("Usuario o Contraseña incorrecta")
        window.location = "../login.php";
        </script>';
    }
