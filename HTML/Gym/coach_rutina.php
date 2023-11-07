<?php
        session_start();

        if(!isset($_SESSION['Coach'])){
            header("location: login.php") ;
            echo '
                <script>
                    alert("Por favor debes iniciar sesi6én");
                </script>
                ';
            session_destroy();
            die();
    }
    include 'php/conexion_be.php';
    
    $id=$_GET['id'];

    $sql = "SELECT * FROM usuario WHERE ID='$id'";
    $query = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($query);

    ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/coach.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Proximo Cbum</title>
</head>

<body class="body">
    <header>
        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="tittle text-center navbar-brand mx-3" style="width:70px" href="coach_user.php">#Gimnasio</a>
                <a class="tittle text-center navbar-brand mx-3" style="width:70px" href="#">Rutinas</a>
                <div class="d-flex justify-content-center" style="width:70px">
                    <button class="navbar-toggler mx-3" id="ajusteBtn" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation">
                        <div id="ajustesDiv" class="ajustes d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-magnifying-glass" style="color: white;"></i>
                        </div>
                    </button>
                </div>
                <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel" style="width: 40vh;">
                    <div class="bg-dark d-flex flex-column p-3" style="height: 100vh; width: 40vh;">
                        <ul class="nav flex-column" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active text-white-50 fs-2 p-3" id="user-tab" data-bs-toggle="tab"
                                    href="coach_user.php" role="tab" aria-controls="user"
                                    aria-selected="true">Usuarios</a>
                            </li>
                            <li class="nav-item" role-presentation>
                                <a class="nav-link text-white-50 fs-2 p-3" id="exercise-tab" href="coach_ejercicio.php"
                                    aria-selected="false">Ejercicios</a>
                            </li>
                        </ul>
                    </div>
                    <div class="m-4 d-flex justify-content-center">
                        <a href="php/cerrar_sesion.php"
                            class="btn btn-danger d-flex align-items-center justify-content-center"
                            style="width:90%; height:3.2rem;">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="container">
            <div class="container mt-5">
                <h1 class="text-center tittle mt-3 text" style="color:white;">Rutina de Ejercicios</h1>
                <h2 class="m-3" style="color:white;"> <?php echo $row['Nombre'] ?></h2>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="dia1-tab" data-bs-toggle="tab" href="#dia1" role="tab"
                            aria-controls="dia1" aria-selected="true">Día 1</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dia2-tab" data-bs-toggle="tab" href="#dia2" role="tab"
                            aria-controls="dia2" aria-selected="false">Día 2</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dia3-tab" data-bs-toggle="tab" href="#dia3" role="tab"
                            aria-controls="dia3" aria-selected="false">Día 3</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dia4-tab" data-bs-toggle="tab" href="#dia4" role="tab"
                            aria-controls="dia4" aria-selected="false">Día 4</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dia5-tab" data-bs-toggle="tab" href="#dia5" role="tab"
                            aria-controls="dia5" aria-selected="false">Día 5</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dia6-tab" data-bs-toggle="tab" href="#dia6" role="tab"
                            aria-controls="dia6" aria-selected="false">Día 6</a>
                    </li>
                </ul>

                <!-- Contenido de las pestañas -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="dia1" role="tabpanel" aria-labelledby="dia1-tab">
                        <!-- Contenido del Día 1 (ejercicios) aquí -->
                        <h3 class="day">Día 1</h3>
                        <div class="d-flex flex-wrap justify-content-center mb-4">
                            <?php
                            include 'php/conexion_be.php';
                            $id=$_GET['id'];

                            $sql = "SELECT  ejercicio.Nombre, 
                                            ejercicio.Imagen, 
                                            ejercicio.Descripcion, 
                                            repeticiones.Descripcion, 
                                            rutina.Dia,
                                            rutina.IDUsuario,
                                            rutina.IDRutina
                                    
                                    FROM rutina
                                    INNER JOIN ejercicio on ejercicio.IDEjercicio = rutina.IDEjercicio
                                    INNER JOIN repeticiones on repeticiones.IDRepeticion = rutina.IDRepeticion

                                    WHERE rutina.Dia = 1 AND
                                        rutina.IDUsuario = $id;

                                    ";
                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="card m-2 col-md-2 custom-border-card justify-content-between flex-column align-items-center" style="height: auto;">
                                            <div class="text-center p-1">
                                                <p>' . $row['Nombre'] . '</p>
                                            </div>
                                            <div>
                                                <div class="img text-center m-4">
                                                    <img src="img_ejercicio/' . $row['Imagen'] . '" alt=" ' . $row['Nombre'] . ' " class="img-fluid">
                                                </div>
                                                <div class="text-center">
                                                    <p>' . $row["Descripcion"] . '</p>
                                                    <a class="btn btn-danger rounded-pill m-2" id="" href="php/delete_ejercicio_rutina.php?id='.$row['IDRutina'].'&userID='.$id.'"><i class="fa-solid fa-trash"></i>  Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                }
                            } else {
                                echo "<tr><td colspan='8'>No se encontraron registros.</td></tr>";
                            }
                            $conexion->close();
                        ?>
                            <div class="bg m-2 d-flex justify-content-center align-items-center col-md-2">
                                <a class="bgi d-flex justify-content-center align-items-center" id="newRoutine1"
                                    style="width:7rem; height:7rem; ">
                                    <!-- Editar para uqe no tenga subrayado -->
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dia2" role="tabpanel" aria-labelledby="dia2-tab">
                        <!-- Contenido del Día 2 (ejercicios) aquí -->
                        <h3 class="day">Día 2</h3>
                        <div class="d-flex flex-wrap justify-content-center mb-4">
                            <?php
                            include 'php/conexion_be.php';
                            $id=$_GET['id'];

                            $sql = "SELECT  ejercicio.Nombre, 
                                            ejercicio.Imagen, 
                                            ejercicio.Descripcion, 
                                            repeticiones.Descripcion, 
                                            rutina.Dia,
                                            rutina.IDUsuario,
                                            rutina.IDRutina
                                    
                                    FROM rutina
                                    INNER JOIN ejercicio on ejercicio.IDEjercicio = rutina.IDEjercicio
                                    INNER JOIN repeticiones on repeticiones.IDRepeticion = rutina.IDRepeticion

                                    WHERE rutina.Dia = 2 AND
                                        rutina.IDUsuario = $id;

                                    ";
                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="card m-2 col-md-2 custom-border-card justify-content-between flex-column align-items-center" style="height: auto;">
                                            <div class="text-center p-1">
                                                <p>' . $row['Nombre'] . '</p>
                                            </div>
                                            <div>
                                                <div class="img text-center m-4">
                                                    <img src="img_ejercicio/' . $row['Imagen'] . '" alt=" ' . $row['Nombre'] . ' " class="img-fluid">
                                                </div>
                                                <div class="text-center">
                                                    <p>' . $row["Descripcion"] . '</p>
                                                    <a class="btn btn-danger rounded-pill m-2" id="" href="php/delete_ejercicio_rutina.php?id='.$row['IDRutina'].'&userID='.$id.'"><i class="fa-solid fa-trash"></i>  Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                }
                            } else {
                                echo "<tr><td colspan='8'>No se encontraron registros.</td></tr>";
                            }
                            $conexion->close();
                        ?>
                            <div class="bg m-2 d-flex justify-content-center align-items-center col-md-2">
                                <a class="bgi d-flex justify-content-center align-items-center" id="newRoutine2"
                                    style="width:7rem; height:7rem; ">
                                    <!-- Editar para uqe no tenga subrayado -->
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dia3" role="tabpanel" aria-labelledby="dia3-tab">
                        <!-- Contenido del Día 2 (ejercicios) aquí -->
                        <h3 class="day">Día 3</h3>
                        <div class="d-flex flex-wrap justify-content-center mb-4">
                            <?php
                            include 'php/conexion_be.php';
                            $id=$_GET['id'];

                            $sql = "SELECT  ejercicio.Nombre, 
                                            ejercicio.Imagen, 
                                            ejercicio.Descripcion, 
                                            repeticiones.Descripcion, 
                                            rutina.Dia,
                                            rutina.IDUsuario,
                                            rutina.IDRutina
                                    
                                    FROM rutina
                                    INNER JOIN ejercicio on ejercicio.IDEjercicio = rutina.IDEjercicio
                                    INNER JOIN repeticiones on repeticiones.IDRepeticion = rutina.IDRepeticion

                                    WHERE rutina.Dia = 3 AND
                                        rutina.IDUsuario = $id;

                                    ";
                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="card m-2 col-md-2 custom-border-card justify-content-between flex-column align-items-center" style="height: auto;">
                                            <div class="text-center p-1">
                                                <p>' . $row['Nombre'] . '</p>
                                            </div>
                                            <div>
                                                <div class="img text-center m-4">
                                                    <img src="img_ejercicio/' . $row['Imagen'] . '" alt=" ' . $row['Nombre'] . ' " class="img-fluid">
                                                </div>
                                                <div class="text-center">
                                                    <p>' . $row["Descripcion"] . '</p>
                                                    <a class="btn btn-danger rounded-pill m-2" id="" href="php/delete_ejercicio_rutina.php?id='.$row['IDRutina'].'&userID='.$id.'"><i class="fa-solid fa-trash"></i>  Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                }
                            } else {
                                echo "<tr><td colspan='8'>No se encontraron registros.</td></tr>";
                            }
                            $conexion->close();
                        ?>
                            <div class="bg m-2 d-flex justify-content-center align-items-center col-md-2">
                                <a class="bgi d-flex justify-content-center align-items-center" id="newRoutine3"
                                    style="width:7rem; height:7rem; ">
                                    <!-- Editar para uqe no tenga subrayado -->
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dia4" role="tabpanel" aria-labelledby="dia4-tab">
                        <!-- Contenido del Día 2 (ejercicios) aquí -->
                        <h3 class="day">Día 4</h3>
                        <div class="d-flex flex-wrap justify-content-center mb-4">
                            <?php
                            include 'php/conexion_be.php';
                            $id=$_GET['id'];

                            $sql = "SELECT  ejercicio.Nombre, 
                                            ejercicio.Imagen, 
                                            ejercicio.Descripcion, 
                                            repeticiones.Descripcion, 
                                            rutina.Dia,
                                            rutina.IDUsuario,
                                            rutina.IDRutina
                                    
                                    FROM rutina
                                    INNER JOIN ejercicio on ejercicio.IDEjercicio = rutina.IDEjercicio
                                    INNER JOIN repeticiones on repeticiones.IDRepeticion = rutina.IDRepeticion

                                    WHERE rutina.Dia = 4 AND
                                        rutina.IDUsuario = $id;

                                    ";
                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="card m-2 col-md-2 custom-border-card justify-content-between flex-column align-items-center" style="height: auto;">
                                            <div class="text-center p-1">
                                                <p>' . $row['Nombre'] . '</p>
                                            </div>
                                            <div>
                                                <div class="img text-center m-4">
                                                    <img src="img_ejercicio/' . $row['Imagen'] . '" alt=" ' . $row['Nombre'] . ' " class="img-fluid">
                                                </div>
                                                <div class="text-center">
                                                    <p>' . $row["Descripcion"] . '</p>
                                                    <a class="btn btn-danger rounded-pill m-2" id="" href="php/delete_ejercicio_rutina.php?id='.$row['IDRutina'].'&userID='.$id.'"><i class="fa-solid fa-trash"></i>  Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                }
                            } else {
                                echo "<tr><td colspan='8'>No se encontraron registros.</td></tr>";
                            }
                            $conexion->close();
                        ?>
                            <div class="bg m-2 d-flex justify-content-center align-items-center col-md-2">
                                <a class="bgi d-flex justify-content-center align-items-center" id="newRoutine4"
                                    style="width:7rem; height:7rem; ">
                                    <!-- Editar para uqe no tenga subrayado -->
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dia5" role="tabpanel" aria-labelledby="dia5-tab">
                        <!-- Contenido del Día 2 (ejercicios) aquí -->
                        <h3 class="day">Día 5</h3>
                        <div class="d-flex flex-wrap justify-content-center mb-4">
                            <?php
                            include 'php/conexion_be.php';
                            $id=$_GET['id'];

                            $sql = "SELECT  ejercicio.Nombre, 
                                            ejercicio.Imagen, 
                                            ejercicio.Descripcion, 
                                            repeticiones.Descripcion, 
                                            rutina.Dia,
                                            rutina.IDUsuario,
                                            rutina.IDRutina
                                    
                                    FROM rutina
                                    INNER JOIN ejercicio on ejercicio.IDEjercicio = rutina.IDEjercicio
                                    INNER JOIN repeticiones on repeticiones.IDRepeticion = rutina.IDRepeticion

                                    WHERE rutina.Dia = 5 AND
                                        rutina.IDUsuario = $id;

                                    ";
                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="card m-2 col-md-2 custom-border-card justify-content-between flex-column align-items-center" style="height: auto;">
                                            <div class="text-center p-1">
                                                <p>' . $row['Nombre'] . '</p>
                                            </div>
                                            <div>
                                                <div class="img text-center m-4">
                                                    <img src="img_ejercicio/' . $row['Imagen'] . '" alt=" ' . $row['Nombre'] . ' " class="img-fluid">
                                                </div>
                                                <div class="text-center">
                                                    <p>' . $row["Descripcion"] . '</p>
                                                    <a class="btn btn-danger rounded-pill m-2" id="" href="php/delete_ejercicio_rutina.php?id='.$row['IDRutina'].'&userID='.$id.'"><i class="fa-solid fa-trash"></i>  Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                }
                            } else {
                                echo "<tr><td colspan='8'>No se encontraron registros.</td></tr>";
                            }
                            $conexion->close();
                        ?>
                            <div class="bg m-2 d-flex justify-content-center align-items-center col-md-2">
                                <a class="bgi d-flex justify-content-center align-items-center" id="newRoutine5"
                                    style="width:7rem; height:7rem; ">
                                    <!-- Editar para uqe no tenga subrayado -->
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dia6" role="tabpanel" aria-labelledby="dia6-tab">
                        <!-- Contenido del Día 2 (ejercicios) aquí -->
                        <h3 class="day">Día 6</h3>
                        <div class="d-flex flex-wrap justify-content-center mb-4">
                            <?php
                            include 'php/conexion_be.php';
                            $id=$_GET['id'];

                            $sql = "SELECT  ejercicio.Nombre, 
                                            ejercicio.Imagen, 
                                            ejercicio.Descripcion, 
                                            repeticiones.Descripcion, 
                                            rutina.Dia,
                                            rutina.IDUsuario,
                                            rutina.IDRutina
                                    
                                    FROM rutina
                                    INNER JOIN ejercicio on ejercicio.IDEjercicio = rutina.IDEjercicio
                                    INNER JOIN repeticiones on repeticiones.IDRepeticion = rutina.IDRepeticion

                                    WHERE rutina.Dia = 6 AND
                                        rutina.IDUsuario = $id;

                                    ";
                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="card m-2 col-md-2 custom-border-card justify-content-between flex-column align-items-center" style="height: auto;">
                                            <div class="text-center p-1">
                                                <p>' . $row['Nombre'] . '</p>
                                            </div>
                                            <div>
                                                <div class="img text-center m-4">
                                                    <img src="img_ejercicio/' . $row['Imagen'] . '" alt=" ' . $row['Nombre'] . ' " class="img-fluid">
                                                </div>
                                                <div class="text-center">
                                                    <p>' . $row["Descripcion"] . '</p>
                                                    <a class="btn btn-danger rounded-pill m-2" id="" href="php/delete_ejercicio_rutina.php?id='.$row['IDRutina'].'&userID='.$id.'"><i class="fa-solid fa-trash"></i>  Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                }
                            } else {
                                echo "<tr><td colspan='8'>No se encontraron registros.</td></tr>";
                            }
                            $conexion->close();
                        ?>
                            <div class="bg m-2 d-flex justify-content-center align-items-center col-md-2">
                                <a class="bgi d-flex justify-content-center align-items-center" id="newRoutine6"
                                    data-value="6" style="width:7rem; height:7rem; ">
                                    <!-- Editar para uqe no tenga subrayado -->
                                    <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Agrega más pestañas y contenido según tus necesidades -->
                </div>
                <dialog id="modalNewRoutine1" class="col-md-4">
                    <h2 class="text-center mb-3">Agregar Ejercicio</h2>
                    <form id="createRoutine" action="php/nueva_rutina_r.php" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="day" name="day" value="1">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">

                        <div class="mb-3">
                            <label for="nombre" class="form-label col-md-2">Ejercicio</label>
                            <select class="form-select" id="name" name="idEjer">
                                <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT IDEjercicio, Nombre FROM ejercicio"; // Asegúrate de seleccionar el ID junto con el nombre
                            $result = $conexion->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["IDEjercicio"] . '">' . $row["Nombre"] . '</option>';
                                }
                            }
                            $conexion->close();
                            ?>
                            </select>
                        </div>
                        <hr> <!-- Línea divisora -->
                        <div class="mb-3">
                            <label for="rol" class="form-label col-md-2">Serie</label>
                            <select class="form-select" id="serie" name="idRep">
                                <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT IDRepeticion, Descripcion FROM repeticiones"; // Asegúrate de seleccionar el ID junto con la descripción
                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["IDRepeticion"] . '">' . $row["Descripcion"] . '</option>';
                                }
                            }
                            $conexion->close();
                            ?>
                            </select>
                        </div>
                        <hr> <!-- Línea divisora -->
                        <div class="mx-3 d-flex justify-content-end align-items-center">
                            <button type="submit" class="buttonSave mx-2" id="guardarCambios">Guardar Cambios</button>
                            <button type="button" class="buttonClose mx-2" id="cerrar-dialogo1">Cerrar</button>
                        </div>
                    </form>
                </dialog>
                <dialog id="modalNewRoutine2" class="col-md-4">
                    <h2 class="text-center mb-3">Agregar Ejercicio</h2>
                    <form id="createRoutine" action="php/nueva_rutina_r.php" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="day" name="day" value="2">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">

                        <div class="mb-3">
                            <label for="nombre" class="form-label col-md-2">Ejercicio</label>
                            <select class="form-select" id="name" name="idEjer">
                                <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT IDEjercicio, Nombre FROM ejercicio"; // Asegúrate de seleccionar el ID junto con el nombre
                            $result = $conexion->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["IDEjercicio"] . '">' . $row["Nombre"] . '</option>';
                                }
                            }
                            $conexion->close();
                            ?>
                            </select>
                        </div>
                        <hr> <!-- Línea divisora -->
                        <div class="mb-3">
                            <label for="rol" class="form-label col-md-2">Serie</label>
                            <select class="form-select" id="serie" name="idRep">
                                <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT IDRepeticion, Descripcion FROM repeticiones"; // Asegúrate de seleccionar el ID junto con la descripción
                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["IDRepeticion"] . '">' . $row["Descripcion"] . '</option>';
                                }
                            }
                            $conexion->close();
                            ?>
                            </select>
                        </div>
                        <hr> <!-- Línea divisora -->
                        <div class="mx-3 d-flex justify-content-end align-items-center">
                            <button type="submit" class="buttonSave mx-2" id="guardarCambios">Guardar Cambios</button>
                            <button type="button" class="buttonClose mx-2" id="cerrar-dialogo2">Cerrar</button>
                        </div>
                    </form>
                </dialog>
                <dialog id="modalNewRoutine3" class="col-md-4">
                    <h2 class="text-center mb-3">Agregar Ejercicio</h2>
                    <form id="createRoutine" action="php/nueva_rutina_r.php" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="day" name="day" value="3">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">

                        <div class="mb-3">
                            <label for="nombre" class="form-label col-md-2">Ejercicio</label>
                            <select class="form-select" id="name" name="idEjer">
                                <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT IDEjercicio, Nombre FROM ejercicio"; // Asegúrate de seleccionar el ID junto con el nombre
                            $result = $conexion->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["IDEjercicio"] . '">' . $row["Nombre"] . '</option>';
                                }
                            }
                            $conexion->close();
                            ?>
                            </select>
                        </div>
                        <hr> <!-- Línea divisora -->
                        <div class="mb-3">
                            <label for="rol" class="form-label col-md-2">Serie</label>
                            <select class="form-select" id="serie" name="idRep">
                                <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT IDRepeticion, Descripcion FROM repeticiones"; // Asegúrate de seleccionar el ID junto con la descripción
                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["IDRepeticion"] . '">' . $row["Descripcion"] . '</option>';
                                }
                            }
                            $conexion->close();
                            ?>
                            </select>
                        </div>
                        <hr> <!-- Línea divisora -->
                        <div class="mx-3 d-flex justify-content-end align-items-center">
                            <button type="submit" class="buttonSave mx-2" id="guardarCambios">Guardar Cambios</button>
                            <button type="button" class="buttonClose mx-2" id="cerrar-dialogo3">Cerrar</button>
                        </div>
                    </form>
                </dialog>
                <dialog id="modalNewRoutine4" class="col-md-4">
                    <h2 class="text-center mb-3">Agregar Ejercicio</h2>
                    <form id="createRoutine" action="php/nueva_rutina_r.php" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="day" name="day" value="4">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">

                        <div class="mb-3">
                            <label for="nombre" class="form-label col-md-2">Ejercicio</label>
                            <select class="form-select" id="name" name="idEjer">
                                <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT IDEjercicio, Nombre FROM ejercicio"; // Asegúrate de seleccionar el ID junto con el nombre
                            $result = $conexion->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["IDEjercicio"] . '">' . $row["Nombre"] . '</option>';
                                }
                            }
                            $conexion->close();
                            ?>
                            </select>
                        </div>
                        <hr> <!-- Línea divisora -->
                        <div class="mb-3">
                            <label for="rol" class="form-label col-md-2">Serie</label>
                            <select class="form-select" id="serie" name="idRep">
                                <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT IDRepeticion, Descripcion FROM repeticiones"; // Asegúrate de seleccionar el ID junto con la descripción
                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["IDRepeticion"] . '">' . $row["Descripcion"] . '</option>';
                                }
                            }
                            $conexion->close();
                            ?>
                            </select>
                        </div>
                        <hr> <!-- Línea divisora -->
                        <div class="mx-3 d-flex justify-content-end align-items-center">
                            <button type="submit" class="buttonSave mx-2" id="guardarCambios">Guardar Cambios</button>
                            <button type="button" class="buttonClose mx-2" id="cerrar-dialogo4">Cerrar</button>
                        </div>
                    </form>
                </dialog>
                <dialog id="modalNewRoutine5" class="col-md-4">
                    <h2 class="text-center mb-3">Agregar Ejercicio</h2>
                    <form id="createRoutine" action="php/nueva_rutina_r.php" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="day" name="day" value="5">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">

                        <div class="mb-3">
                            <label for="nombre" class="form-label col-md-2">Ejercicio</label>
                            <select class="form-select" id="name" name="idEjer">
                                <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT IDEjercicio, Nombre FROM ejercicio"; // Asegúrate de seleccionar el ID junto con el nombre
                            $result = $conexion->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["IDEjercicio"] . '">' . $row["Nombre"] . '</option>';
                                }
                            }
                            $conexion->close();
                            ?>
                            </select>
                        </div>
                        <hr> <!-- Línea divisora -->
                        <div class="mb-3">
                            <label for="rol" class="form-label col-md-2">Serie</label>
                            <select class="form-select" id="serie" name="idRep">
                                <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT IDRepeticion, Descripcion FROM repeticiones"; // Asegúrate de seleccionar el ID junto con la descripción
                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["IDRepeticion"] . '">' . $row["Descripcion"] . '</option>';
                                }
                            }
                            $conexion->close();
                            ?>
                            </select>
                        </div>
                        <hr> <!-- Línea divisora -->
                        <div class="mx-3 d-flex justify-content-end align-items-center">
                            <button type="submit" class="buttonSave mx-2" id="guardarCambios">Guardar Cambios</button>
                            <button type="button" class="buttonClose mx-2" id="cerrar-dialogo5">Cerrar</button>
                        </div>
                    </form>
                </dialog>
                <dialog id="modalNewRoutine6" class="col-md-4">
                    <h2 class="text-center mb-3">Agregar Ejercicio</h2>
                    <form id="createRoutine" action="php/nueva_rutina_r.php" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="day" name="day" value="6">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">

                        <div class="mb-3">
                            <label for="nombre" class="form-label col-md-2">Ejercicio</label>
                            <select class="form-select" id="name" name="idEjer">
                                <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT IDEjercicio, Nombre FROM ejercicio ORDER BY Nombre ASC"; // Asegúrate de seleccionar el ID junto con el nombre
                            $result = $conexion->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["IDEjercicio"] . '">' . $row["Nombre"] . '</option>';
                                }
                            }
                            $conexion->close();
                            ?>
                            </select>
                        </div>
                        <hr> <!-- Línea divisora -->
                        <div class="mb-3">
                            <label for="rol" class="form-label col-md-2">Serie</label>
                            <select class="form-select" id="serie" name="idRep">
                                <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT IDRepeticion, Descripcion FROM repeticiones"; // Asegúrate de seleccionar el ID junto con la descripción
                            $result = $conexion->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["IDRepeticion"] . '">' . $row["Descripcion"] . '</option>';
                                }
                            }
                            $conexion->close();
                            ?>
                            </select>
                        </div>
                        <hr> <!-- Línea divisora -->
                        <div class="mx-3 d-flex justify-content-end align-items-center">
                            <button type="submit" class="buttonSave mx-2">Guardar Cambios</button>
                            <button type="button" class="buttonClose mx-2" id="cerrar-dialogo6">Cerrar</button>
                        </div>
                    </form>
                </dialog>
            </div>
            <div class="col-md-12 d-flex justify-content-end" style="border-top: 1px solid #ccc;">
                <button class="buttonSave m-3" id="btnCopyRoutine"><i class="fa-solid fa-copy"></i> Copiar Rutina
                    de...</button><!-- Botón para Modificar -->
                <button class="buttonClose m-3" id="btnDeleteRoutine"><i class="fa-solid fa-trash"></i> Eliminar
                    rutina</button> <!-- Botón para Eliminar -->
            </div>
        </section>
        <dialog id="modalDeleteRoutine" class="col-md-4">
            <h2 class="text-center mb-3">Eliminar rutina</h2>
            <form id="createRoutine" action="php/delete_routine_be.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label col-md-2"></label>
                    <select class="form-select" id="day" name="day">
                        <option value="">Todos los dias</option>
                        <option value="1">Dia 1</option>
                        <option value="2">Dia 2</option>
                        <option value="3">Dia 3</option>
                        <option value="4">Dia 4</option>
                        <option value="5">Dia 5</option>
                        <option value="6">Dia 6</option>
                    </select>
                </div>
                <hr> <!-- Línea divisora -->
                <div class="mx-3 d-flex justify-content-end align-items-center">
                    <button type="submit" class="buttonClose mx-2" id="guardarCambios">Guardar Cambios</button>
                    <button type="button" class="buttonSave mx-2" id="cerrar-dialogo_deleteRoutine">Cerrar</button>
                </div>
            </form>
        </dialog>
        <dialog id="modalCopyRotuine" class="col-md-4">
            <h2 class="text-center mb-3">Copiar rutina</h2>
            <form id="createRoutine" action="php/copy_routine_be.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
                    <label for="nombre" class="form-label">Usuario</label>
                    <select class="form-select" id="idUser" name="idUser">
                        <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT  Nombre, ID FROM usuario ORDER BY Nombre";
                            $result = $conexion->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["ID"] . '">' . $row["Nombre"] . '</option>';
                                }
                            }
                            $conexion->close();
                            ?>
                    </select>
                </div>
                <hr> <!-- Línea divisora -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Dia a copiar</label>
                    <select class="form-select" id="day" name="day">
                        <option value="">Todos los dias</option>
                        <option value="1">Dia 1</option>
                        <option value="2">Dia 2</option>
                        <option value="3">Dia 3</option>
                        <option value="4">Dia 4</option>
                        <option value="5">Dia 5</option>
                        <option value="6">Dia 6</option>
                    </select>
                </div>
                <hr> <!-- Línea divisora -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">¿A que dia le asignas la rutina?</label>
                    <select class="form-select" id="dayDest" name="dayDest">
                        <option value="">Todos los dias</option>
                        <option value="1">Dia 1</option>
                        <option value="2">Dia 2</option>
                        <option value="3">Dia 3</option>
                        <option value="4">Dia 4</option>
                        <option value="5">Dia 5</option>
                        <option value="6">Dia 6</option>
                    </select>
                </div>
                <div class="mb-3">
                    <p class="d-flex justify-content-end" style="color: grey;">*Se aconseja primero eliminar los
                        ejercicios del dia que se desea copiar antes de esta acción.</p>
                </div>
                <hr> <!-- Línea divisora -->
                <div class="mx-3 d-flex justify-content-end align-items-center">
                    <button type="submit" class="buttonSave mx-2" id="guardarCambios">Guardar Cambios</button>
                    <button type="button" class="buttonClose mx-2" id="cerrar-dialogo_copyRoutine">Cerrar</button>
                </div>
            </form>
        </dialog>



    </main>
    <script>
    const abrirModalCP = document.getElementById("btnCopyRoutine");
    const cerrarModalCP = document.getElementById(
        "cerrar-dialogo_copyRoutine"); // Puedes agregar un botón para cerrar el modal

    const modalCP = document.getElementById("modalCopyRotuine");

    abrirModalCP.addEventListener("click", () => {
        modalCP.showModal();
    });

    cerrarModalCP.addEventListener("click", () => {
        modalCP.close();
    });
    </script>
    <script>
    const abrirModalDR = document.getElementById("btnDeleteRoutine");
    const cerrarModalDR = document.getElementById(
        "cerrar-dialogo_deleteRoutine"); // Puedes agregar un botón para cerrar el modal

    const modalDR = document.getElementById("modalDeleteRoutine");

    abrirModalDR.addEventListener("click", () => {
        modalDR.showModal();
    });

    cerrarModalDR.addEventListener("click", () => {
        modalDR.close();
    });
    </script>
    <script>
    // Obtén el botón "Modificar Rutina" por su ID
    const btnModificarRutina = document.getElementById("user-tab");

    // Agrega un evento click al botón
    btnModificarRutina.addEventListener("click", () => {
        // Redirige al usuario a la página coach_rutina.html
        window.location.href = "coach_user.php";
    });
    </script>
    <script>
    const abrirModal1 = document.getElementById("newRoutine1");
    const cerrarModal1 = document.getElementById("cerrar-dialogo1"); // Puedes agregar un botón para cerrar el modal

    const modal1 = document.getElementById("modalNewRoutine1");

    abrirModal1.addEventListener("click", () => {
        modal1.showModal();
    });

    cerrarModal1.addEventListener("click", () => {
        modal1.close();
    });
    </script>
    <script>
    const abrirModal2 = document.getElementById("newRoutine2");
    const cerrarModal2 = document.getElementById("cerrar-dialogo2"); // Puedes agregar un botón para cerrar el modal

    const modal2 = document.getElementById("modalNewRoutine2");

    abrirModal2.addEventListener("click", () => {
        modal2.showModal();
    });

    cerrarModal2.addEventListener("click", () => {
        modal2.close();
    });
    </script>
    <script>
    const abrirModal3 = document.getElementById("newRoutine3");
    const cerrarModal3 = document.getElementById("cerrar-dialogo3"); // Puedes agregar un botón para cerrar el modal

    const modal3 = document.getElementById("modalNewRoutine3");

    abrirModal3.addEventListener("click", () => {
        modal3.showModal();
    });

    cerrarModal3.addEventListener("click", () => {
        moda3.close();
    });
    </script>
    <script>
    const abrirModal4 = document.getElementById("newRoutine4");
    const cerrarModal4 = document.getElementById("cerrar-dialogo4"); // Puedes agregar un botón para cerrar el modal

    const modal4 = document.getElementById("modalNewRoutine4");

    abrirModal4.addEventListener("click", () => {
        modal4.showModal();
    });

    cerrarModal4.addEventListener("click", () => {
        modal4.close();
    });
    </script>
    <script>
    const abrirModal5 = document.getElementById("newRoutine5");
    const cerrarModal5 = document.getElementById("cerrar-dialogo5"); // Puedes agregar un botón para cerrar el modal

    const modal5 = document.getElementById("modalNewRoutine5");

    abrirModal5.addEventListener("click", () => {
        modal5.showModal();
    });

    cerrarModal6.addEventListener("click", () => {
        modal6.close();
    });
    </script>
    <script>
    const abrirModal6 = document.getElementById("newRoutine6");
    const cerrarModal6 = document.getElementById("cerrar-dialogo6"); // Puedes agregar un botón para cerrar el modal

    const modal6 = document.getElementById("modalNewRoutine6");

    abrirModal6.addEventListener("click", () => {
        modal6.showModal();
    });

    cerrarModal6.addEventListener("click", () => {
        modal6.close();
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Copiar rutina - Que no sea el select sino que busque los usuarios mediante el cliente escriba
        <script>
  const searchUserInput = document.getElementById('searchUser'); id del input
  const userList = document.getElementById('userList'); id de ul

  // Evento para actualizar la lista de usuarios cuando se escribe en el campo de entrada
  searchUserInput.addEventListener('input', () => {
    const inputValue = searchUserInput.value.toLowerCase();
    userList.innerHTML = ''; // Limpiar la lista

    $.ajax({
      type: 'POST',
      url: 'obtener_usuarios.php', // Cambia esto al nombre de tu archivo PHP
      data: { searchTerm: inputValue },
      success: function (data) {
        const usuarios = JSON.parse(data);
        usuarios.forEach((usuario) => {
          const listItem = document.createElement('li');
          listItem.textContent = usuario.nombre;
          listItem.setAttribute('data-id', usuario.id);
          userList.appendChild(listItem);
        });
      },
    });
  });

  // Evento para seleccionar un usuario de la lista
  userList.addEventListener('click', (event) => {
    if (event.target.tagName === 'LI') {
      const selectedUserId = event.target.getAttribute('data-id');
      searchUserInput.value = event.target.textContent;
      // Puedes hacer algo con el ID seleccionado (por ejemplo, enviarlo al servidor)
    }
    userList.innerHTML = ''; // Limpiar la lista después de seleccionar
  });
</script>
-->
</body>

</html>