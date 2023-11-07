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
                                <a class="nav-link active text-white-50 fs-2 p-3" id="user-tab" href="#"
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
        <div class="col-md-12">
            <div class="tab-content m-4" id="myTabContent">
                <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                    <section>
                        <div class="m-4">
                            <h2 class="tittle" style="color: white;">Usuarios</h2>
                            <div class="d-flex jusitfy-content-center my-4">
                                <div class="exercise-search col-md-2">
                                    <input type="text" class="form-control" id="searchInput"
                                        placeholder="Buscar usuario">
                                </div>
                                <button class="btn-search mx-3" id="searchButton"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                                <div class="px-3 d-flex justify-content-end" style="border-left: 1px solid #ccc;">
                                    <a id="abrir-dialogo" data-toggle="model"
                                        class="btn btn-success border d-flex align-items-center">Nuevo Usuario</a>
                                    <!-- href al codigo para crear-->
                                </div>
                                <dialog id="model" class="col-md-4">
                                    <h2 class="text-center mb-3 ">Crear Usuario</h2>
                                    <form id="createUser" class="" action="/GYM/php/registro_usuario_be.php"
                                        method="POST">
                                        <hr> <!-- Línea divisora -->
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label col-md-2">Nombre</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <hr> <!-- Línea divisora -->
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label col-md-2">Usuario</label>
                                            <input type="text" class="form-control" id="username" name="username">
                                        </div>
                                        <hr> <!-- Línea divisora -->
                                        <div class="mb-3">
                                            <label for="contrasena" class="form-label col-md-2">Contraseña</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                        <hr> <!-- Línea divisora -->
                                        <div class="mb-3">
                                            <label for="rol" class="form-label col-md-2">Rol</label>
                                            <select class="form-select" id="rol" name="rol">
                                                <option value="0">Administrador</option>
                                                <option value="1">Usuario</option>
                                            </select>
                                        </div>
                                        <hr> <!-- Línea divisora -->
                                        <div class="mx-3 d-flex justify-content-end align-items-center">
                                            <button type="submit" class="buttonSave mx-2">Guardar Cambios</button>
                                            <button type="button" class="buttonClose mx-2"
                                                id="cerrar-dialogo">Cerrar</button>
                                        </div>
                                    </form>
                                </dialog>
                            </div>
                            <div class="col-md-12">
                                <table class="" style="width:100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" class="cont">ID</th>
                                            <th scope="col" class="col-md-2">Nombre</th>
                                            <th scope="col" class="col-md-2">Usuario</th>
                                            <th scope="col" class="col-md-2">Contraseña</th>
                                            <th scope="col" class="cont">Tipo</th>
                                            <th class="cont"></th>
                                            <th class="cont"></th>
                                            <th class="cont"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-bordered">
                                        <?php
                                            include 'php/conexion_be.php';

                                            // Consulta para contar el número total de usuarios
                                            $sqlCount = "SELECT COUNT(*) as total FROM usuario";
                                            $resultCount = $conexion->query($sqlCount);

                                            if ($resultCount->num_rows > 0) {
                                                $rowCount = $resultCount->fetch_assoc();
                                                $totalUsuarios = $rowCount['total'];
                                            } else {
                                                $totalUsuarios = 0;
                                            }

                                            // Define la cantidad de usuarios a mostrar por página
                                            $usuariosPorPagina = 50;

                                            // Obtiene el número de página desde la URL o establece el valor predeterminado en 1 si no se especifica.
                                            $pagina = isset($_GET['page']) ? intval($_GET['page']) : 1;

                                            // Calcula el índice de inicio y fin de los usuarios a mostrar en esta página
                                            $inicio = ($pagina - 1) * $usuariosPorPagina;

                                            // Consulta SQL modificada para obtener un subconjunto de usuarios basado en la página actual
                                            $sql = "SELECT Id, Nombre, Usuario, Contraseña, Rol FROM usuario LIMIT $inicio, $usuariosPorPagina";
                                            $result = $conexion->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td scope='row'>" . $row["Id"] . "</td>";
                                                    echo "<td>" . $row["Nombre"] . "</td>";
                                                    echo "<td>" . $row["Usuario"] . "</td>";
                                                    echo "<td>
                                                            <span class='password'></span>
                                                            <button class='show-password-button' data-password='" . $row["Contraseña"] . "'><i class='fa-solid fa-unlock'></i></button>
                                                        </td>";
                                                    if ($row["Rol"] == 0) {
                                                        echo "<td>Admin</td>";
                                                    } else{
                                                        echo "<td>Usuario</td>";
                                                    }
                                                    echo "<td><a id='btn-mod-user' class='icon-button fs-3' href='php/editar_be.php?id=" . $row['Id'] . "'> <i class='fa-regular fa-pen-to-square'></i> </a>  </td>";
                                                    echo "<td><a id='btn-routine' class='icon-button fs-3' href='coach_rutina.php?id=" . $row['Id'] . "'> <i class='fa-solid fa-person-running'></i></a></td>";
                                                    echo "<td><a id='btnDelUsuario' class='icon-button fs-3' href='php/delete_be.php?id=".$row['Id']."'><i class='fa-solid fa-trash'></i></a></td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='8'>No se encontraron registros.</td></tr>";
                                            }

                                            $conexion->close();
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                            <?php
                                include 'php/conexion_be.php';

                                // Consulta para contar el número total de usuarios
                                $sqlCount = "SELECT COUNT(*) as total FROM usuario";
                                $resultCount = $conexion->query($sqlCount);

                                if ($resultCount->num_rows > 0) {
                                    $rowCount = $resultCount->fetch_assoc();
                                    $totalUsuarios = $rowCount['total'];
                                } else {
                                    $totalUsuarios = 0;
                                }

                                // Define la cantidad de usuarios a mostrar por página
                                $usuariosPorPagina = 50;

                                // Obtiene el número de página desde la URL o establece el valor predeterminado en 1 si no se especifica.
                                $pagina = isset($_GET['page']) ? intval($_GET['page']) : 1;

                                // Calcula el índice de inicio y fin de los usuarios a mostrar en esta página
                                $inicio = ($pagina - 1) * $usuariosPorPagina;
                                $totalPaginas = ceil($totalUsuarios / $usuariosPorPagina);
                                
                                if ($pagina > 1) {
                                    $paginaAnterior = $pagina - 1;
                                    echo "<div class='d-flex justify-content-center align-items-center m-4'>
                                            <a href='coach_user.php?page=$paginaAnterior' class='btnTurnPage'>Anterior</a>
                                        </div>";
                                }
                                
                                if ($pagina < $totalPaginas) {
                                    $paginaSiguiente = $pagina + 1;
                                    echo "<div class='d-flex justify-content-center align-items-center m-4'>
                                            <a href='coach_user.php?page=$paginaSiguiente' class='btnTurnPage'>Siguiente</a>
                                        </div>";
                                }
    
                                $conexion->close();
                                ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <script>
    // Obtén el botón "Modificar Rutina" por su ID
    const btnModificarRutina = document.getElementById("btn-routine");
    // Agrega un evento click al botón
    btnModificarRutina.addEventListener("click", () => {
        // Redirige al usuario a la página coach_rutina.php
        window.location.href = "coach_rutina.php";
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
                passwordField.textContent = '';
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