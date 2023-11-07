<?php
    session_start();

    if(!isset($_SESSION['Coach'])){
        header("location: login.php") ;
        echo '
            <script>
                alert("Por favor debes iniciar sesion");
            </script>
            ';
        session_destroy();
        die();
}
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
    <title>Administrador</title>
</head>

<body class="body">
    <header>
        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="tittle text-center navbar-brand mx-3" style="width:70px" href="#">#Gimnasio</a>
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
                                <a class="nav-link active text-white-50 fs-2 p-3" id="user-tab" href="coach_user.php"
                                    aria-selected="false">Usuarios</a>
                            </li>
                            <li class="nav-item" role-presentation>
                                <a class="nav-link text-white-50 fs-2 p-3" id="exercise-tab" href="#"
                                    aria-selected="true">Ejercicios</a>
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
        <div class="col-md-12">
            <div class="tab-content m-4" id="myTabContent">
                <h2 class="tittle m-4" style="color: white;">Ejercicios</h2>
                <!-- Agrega esta sección dentro de tu <main> -->
                <section class="exercise-section m-4">
                    <!-- Buscador -->
                    <div class="d-flex jusitfy-content-center my-4">
                        <div class="exercise-search col-md-2">
                            <input type="text" class="form-control" id="searchInput2" placeholder="Buscar ejercicio">
                        </div>
                        <button class="btn-search mx-3" id="searchButton2"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                        <div class="px-3 d-flex justify-content-end" style="border-left: 1px solid #ccc;">
                            <a id="newUser" data-toggle="model"
                                class="btn btn-success border d-flex align-items-center">Nuevo Ejercicio</a>
                            <!-- href al codigo para crear-->
                        </div>
                        <dialog id="modalNewUser" class="col-md-4">
                            <h2 class="text-center mb-3">Crear un Ejercicio</h2>
                            <form id="createRotuine" action="/GYM/php/new_routine.php" method="POST"
                                enctype="multipart/form-data">
                                <hr> <!-- Línea divisora -->
                                <div class="mb-3">
                                    <label for="nombre" class="form-label col-md-2">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <hr> <!-- Línea divisora -->
                                <div class="mb-3">
                                    <label for="usuario" class="form-label col-md-2">Imagen (URL)</label>
                                    <input type="file" class="form-control" id="img" name="img">
                                </div>
                                <hr> <!-- Línea divisora -->
                                <div class="mb-3">
                                    <label for="rol" class="form-label col-md-2">Descripción</label>
                                    <input type="text" class="form-control" id="desc" name="desc">
                                </div>
                                <hr> <!-- Línea divisora -->
                                <div class="mx-3 d-flex justify-content-end align-items-center">
                                    <button type="submit" class="buttonSave mx-2">Guardar Cambios</button>
                                    <button type="button" class="buttonClose mx-2" id="cerrar-dialogo2">Cerrar</button>
                                </div>
                            </form>
                        </dialog>
                    </div>
                    <div class="d-flex flex-column" style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc;">
                        <div class="ejercicios d-flex justify-content-center flex-wrap py-4">

                            <?php
                                include 'php/conexion_be.php';

                                $sqlCount = "SELECT COUNT(*) as total FROM ejercicio";
                                $resultCount = $conexion->query($sqlCount);

                                if ($resultCount->num_rows > 0) {
                                    $rowCount = $resultCount->fetch_assoc();
                                    $totalEjercicio = $rowCount['total'];
                                } else {
                                    $totalEjercicio = 0;
                                }

                                // Define la cantidad de ejercicios a mostrar por página
                                $ejerciciosPorPagina = 36;

                                // Obtiene el número de página desde la URL o establece el valor predeterminado en 1 si no se especifica.
                                $pagina = isset($_GET['page']) ? intval($_GET['page']) : 1;

                                // Calcula el índice de inicio y fin de los usuarios a mostrar en esta página
                                $inicio = ($pagina - 1) * $ejerciciosPorPagina;

                                $sql = "SELECT IDEjercicio, Nombre, Imagen, Descripcion FROM ejercicio LIMIT $inicio, $ejerciciosPorPagina";
                                $result = $conexion->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="card m-2 justify-content-between flex-column align-items-center" style="width:140px; min-width:140px; min-height:270">
                                                    <div class="text-center p-1 py-2" style="height: 30px;">
                                                        <p>' . $row["Nombre"] . '</p>
                                                    </div>
                                                    <div class="img d-flex align-items-center m-1" style="height: 101.08px;">
                                                        <img src="img_ejercicio/' . $row['Imagen'] . '" alt="Descripción de la imagen" class="img-fluid">
                                                    </div>
                                                    <div class="text-center d-flex justify-content-between flex-column">
                                                        <div style="height: 50px;">
                                                            <a class="btn btn-primary rounded-pill m-3" id="" href="php/editar_ejercicio.php?id='.$row['IDEjercicio'].'"><i class="fa-regular fa-pen-to-square"></i></a><!-- Botón para Modificar -->
                                                            <a class="btn btn-danger rounded-pill m-3" id="btnDelEjercicio" href="php/delete_ejercicio_be.php?id='.$row['IDEjercicio'].'"><i class="fa-solid fa-trash"></i></a> <!-- Botón para Eliminar -->
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
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <?php 
                            
                            include 'php/conexion_be.php';
                            $sqlCount = "SELECT COUNT(*) as total FROM ejercicio";
                            $resultCount = $conexion->query($sqlCount);

                            if ($resultCount->num_rows > 0) {
                                $rowCount = $resultCount->fetch_assoc();
                                $totalEjercicio = $rowCount['total'];
                            } else {
                                $totalEjercicio = 0;
                            }

                            // Define la cantidad de ejercicios a mostrar por página
                            $ejerciciosPorPagina = 36;

                            // Obtiene el número de página desde la URL o establece el valor predeterminado en 1 si no se especifica.
                            $pagina = isset($_GET['page']) ? intval($_GET['page']) : 1;

                            // Calcula el índice de inicio y fin de los usuarios a mostrar en esta página
                            $inicio = ($pagina - 1) * $ejerciciosPorPagina;
                            
                            // Crea enlaces de paginación
                            $totalPaginas = ceil($totalEjercicio / $ejerciciosPorPagina);

                            if ($pagina > 1) {
                                $paginaAnterior = $pagina - 1;
                                echo "<div class='d-flex justify-content-center align-items-center mb-4'>
                                        <a href='coach_ejercicio.php?page=$paginaAnterior' class='btnTurnPage'>Anterior</a>
                                    </div>";
                            }
                            
                            if ($pagina < $totalPaginas) {
                                $paginaSiguiente = $pagina + 1;
                                echo "<div class='d-flex justify-content-center align-items-center mb-4'>
                                        <a href='coach_ejercicio.php?page=$paginaSiguiente' class='btnTurnPage'>Siguiente</a>
                                    </div>";
                            }

                            $conexion->close();
                            ?>
                        </div>
                    </div>

                </section>
                <div class="col-md-12 d-flex justify-content-end">
                    <button class="buttonSave m-3" id="btnCreateSerie"><i class="fa-solid fa-copy"></i> Crear Serie</button><!-- Botón para Modificar -->
                    <button class="buttonClose m-3" id="btnDeleteSerie"><i class="fa-solid fa-trash"></i> Eliminar Serie</button> <!-- Botón para Eliminar -->
                </div>
            </div>
            
        </div>
        <dialog id="createSerie" class="col-md-4">
            <h2 class="text-center mb-3">Crear serie</h2>
            <form id="createRoutine" action="php/new_serie_be.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label col-md-2"></label>
                    <input type="text" class="form-control" id="desc" name="desc" placeholder="Ejemplo: 3x12"></input>
                </div>
                <hr> <!-- Línea divisora -->
                <div class="mx-3 d-flex justify-content-end align-items-center">
                    <button type="submit" class="buttonClose mx-2" id="">Guardar Cambios</button>
                    <button type="button" class="buttonSave mx-2" id="btnCloseCreateSerie">Cerrar</button>
                </div>
            </form>
        </dialog>
        <dialog id="deleteSerie" class="col-md-4">
            <h2 class="text-center mb-3">Eliminar serie</h2>
            <form id="createRoutine" action="php/delete_serie_be.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label col-md-2"></label>
                    <select class="form-select" id="idSerie" name="idSerie">
                        <?php
                            include 'php/conexion_be.php';

                            $sql = "SELECT * FROM repeticiones ORDER BY Descripcion ASC"; // Asegúrate de seleccionar el ID junto con la descripción
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
                    <button type="submit" class="buttonClose mx-2" id="">Eliminar</button>
                    <button type="button" class="buttonSave mx-2" id="btnCloseDeleteSerie">Volver</button>
                </div>
            </form>
        </dialog>
    </main>
    <script>
    const btnCreateSerie = document.getElementById("btnCreateSerie");
    const btnCloseCreateSerie = document.getElementById("btnCloseCreateSerie");
    const createSerie = document.getElementById("createSerie");

    btnCreateSerie.addEventListener("click", () => {
        createSerie.showModal();
    });

    btnCloseCreateSerie.addEventListener("click", () => {
        createSerie.close();
    });
    </script>
    <script>
    const btnDeleteSerie = document.getElementById("btnDeleteSerie");
    const btnCloseDeleteSerie = document.getElementById("btnCloseDeleteSerie");
    const deleteSerie = document.getElementById("deleteSerie");

    btnDeleteSerie.addEventListener("click", () => {
        deleteSerie.showModal();
    });

    btnCloseDeleteSerie.addEventListener("click", () => {
        deleteSerie.close();
    });
    </script>
    <script>
    const abrirDialogo = document.getElementById("abrir-dialogo");
    const cerrarDialogo = document.getElementById("cerrar-dialogo");
    const dialogo = document.getElementById("model");

    abrirDialogo.addEventListener("click", () => {
        dialogo.showModal();
    });

    cerrarDialogo.addEventListener("click", () => {
        dialogo.close();
    });
    </script>
    <script>
    const btnAbrirModalEjercicio =
        document.querySelector("#btnModEjercicio");
    const btnCerrarModalEjercicio =
        document.querySelector("#btn-cerrar-modal-ejercicio");
    const modalEjercicio =
        document.querySelector("#modalEjercicio");

    btnAbrirModalEjercicio.addEventListener("click", () => {
        modalEjercicio.showModal();
    });

    btnCerrarModalEjercicio.addEventListener("click", () => {
        modalEjercicio.close();
    });
    </script>
    <script>
    const abrirModal = document.getElementById("newUser");
    const cerrarModal = document.getElementById("cerrar-dialogo2"); // Puedes agregar un botón para cerrar el modal

    const modal = document.getElementById("modalNewUser");

    abrirModal.addEventListener("click", () => {
        modal.showModal();
    });

    cerrarModal.addEventListener("click", () => {
        modal.close();
    });
    </script>
    <script>
    const btnEliminarEjercicio = document.querySelector("#btnDelEjercicio");

    btnEliminarEjercicio.addEventListener("click", () => {
        const confirmacion = window.confirm("¿Estás seguro de que deseas eliminar este ejercicio?");

        if (confirmacion) {
            // Aquí colocarías el código para eliminar el ejercicio.
            // Puedes usar una solicitud AJAX o la lógica necesaria para eliminar el elemento de tu base de datos o lista de ejercicios.
        } else {
            // El usuario ha cancelado la eliminación. No hagas nada.
        }
    });
    </script>
    <script>
    const btnEliminarUsuario = document.querySelector("#btnDelUsuario");

    btnEliminarUsuario.addEventListener("click", () => {
        const confirmacion = window.confirm("¿Estás seguro de que deseas eliminar este usuario?");

        if (confirmacion) {
            // Aquí colocarías el código para eliminar el ejercicio.
            // Puedes usar una solicitud AJAX o la lógica necesaria para eliminar el elemento de tu base de datos o lista de ejercicios.
        } else {
            // El usuario ha cancelado la eliminación. No hagas nada.
        }
    });
    </script>
    <script>
    const showPasswordButtons = document.querySelectorAll('.show-password-button');

    showPasswordButtons.forEach(button => {
        button.addEventListener('click', function() {
            const passwordField = button.previousElementSibling;
            const showImage = button.querySelector('.show-image');
            const hideImage = button.querySelector('.hide-image');
            if (passwordField.classList.contains('visible')) {
                passwordField.textContent = '******';
                passwordField.classList.remove('visible');
                showImage.style.display = 'block';
                hideImage.style.display = 'none';
            } else {
                const password = button.getAttribute('data-password');
                passwordField.textContent = password;
                passwordField.classList.add('visible');
                showImage.style.display = 'none';
                hideImage.style.display = 'block';
            }
        });
    });
    </script>

    <script>
    document.getElementById('searchButton').addEventListener('click', function() {
        const searchInput = document.getElementById('searchInput');
        const searchTerm = searchInput.value.trim().toLowerCase();

        // Aquí puedes realizar la lógica de búsqueda utilizando 'searchTerm'
        // Por ejemplo, puedes filtrar la tabla para mostrar solo los resultados coincidentes.

        // Ejemplo: Filtrar los resultados en la tabla
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const rowData = row.textContent.toLowerCase();
            if (rowData.includes(searchTerm)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    });
    </script>
    <script>
    document.getElementById('searchButton2').addEventListener('click', function() {
        const searchInput = document.getElementById('searchInput2');
        const searchTerm = searchInput.value.trim().toLowerCase();

        // Obtén todas las tarjetas
        const cards = document.querySelectorAll('.card');

        // Itera a través de las tarjetas y compara el término de búsqueda con el contenido
        cards.forEach(card => {
            const cardContent = card.textContent.toLowerCase();
            if (cardContent.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>