<?php
include_once 'app/Conexion.inc.php';
include_once 'app/repositoriousuario.inc.php';
conexion::abrir_conexion();
$usuarios = repositoriousuario::obtener_numero_usuarios(conexion::obtener_conexion());
conexion::cerrar_conexion();

?>


<div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <a class="navbar-brand" href="index.php">Icono</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="bi bi-list-task"></i>  Entradas <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-star"></i>  Favoritos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Autores
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Yeison</a>
                            <a class="dropdown-item" href="#">Andres</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Angel</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li><a class="nav-link" href="#"><i class="bi bi-people"></i> 
                        <?php echo $usuarios;
                        ?>

                        </a>
                    </li>
                    <li><a class="nav-link" href="#"><i class="bi bi-box-arrow-in-right"></i>  Iniciar sesión</a></li>
                    <li><a class="nav-link" href="registro.php"><i class="bi bi-person-plus"></i>  Registrarme</a></li>
                </ul>
            </div>
        </nav>
    </div>