<?php 
include './pages/header.php';

if (isset($_GET['modificar'])) {
    $id = $_GET['modificar'];
   #imprimo el id, para saber si me traigo el parametro de forma correcta
   # echo "ID del proyecto seleccionado: " . $id;
    $_SESSION['id_proyecto'] = $id;
    #vamos a consultar para llenar formulario 
    $conexion = new conexion();
    $fila= $conexion->consultar("SELECT nombre, imagen, descripcion, enlace FROM `proyectos` WHERE id = $id");
}

if (isset($_POST['nombre'])) {
    $id = $_SESSION['id_proyecto'];

    #levantamos los datos del formulario
    $nombre_proyecto = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $enlace = $_POST['enlace'];
    
    if (isset($_FILES['archivo']['name'])) {
        #debemos recuperar la imagen actual y borrarla del servidor para lugar pisar con la nueva imagen en el server y en la base de datos
        #recuperamos la imagen de la base antes de borrar 
        $imagen = $conexion->consultar("SELECT imagen FROM  `proyectos` where id=".$id);
        #la borramos de la carpeta 
        unlink("./assets/".$imagen[0]['imagen']);
        #nombre de la nueva imagen
        $imagen_nueva = $_FILES['archivo']['name'];
        #tenemos que guardar la nueva imagen en una carpeta 
        $imagen_temporal=$_FILES['archivo']['tmp_name'];
        #creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
        $fecha = new DateTime();
        $imagen_nueva= $fecha->getTimestamp()."_".$imagen_nueva;
        move_uploaded_file($imagen_temporal,"./assets/".$imagen_nueva);
        #echo var_dump($nombre_proyecto, $descripcion, $imagen, $imagen_temporal);
    } else {
        # si no se selecciona una nueva imagen, mantenemos la imagen actual
        $imagen_nueva = $fila[0]['imagen'];
    }

    #creo una instancia(objeto) de la clase de conexion
    $conexion = new conexion();
    $sql = "UPDATE `proyectos` SET `nombre` = '$nombre_proyecto' , `imagen` = '$imagen_nueva', `descripcion` = '$descripcion', `enlace` = '$enlace' WHERE `proyectos`.`id` = '$id';";
    $id_proyecto = $conexion->ejecutar($sql);
    #mensaje de modificación exitosa
    
    header("location:modificar.php");
    #echo '<script>proyectmodificado();</script>';
    die();
}
$conexion = new conexion();
$proyectos= $conexion->consultar("SELECT * FROM `proyectos`");
?>
<script>
    // Función para redirigir al usuario al hacer clic en el botón Cancelar
    function cancelar() {
        // Puedes redirigir al usuario a la página principal o a donde desees
        window.location.href = "index_Administrador.php";
    }
</script>
<style>
        .carga{
            background-color: rgba(22, 1, 43, 0.712);
        }
    </style>
<body class="text-white bg-dark">
    <!--======================================================================================================-->
    <!--===================== == == == == == == L A Y O U T == == == == == == == =============================-->
    <!--======================================================================================================-->
    <main>   
            <div class="container-fuid">
                <div class="container col-sm-12 col-md-9 fst-italic">
                    <div>
                        <p class="lead mx-5">Modificar</p>
                    </div>
                    <hr class="my-2">
                <div class="container">
            </div>
    <!--======================================================================================================-->
    <!--================== == == == == V I S T A   D E  P R O Y E C T O S == == == == ========================-->
    <!--======================================================================================================-->  

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
                            <th>Descripcion</th>
                            <th>Enlace</th>
                            <th>Modificar</th>
                        </tr>
                    </thead>
                    <tbody >    
                        <?php #leemos proyectos 1 por 1
                            foreach($proyectos as $proyecto){ ?>
                        <tr >
                            <td><?php echo $proyecto['nombre'];?></td>
                            <td> <img width="200" src="./assets/<?php echo $proyecto['imagen'];?>" alt="">  </td>
                            <td><?php echo $proyecto['descripcion'];?></td>
                            <td><?php echo $proyecto['enlace'];?></td>
                            <td><a name="modificar" id="modificar" class="btn btn-warning" href="?modificar=<?php echo $proyecto['id'];?>">Modificar</a></td>
                        </tr>
                        <?php #cerramos la llave del foreach
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--=======================================================================================================-->
    <!--================== == == == == M O D I F I C A R  P R O Y E C T O S == == == == ==========================-->
    <!--=======================================================================================================-->        

    <div class="row d-flex justify-content-center mb-2" id="formulario">
        <div class="col-md-10 col-sm-12">
            <div class="card carga">
            
                <?php if (isset($_GET['modificar'])) {
                    echo "ID del proyecto seleccionado: " . $id;
                    
                     ?>
                    <div class="row d-flex justify-content-center mt-4 mb-5">
                        <div class="col-md-10 col-sm-12">
                            <div class="card" style="background-color:#CDB3A6;">
                                <div class="card-header">
                                    Datos del Proyecto
                                </div>
                                <div class="card-body">
                                <!--para recepcionar archivos uso enctype-->
                                    <form action="#" method="post" enctype="multipart/form-data">
                                        <div>
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <label for="archivo">Imagen del Proyecto - Se actualizara al grabar los cambios</label>
                                                <br>
                                                <div class="d-flex justify-content-center align-item-center">
                                                    <img class="img-thumbnail" src="./assets/<?php echo $fila[0]['imagen']; ?>">
                                                 </div>
                                            </div>
                                            <p>Seleccione un nueva Imagen si desea modificar</p>
                                            <input required class="form-control" type="file" name ="archivo" id="archivo">   
                                        </div>
                                        <br>
                                        <div>
                                            <label for="nombre">Nombre del Proyecto</label>
                                            <input required class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $fila[0]['nombre']; ?>">
                                        </div>
                                        <div>
                                            <label for="descripcion">Indique Descripción del Proyecto</label>
                                                <textarea required class="form-control" maxlength="115" name="descripcion" id="descripcion" cols="30" rows="2"><?php echo $fila[0]['descripcion'];?></textarea>
                                        </div>
                                        <div>
                                            <label for="enlace">Enlace del Proyecto</label>
                                            <input required class="form-control" type="text" name="enlace" id="enlace" value="<?php echo $fila[0]['enlace']; ?>">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                           
                                                <input class="btn btn-warning mx-5 my-3" type="submit" value="Modificar Proyecto">
                                                <input class="btn btn-danger mx-5 my-3" onclick="cancelar()" type="submit" value="Cancelar">
                                        </div>
                                        
                                    </form>
                                </div> <!--cierra el body-->
                            </div><!--cierra el card-->
                        </div><!--cierra el col-->
                    </div>
                <?php 
                    } ?><!--cierra el row-->
            </div>
        </div>
    </div>    
    </main>
    <!--======================================================================================================-->
    <!--===================== == == == == == ==  F O O T E R  == == == == == == == =============================-->
    <!--======================================================================================================-->
    <?php include './pages/footer.php'; ?>