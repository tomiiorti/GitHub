<?php
session_start();

include 'php/conexion_be.php';

if (!isset($_SESSION['Client'])) {
    header("location: login.php");
    echo '
        <script>
            alert("Por favor debes iniciar sesión");
        </script>
    ';
    session_destroy();
    die();
}

$id = $_GET['id'];

$sql = "SELECT * FROM usuario WHERE ID='$id'";
$query = mysqli_query($conexion, $sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/cliente.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Proximo Cbum</title>
</head>
<body class="body">
    <header class="header d-flex justify-content-between align-items-center">
        <a class="tittle mx-3" style="width:90px" href="#">#Gimnasio</a>
        <a class="tittle mx-3" style="width:90px" href="#">Rutinas</a>
        <div class="m-4 d-flex justify-content-end">
            <a href="php/cerrar_sesion.php" class="buttonClose">Cerrar Sesión</a>
        </div>
    </header> 
<main>
    <section class="container">
        <div class="container mt-">
            <h1 class="text-center tittle mt-3">Rutina de Ejercicios</h1>
            <h2 class="userName my-4">Bienvenido <?php echo $row['Nombre'] ?></h2>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item"  role="presentation">
                    <a class="nav-link active" id="dia1-tab" data-bs-toggle="tab" href="#dia1" role="tab" aria-controls="dia1" aria-selected="true">Día 1</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="dia2-tab" data-bs-toggle="tab" href="#dia2" role="tab" aria-controls="dia2" aria-selected="false">Día 2</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="dia3-tab" data-bs-toggle="tab" href="#dia3" role="tab" aria-controls="dia3" aria-selected="false">Día 3</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="dia4-tab" data-bs-toggle="tab" href="#dia4" role="tab" aria-controls="dia4" aria-selected="false">Día 4</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="dia5-tab" data-bs-toggle="tab" href="#dia5" role="tab" aria-controls="dia5" aria-selected="false">Día 5</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="dia6-tab" data-bs-toggle="tab" href="#dia6" role="tab" aria-controls="dia6" aria-selected="false">Día 6</a>
                </li>
            </ul>
    
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="dia1" role="tabpanel" aria-labelledby="dia1-tab">
                    <h2 class="subtittle">Día 1</h2>
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
                                    echo '<div class="card m-2 tarjeta" style="width: 100px; height: auto">
                                            <div class="text-center p-1">
                                                <p>' . $row['Nombre'] . '</p>
                                            </div>
                                            <div>
                                                <div class="img text-center m-4">
                                                    <img src="img_ejercicio/' . $row['Imagen'] . '" alt=" ' . $row['Nombre'] . ' " class="img-fluid">
                                                </div>
                                                <div class="text-center">
                                                    <p>' . $row["Descripcion"] . '</p>
                                          </div>
                                            </div>
                                        </div>
                                        ';
                                }
                            }
                            $conexion->close();
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="dia2" role="tabpanel" aria-labelledby="dia2-tab">
                    <h2 class="subtittle">Día 2</h2>
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
                                    echo '<div class="card m-2 tarjeta" style="width: 100px; height: auto">
                                            <div class="text-center p-1">
                                                <p>' . $row['Nombre'] . '</p>
                                            </div>
                                            <div>
                                                <div class="img text-center m-4">
                                                    <img src="img_ejercicio/' . $row['Imagen'] . '" alt=" ' . $row['Nombre'] . ' " class="img-fluid">
                                                </div>
                                                <div class="text-center">
                                                    <p>' . $row["Descripcion"] . '</p>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                }
                            }
                            $conexion->close();
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="dia3" role="tabpanel" aria-labelledby="dia3-tab">
                    <h2 class="subtittle">Día 3</h2>
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
                                    echo '<div class="card m-2 tarjeta" style="width: 100px; height: auto">
                                            <div class="text-center p-1">
                                                <p>' . $row['Nombre'] . '</p>
                                            </div>
                                            <div>
                                                <div class="img text-center m-4">
                                                    <img src="img_ejercicio/' . $row['Imagen'] . '" alt=" ' . $row['Nombre'] . ' " class="img-fluid">
                                                </div>
                                                <div class="text-center">
                                                    <p>' . $row["Descripcion"] . '</p>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                }
                            }
                            $conexion->close();
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="dia4" role="tabpanel" aria-labelledby="dia4-tab">
                    <h2 class="subtittle">Día 4</h2>
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
                                    echo '<div class="card m-2 tarjeta" style="width: 100px; height: auto">
                                            <div class="text-center p-1">
                                                <p>' . $row['Nombre'] . '</p>
                                            </div>
                                            <div>
                                                <div class="img text-center m-4">
                                                    <img src="img_ejercicio/' . $row['Imagen'] . '" alt=" ' . $row['Nombre'] . ' " class="img-fluid">
                                                </div>
                                                <div class="text-center">
                                                    <p>' . $row["Descripcion"] . '</p>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                }
                            }
                            $conexion->close();
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="dia5" role="tabpanel" aria-labelledby="dia5-tab">
                    <h2 class="subtittle">Día 5</h2>
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
                                    echo '<div class="card m-2 tarjeta" style="width: 100px; height: auto">
                                            <div class="text-center p-1">
                                                <p>' . $row['Nombre'] . '</p>
                                            </div>
                                            <div>
                                                <div class="img text-center m-4">
                                                    <img src="img_ejercicio/' . $row['Imagen'] . '" alt=" ' . $row['Nombre'] . ' " class="img-fluid">
                                                </div>
                                                <div class="text-center">
                                                    <p>' . $row["Descripcion"] . '</p>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                }
                            }
                            $conexion->close();
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="dia6" role="tabpanel" aria-labelledby="dia6-tab">
                    <h2 class="subtittle">Día 6</h2>
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
                                    echo '<div class="card m-2 tarjeta" style="width: 100px; height: auto">
                                            <div class="text-center p-1">
                                                <p>' . $row['Nombre'] . '</p>
                                            </div>
                                            <div>
                                                <div class="img text-center m-4">
                                                    <img src="img_ejercicio/' . $row['Imagen'] . '" alt=" ' . $row['Nombre'] . ' " class="img-fluid">
                                                </div>
                                                <div class="text-center">
                                                    <p>' . $row["Descripcion"] . '</p>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                }
                            }
                            $conexion->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div></div>
    </section>



</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>