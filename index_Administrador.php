<?php include './pages/header.php'; ?>

<!--================= == == == == == == C O N E X I O N   == == == == == == == ===========================-->

<?php $conexion = new conexion();# es un objeto de tipo conexion,
      $proyectos= $conexion->consultar("SELECT * FROM `proyectos` ORDER BY id DESC LIMIT 4"); ?>

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
                    <div class="container-fluid">
                        <div class="row row-cols-1 d-flex justify-content-around">
                            <?php
                            foreach($proyectos as $proyecto){
                            ?>  
                            <div class="row col-sm-12 col-md-6">
                                <div class="" style="width: 35rem;">
                                    <div class="row my-1 border-dark  bg-gradient">
                                        <div class="col-md-5">
                                             <img src="./assets/<?php echo $proyecto['imagen'];?>" class="card-img-top" alt="...">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card-body">
                                                 <h5 class="card-title"><?php echo $proyecto['nombre'];?></h5>
                                                <p class="card-text"><?php echo $proyecto['descripcion']?></p>
                                                 <a href="<?php echo $proyecto['enlace'];?>">Visitar Sitio Web</a>
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
            </div>
        </div>
        
</main>
<!--======================================================================================================-->
<!--===================== == == == == == == F O O T E R  == == == == == == == ============================-->
<!--======================================================================================================-->
<div class="my-5">
<?php include './pages/footer.php'; ?>
</div>