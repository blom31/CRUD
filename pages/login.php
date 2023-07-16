<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../ccs/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Inicia sesión</title>
   <style>

.login{
    width:100vw;
    height:100vh;
    background:url("../assets/975.jpg");
    background-size: cover;
    background-position: center;
}
   </style>
</head>

<body class="text-white login">
    <!--======================================================================================================-->
    <!--===================== == == == == == == O  L  G  A  == == == == == == == =============================-->
    <!--======================================================================================================-->
    <header class="container-fluid ">
        <div class="container-fuid row justify-content-evenly">
            <div class="container col-sm-12 col-md-4 fst-italic my-4">
                <?php 
                    echo " <h1> Olga Betancourt </h1>";
                ?>              

            </div>
            <div class="container col-sm-12 col-md-4">
                <p class=" fs-3 fst-italic fs my-4">FullStack Sotfware Developer Jr.</p>
            </div>
            
        </div>
       
    <!--======================================================================================================-->
    <!--============= == == == == == == F O R M U L A R I O == == == == == == == =============================-->
    <!--======================================================================================================-->
       
        <div class="container my-4 d-flex justify-content-center">
                
            <div class="fst-italic">
                <h2>Crud PortFolio</h2>

                <div class="container my-5" >
                    <form action="validar.php" method="post" id="formulario">
                        <div class="form-group row">
                            <div class="col-sm-12 my-5">
                                <input type="text" name="usuario" id="usuario" class="form-control my-4"
                                    placeholder="Usuario" required>
                                <input type="text" name="clave" id="clave" class="form-control "
                                    placeholder="Clave" required>
                            </div>   
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success" value="Enviar">Enviar</button>
                        </div>
                    </form>
            </div>
        </div>     
    </header> 
    
    <footer>
        
    </footer>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/javaScript.js"></script>
</body>

</html>