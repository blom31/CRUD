<?php include './pages/header.php';

 if($_GET){

    #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes
   if(isset($_GET['borrar'])){
        $id = $_GET['borrar'];
        $conexion = new conexion();

        #recuperamos la imagen de la base antes de borrar 
        $imagen = $conexion->consultar("select imagen FROM  `proyectos` where id=".$id);
        #la borramos de la carpeta 
        unlink("imagenes/".$imagen[0]['imagen']);

        #borramos el registro de la base 
        $sql ="DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$id; 
        $id_proyecto = $conexion->ejecutar($sql);
         #para que no intente borrar muchas veces
         header("Location:borrar.php");
         die();
     }
 } 
  #vamos a consultar para llenar la tabla 
  $conexion = new conexion();
  $proyectos= $conexion->consultar("SELECT * FROM `proyectos`");
?> 
<style>
        .carga{
            background-color: rgba(22, 1, 43, 0.712);
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
                        <p class="lead mx-5">Borrar Proyectos</p>
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
                <table class="carga table text-white "> 
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody >    
                        <?php #leemos proyectos 1 por 1
                            foreach($proyectos as $proyecto){ ?>
                        <tr >
                            <td><?php echo $proyecto['nombre'];?></td>
                            <td> <img width="200" src="./assets/<?php echo $proyecto['imagen'];?>" alt="">  </td>
                            <td><a name="eliminar" id="eliminar" class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'];?>">Borrar</a></td>
                            </tr>
                        <?php #cerramos la llave del foreach
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </main>
    <!--======================================================================================================-->
    <!--===================== == == == == == ==  F O O T E R  == == == == == == == =============================-->
    <!--======================================================================================================-->
    <?php include './pages/footer.php'; ?>