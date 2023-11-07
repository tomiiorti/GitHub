<?php
    session_start();

    if (isset($_SESSION['Client'])){
        header("location: cliente.php") ;
    }
    if (isset($_SESSION['Coach'])){
        header("location: coach_user.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Gimnasio</title>
</head>
<body class="body">
    <header class="cabeza d-flex justify-content-center align-items-center fs-2">
        <a class="" href="#">Gimnasio</a>
    </header>
    <!--DIVision-->
    <main class="main d-flex align-items-center justify-content-center">
        <div class="d-flex justify-content-center flex-wrap align-items-center">
            <section class="col-md-12 d-flex justify-content-center align-items-center">
                <div class=" login d-flex justify-content-center " style="height: auto;">
                    <form class="form row m-5" action="/GYM/php/login_usuario_be.php" method="POST" style="flex-direction: column; align-items: center;">
                        <div class="tittle my-2" style="border-bottom: 1px solid #fff;">
                            <p class="fs-2">Bienvenidos</p>
                        </div>
                        <div class="my-4">
                            <label for="username" class="form-label visually-hidden">Usuario</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="username" placeholder="Usuario" name="username" required>
                            </div>
                            </div>
                        <div class="mb-5">
                            <label for="password" class="form-label visually-hidden">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password" required>
                            </div>
                        </div>
                        <div class="mb-4">
                        <button type="submit" name="send2" class="btn btn-primary w-100">Ingresar</button>
                        </div>
                    </form>
                </div>
            </section>
            <!--DIVision-->
            <!--
            <aside class="col-md-4 d-flex align-items-center">
                <div class="my-5">
                    <div class="row">
                        <div id="productCarousel2" class="carousel slide my-3" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="col-md-8 mx-auto p-3">
                                        <div class="card product-card">
                                            <img src="./img/img_1616522671_crop-PhotoRoom.png-PhotoRoom.png" class="card-img-top" alt="Imagen del producto 1" style="height: 30%;">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre del Producto 1</h5>
                                                <p class="card-text">Breve descripción del producto 1.</p>
                                                <p class="card-text">$XX.XX</p>
                                                <button class="btn btn-primary">Agregar al carrito</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="col-md-8 mx-auto p-3">
                                        <div class="card">
                                            <img src="./img/img_1616522671_crop-PhotoRoom.png-PhotoRoom.png" class="card-img-top" alt="Imagen del producto 2">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre del Producto 2</h5>
                                                <p class="card-text">Breve descripción del producto 2.</p>
                                                <p class="card-text">$XX.XX</p>
                                                <button class="btn btn-primary">Agregar al carrito</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="col-md-8 mx-auto p-3">
                                        <div class="card">
                                            <img src="./img/img_1616522671_crop-PhotoRoom.png-PhotoRoom.png" class="card-img-top" alt="Imagen del producto 1">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre del Producto 3</h5>
                                                <p class="card-text">Breve descripción del producto 3.</p>
                                                <p class="card-text">$XX.XX</p>
                                                <button class="btn btn-primary">Agregar al carrito</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#productCarousel2" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#productCarousel2" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            -->
        </div>
    <!--DIVision--> 
    </main>        
    <footer class="d-flex align-items-center justify-content-center text-center container-fluid" >
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="https://github.com/tomiiorti" target="_blank" class="me-4 github" rel="nofollow">
                        <i class="fab fa-github"></i> GitHub
                    </a>
                    <a href="https://www.linkedin.com/in/tomasorti" target="_blank" class="me-4 linkedin" rel="nofollow">
                        <i class="fab fa-linkedin"></i> Linkedin
                    </a>
                    <a href="https://www.instagram.com/tomiiorti" target="_blank" class="me-4 instagram" rel="nofollow">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                    <a href="mailto:tomas.orti99@gmail.com" class="me-4 gmail">
                        <i class="fas fa-envelope"></i> Gmail
                    </a>
                    <a href="https://wa.me/+5401134191647" target="_blank" class="whatsapp" rel="nofollow">
                        <i class="fab fa-whatsapp"></i> Mi Whatsapp
                    </a>
                </div>
            </div>
        </div>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>