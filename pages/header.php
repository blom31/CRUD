<?php ob_start();
set_error_handler("var_dump");
include 'conexion.php';
session_start(); #inicializamos variables de sesion
 #si esta logueado lo dejo trabajar y sino lo mando al login de nuevo 
 if ( isset( $_SESSION['usuario'] )!='Olga'){
    header("location:login.php");
    die();
} ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./ccs/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Administrador</title>
    <style>
        header{
           
            background-color: rgba(22, 1, 43, 0.281);
        }
    </style>
    </head>

<body>
    <header class="container-fluid text-white">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container navegacion">
                <a class="navbar-brand fst-italic text-white" href="index_Administrador.php">
                <h3>Olga Betancourt</h3>
                </a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menue"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="menue">
                    <ul class="navbar-nav list w-100 justify-content-end">
                        <li class="nav-item fs-5">
                            <a class="nav-link active text-white border-end mx-3 " href="index_Administrador.php">Proyectos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">A B M</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="agregar.php">Agregar</a></li>
                                    <li><a class="dropdown-item" href="borrar.php">Borrar</a></li>
                                    <li><a class="dropdown-item" href="modificar.php">Modificar</a></li>
                                </ul>
                        </li>
                        <li class="nav-item fs-5">
                            <a class="nav-link text-white" href="logout.php">Cerrar Sesión: <span><?php echo $_SESSION['usuario']; ?></span></a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            </div>
        </nav>
    </header>   
    
</body>
</html>