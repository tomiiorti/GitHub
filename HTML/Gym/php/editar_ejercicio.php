<?php

    include 'conexion_be.php';
    
    $id=$_GET['id'];



    $sql = "SELECT * FROM ejercicio WHERE IDEjercicio='$id'";
    $query = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($query);

    /*echo '<dialog id="modal" class="col-md-4">
            <h2 class="text-center mb-3">Editar Usuario</h2>
            <form id="editUserForm" action="editar_usuario.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label col-md-2">Nombre</label>
                    <input type="text" class="form-control" id="name" name="id" value="<?php echo $row["Id"]; ?>">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label col-md-2">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["Nombre"]; ?>">
                </div>
                <hr> <!-- Línea divisora -->
                <div class="mb-3">
                    <label for="usuario" class="form-label col-md-2">Usuario</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row["Usuario"]; ?>">
                </div>
                <hr> <!-- Línea divisora -->
                <div class="mb-3">
                    <label for="contrasena" class="form-label col-md-2">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $row["Contraseña"]; ?>">
                </div>
                <hr> <!-- Línea divisora -->
                <div class="mb-3">
                    <label for="rol" class="form-label col-md-2">Rol (0-1)</label>
                    <input type="number" class="form-control" id="rol" name="rol" min="0" max="1" value="<?php echo $row["Rol"]; ?>">
                </div>
                <hr> <!-- Línea divisora -->
                <div class="mx-3 d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-primary mx-2" id="guardarCambios">Guardar Cambios</button>
                </div>
            </form>
        </dialog> ';*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editar_be.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body class="body d-flex justify-content-center align-items-center">
    <div class="col-md-6 d-flex justify-content-center align-items-center"> 
        <form id="editForm" class="col-md-11" action="/GYM/php/new_routine.php" method="POST" enctype="multipart/form-data">
            <h2 class="text-center">Editar Ejercicio</h2>
            <div class="secc">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row["IDEjercicio"]; ?>">
            </div>
            <hr> <!-- Línea divisora -->
            <div class="secc">
                <label for="nombre" class="form-label col-md-2">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["Nombre"]; ?>">
            </div>
            <hr> <!-- Línea divisora -->
            <div class="secc">
                <label for="usuario" class="form-label col-md-2">Imagen (URL)</label>
                <input type="file" class="form-control" id="img" name="img" value="<?php echo $row["Imagen"]; ?>">
            </div>
            <hr> <!-- Línea divisora -->
            <div class="secc">
                <label for="rol" class="form-label col-md-2">Descripción</label>
                <input type="text" class="form-control" id="desc" name="desc" value="<?php echo $row["Descripcion"]; ?>">
            </div>
            <hr> <!-- Línea divisora -->
            <div class="my-3 d-flex justify-content-end align-items-center">
                <button type="submit" class="buttonSave mx-2" >Guardar Cambios</button>
                <a type="button" class="buttonClose mx-2" id="" href="../coach_user.php">Volver</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </body>
</html>