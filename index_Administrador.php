<!--======================================================================================================-->
<!--================= == == == == == == M E N U   A  B  S  == == == == == == == ==========================-->
<!--======================================================================================================-->
<?php include './pages/header.php'; ?>

<!--================= == == == == == == C O N E X I O N   == == == == == == == ===========================-->

<?php $conexion = new conexion();# es un objeto de tipo conexion,
      $proyectos= $conexion->consultar("SELECT * FROM `proyectos`"); ?>

<body class="text-white">
    
 
    <!--======================================================================================================-->
    <!--===================== == == == == == == L A Y O U T == == == == == == == =============================-->
    <!--======================================================================================================-->
    <main>   
        <div class="container-fluid">
            <div class="container-fuid">
                <div class=" col-sm-12 fst-italic">
                    <p class="lead mx-5">Proyectos Cargados en base de datos</p>
                    <hr class="my-2">
                    <div class="row d-flex justify-content-around">
            <?php
                foreach($proyectos as $proyecto){
            ?>
            <div class="col-lg-3"style="width: 18rem;">
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
                <p class="lead">Utilidades</p> 
                <p class="my-2">En A B M podra:  <br>
                    <br> Dar de Alta un nuevo proyecto <br> 
                    Dar de Baja un proyecto <br>
                    Modificar un proyecto 
            </div>
        </div>
    </div>     
</main>
<!--======================================================================================================-->
<!--===================== == == == == == == F O O T E R  == == == == == == == ============================-->
<!--======================================================================================================-->
<?php include './pages/footer.php'; ?>