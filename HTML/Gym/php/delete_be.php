<?php

    include 'conexion_be.php';
    
    $id=$_GET['id'];


    $sql = "DELETE FROM usuario WHERE ID='$id'";
    $query = mysqli_query($conexion, $sql);

    if ($query) {
        Header("location: ../coach_user.php");
    }