<?php include './pages/header.php';

if($_GET){
    if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
       
        $_SESSION['id_proyecto'] = $id;
        #vamos a consultar para llenar la tabla 
        $conexion = new conexion();
        $proyectos= $conexion->consultar("SELECT * FROM `proyectos` where id=".$id);
     
    }

 } 
  #vamos a consultar para llenar la tabla 
  $conexion = new conexion();
  $proyectos= $conexion->consultar("SELECT * FROM `proyectos`");
?> 
<style>
        .carga{
            background-color: rgba(22, 1, 43, 0.281);
        }
        .tabla{
            background-color: rgb(63, 8, 114);
        }
    </style>
<body class="text-white">
    <!--======================================================================================================-->
    <!--===================== == == == == == == L A Y O U T == == == == == == == =============================-->
    <!--======================================================================================================-->
    <main>   
            <div class="container-fuid">
                <div class="container col-sm-12 col-md-9 fst-italic">
                    <div>
                        <p class="lead mx-5">Modificar Proyectos</p>
                    </div>
                    <hr class="my-2">
                <div class="container">
            </div>
     <!--======================================================================================================-->
    <!--================== == == == == B O R R A R   P R O Y E C T O S == == == == ==========================-->
    <!--=======================================================================================================-->        
    <div class="carga my-3 row">
        <div class="card-header">
            Edición de Proyectos
       </div>
        <div class="row d-flex justify-content-center">
            <div class="table-responsive">
                <table class="table text-white tabla">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Modificar</th>
                        </tr>
                    </thead>
                    <tbody >    
                        <?php #leemos proyectos 1 por 1
                            foreach($proyectos as $proyecto){ ?>
                        <tr >
                            <td><?php echo $proyecto['nombre'];?></td>
                            <td> <img width="200" src="./assets/<?php echo $proyecto['imagen'];?>" alt="">  </td>
                            <td><a name="modificar" id="modificar" class="btn btn-warning" href="?modificar=<?php echo $proyecto['id'];?>">Modificar</a></td>
                            </tr>
                        <?php #cerramos la llave del foreach
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-fuid">
                <div class="container col-sm-12 col-md-10 fst-italic">
                    <p class="lead mx-5">Modificar Proyectos</p>
                    <hr class="my-2">
                    <div class="container">                    
                </div>
                <div class="row d-flex justify-content-center mb-2">
        <div class="col-md-8 col-sm-12">
            <div class="card carga">
                <div class="card-header">
                    Datos del Proyecto
                </div>
                <?php #leemos proyectos 1 por 1
                    foreach($proyectos as $fila){ 
                ?>
                <div>
                    <form action="modificar.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="archivo">Imagen del Proyecto - Se actualizara al grabar los cambios</label>
                        <br>
                        <br>
                        <div class="d-flex justify-content-center align-item-center">
                            <img class="img__modificar " style="width: 23rem;" src="./assets/<?php echo $fila['imagen']; ?>">
                        </div>
                        <p>Seleccione un nueva Imagen si desea modificar</p>
                        <input class="form-control" type="file" name ="archivo" id="archivo" value="<?php echo $fila['imagen'];?>">
                        <div>
                            <label for="nombre">Nombre del Proyecto</label>
                            <input required class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $fila['nombre'];?>">
                        </div>
                        <div>
                            <label for="descripcion">Agregar Descripción del Proyecto</label>
                            <textarea required class="form-control" name="descripcion" id="descripcion" cols="8" rows="3"value="<?php echo $fila['descripcion'];?>"></textarea>
                        <div>
                            <label for="enlace">Enlace del Proyecto</label>
                            <input required class="form-control mb-2" type="text" name="enlace" id="enlace" value="<?php echo $fila['enlace'];?>">
                        </div>
                        <div>
                            <input class="btn bg-info" type="submit" value="Modificar Proyecto">
                        </div>
                    </form>
                </div> 
                <?php
                    }?>
            </div>
        </div>
    </div> 
        </div>
      
            </div>
        </div>
    </div>

    </main>
    <!--======================================================================================================-->
    <!--===================== == == == == == ==  F O O T E R  == == == == == == == =============================-->
    <!--======================================================================================================-->
    <?php include './pages/footer.php'; ?>