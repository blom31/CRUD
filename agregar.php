<?php include './pages/header.php'; ?>
<?php if($_POST){  

$nombre_proyecto = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$enlace = $_POST['enlace'];
$imagen = $_FILES['archivo']['name'];
$imagen_temporal=$_FILES['archivo']['tmp_name'];
$fecha = new DateTime();
$imagen= $fecha->getTimestamp()."_".$imagen;
move_uploaded_file($imagen_temporal,"assets/".$imagen);

    $conexion = new conexion();
    $sql="INSERT INTO `proyectos` (`id`, `imagen`, `nombre`, `descripcion`, `enlace`) VALUES (NULL, '$imagen', '$nombre_proyecto', '$descripcion', '$enlace')";
    $id_proyecto = $conexion->ejecutar($sql);
     header("Location:galeria.php");
     die();
 }
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
         header("Location:galeria.php");
         die();
 }

   if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
        header("Location:modificar.php?modificar=".$id);
        die();
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
    </style>
<body class="text-white bg-dark">
    <!--======================================================================================================-->
    <!--===================== == == == == == == L A Y O U T == == == == == == == =============================-->
    <!--======================================================================================================-->
    <main>   
            <div class="container-fuid">
                <div class="container col-sm-12 col-md-9 fst-italic">
                    <p class="lead mx-5">Carga de Proyectos</p>
                    <hr class="my-2">
                <div class="container">
            </div>
     <!--======================================================================================================-->
    <!--================== == == == == C A R G A  D E  P R O Y E C T O S == == == == ==========================-->
    <!--=======================================================================================================-->        
    
    <div class="row d-flex justify-content-center mb-2">
        <div class="col-md-10 col-sm-12">
            <div class="card carga">
                <div class="card-header">
                    Datos del Proyecto
                </div>
                <div class="card-body ">
                    <form action="galeria.php" method="post" enctype="multipart/form-data">
                <div>
                            <label for="archivo">Imagen del Proyecto</label>
                            <input required class="form-control" type="file" name ="archivo" id="archivo">
                        </div>    
                        <div>
                            <label for="nombre">Nombre del Proyecto</label>
                            <input required class="form-control" type="text" name="nombre" id="nombre">
                        </div>
                        <div>
                            <label for="descripcion">Agregar Descripción del Proyecto</label>
                            <textarea required class="form-control" name="descripcion" id="descripcion" cols="10" rows="4"></textarea>
                        <div>
                            <label for="enlace">Enlace del Proyecto</label>
                            <input required class="form-control mb-2" type="text" name="enlace" id="enlace">
                        </div>
                        <div>
                            <input class="btn bg-info" type="submit" value="Cargar Proyecto">
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</main>
    <!--======================================================================================================-->
    <!--===================== == == == == == ==  F O O T E R  == == == == == == == =============================-->
    <!--======================================================================================================-->
    <?php include './pages/footer.php'; ?>