<?php ob_start();?>
<?php session_start();

    if ($_POST) {

        if(($_POST['usuario']=="Administrador") &&($_POST['clave']=="entrar")){
            $_SESSION['usuario']="Olga";
            $_SESSION['loagueado']="S";
            header("location:../index_Administrador.php");
            die();
        }else{
            
            header("location:../index.php");
            die();
        }
    }
        
?>

