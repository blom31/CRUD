<?php include './pages/conexion.php';?>
<?php $conexion = new conexion(); /*se establece la conexion a la base de datos*/
$proyectos = $conexion->consultar("SELECT * FROM `proyectos`");

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./ccs/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Portfolio</title>
</head>

<body class="text-white">
    <!--======================================================================================================-->
    <!--===================== == == == == == == O  L  G  A  == == == == == == == =============================-->
    <!--======================================================================================================-->
    <header class="container-fluid">
        <div class="container-fuid row justify-content-evenly">
            <div class="container col-sm-12 col-md-4 fst-italic">
                <?php 
                    echo " <h1> Olga Betancourt </h1>";
                ?>              

            </div>
            <div class="container col-sm-12 col-md-4">
                <p class=" fs-3 fst-italic fs">FullStack Sotfware Developer Jr.</p>
            </div>
            
        </div>
    </header>    
    <!--======================================================================================================-->
    <!--===================== == == == == == == L A Y O U T == == == == == == == =============================-->
    <!--======================================================================================================-->
    <main>
    <div class="container-fluid">
        <div class=" container-fluid">
            <a class="navbar-brand text-white fs-3 fst-italic">
                <h3>Mi portfolio</h3>
            </a>
            <div class="row d-flex justify-content-around">
            <?php
                foreach($proyectos as $proyecto){
            ?>
            <div class=""style="width: 19rem;">
                <img class="card-img-top" src="./assets/<?php echo $proyecto['imagen'];?>" alt="...">
                    <div class="card-body text-dark bg-light">
                        <h5 class="card-text">
                            <?php echo $proyecto['nombre'];?>
                        </h5>
                        <p>
                            <?php echo $proyecto['descripcion'];?>
                        </p>
                        <a href=""><?php echo $proyecto['enlace'];?></a>
                    </div>
            </div>
            <?php 
            } 
            ?>
            <div class=" card row col-lg-3 bg-transparent "style="width: 18rem;">
                <h4>Contáctame</h4> 
                <form action="./pages/enviar.php" method="post" id="formulario" class="">
                    <div class="card row">
                        <input type="text" name="nombre" id="nombre" class="form-control my-1" placeholder="Nombre" required>
                        <input type="text" name="asunto" id="consulta" class="form-control my-1" placeholder="Asunto" required>
                        <textarea name="mensaje" id="mensaje" class="form-control" rows="10" placeholder="Escribe tu consulta" maxlength="2500" required></textarea>
                    </div> 
                    <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary my-1"required>Enviar</button>  
                    </div>
                        
                </form>
            </div>
        </div>
    </div>    
    </main>

    <!--======================================================================================================-->
    <!--===================== == == == == == == F O O T E R == == == == == == == =============================-->
    <!--======================================================================================================-->
    <footer>
        <div class="my-5">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">About me</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="https://www.linkedin.com/in/olga-betancourt-86473b101/" target="_blank">LinkedIn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="https://github.com/blom31"target="_blank">Github</a>
                </li>
                <li class="nav-item">
                    <a id="contacto" class="nav-link text-white" href="#">WhatsApp</a>
                </li>
            </ul>
        </div>
        
    </footer>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/contacto.js"></script>
</body>

</html>