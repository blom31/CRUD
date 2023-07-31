<?php include './pages/conexion.php';?>
<?php $conexion = new conexion(); /*se establece la conexion a la base de datos*/
$proyectos = $conexion->consultar("SELECT * FROM `proyectos` ORDER BY id DESC LIMIT 4");
?>
<?php #esta conexión es para mostrar un listado de todos los proyectos 
$proyectos_anteriores = $conexion->consultar("SELECT * FROM `proyectos` ORDER BY id");
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    // Configuración del correo electrónico
    $destinatario = "blom31@gmail.com";
    $asunto_email = "Consulta desde el formulario";

    // Cuerpo del correo electrónico
    $cuerpo_email = "Nombre: $nombre\n\n";
    $cuerpo_email .= "Asunto: $asunto\n\n";
    $cuerpo_email .= "Mensaje: $mensaje\n\n";

    // Envío del correo electrónico
    $enviado = mail($destinatario, $asunto_email, $cuerpo_email);

    if ($enviado) {
        echo '<script>alert("El correo electrónico ha sido enviado correctamente.");</script>';
    } else {
        echo '<script>alert("Error al enviar el correo electrónico. Por favor, inténtalo nuevamente.");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <title>Porfolio</title>
    </head>
    
    <body class="text-white">
        <!--======================================================================================================-->
        <!--===================== == == == == == == O  L  G  A  == == == == == == == =============================-->
        <!--======================================================================================================-->
        <header class="container-fluid">
            <div class="container-fuid row d-flex">
                <div class="container col-sm-12 col-md-4 fst-italic">
                    <h1> Olga Betancourt </h1>              
                </div>
                <div class="container col-sm-12 col-md-4 d-flex justify-content-center">
                    <p class=" fs-3 fst-italic fs">Porfolio</p>
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
                    
                    <div class="container-fluid">
                        <div class="row row-col-1 d-flex justify-content-around">
                            <?php
                                foreach($proyectos as $proyecto){
                            ?>  
                                    <div class="row col-sm-12 col-md-6">
                                        <div class="" style="width: 35rem;">
                                        <div class="row my-1 bg-gradient">
                                            <div class="col-md-5">
                                            <img src="./assets/<?php echo $proyecto['imagen'];?>" class="card-img-top" alt="...">
                                            </div>
                                            <div class="col-md-7">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $proyecto['nombre'];?></h5>
                                                <p class="card-text"><?php echo $proyecto['descripcion'];?></p>
                                                <a href="<?php echo $proyecto['enlace'];?>"target="_blank">Visitar Sitio Web</a>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                            <?php 
                            } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <section class="container fluid d-flex justify-content-between my-2">
            <div class="container fluid row d-flex justify-content-center">
                <div class="col col-sm-12 col-md-9">
                    <div class="row col-lg-3 bg-gradient"style="width: 30rem;">
                        <h4>Contáctame</h4> 
                        <form action="#" method="post" id="formulario">
                            <div class="col">
                                <input type="text" name="nombre" id="nombre" class="form-control my-1" placeholder="Nombre" required>
                                <input type="text" name="asunto" id="consulta" class="form-control my-1" placeholder="Asunto" required>
                                <textarea name="mensaje" id="mensaje" class="form-control" rows="3" placeholder="Escribe tu consulta" maxlength="2500" required></textarea>
                            </div> 
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary my-1"required>Enviar</button>  
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col col-sm-12 col-md-3 bg-gradient scroll">
                    <h4>Proyectos Anteriores</h4>
                    <ul class="nav flex-column ">
                        <?php 
                        foreach($proyectos_anteriores as $proyecto){
                            ?> 
                        <h6 class="card-title"><?php echo $proyecto['nombre'];?></h6>    
                        <li class="nav-item">
                            <a href="<?php echo $proyecto['enlace'];?>"target="_blank">Visitar Sitio Web</a>
                        </li>
                        <?php 
                            } 
                        ?>
                    </ul>          
                </div>
            </div>
           
        </section>
        
        </main>
    
        <!--======================================================================================================-->
        <!--===================== == == == == == == F O O T E R == == == == == == == =============================-->
        <!--======================================================================================================-->
        <footer>
            <div>
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