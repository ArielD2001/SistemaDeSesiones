<?php
include("condb.php");
if(isset($_POST['enviar'])){

$correo        = $_POST['correo'];
$contraseña    = $_POST['contraseña'];


$sentencia = $conexion->prepare("SELECT * FROM email  WHERE Correo= ? ");
$sentencia->bindParam(1, $correo);
$sentencia->execute();
$resultado= $sentencia->fetch();
$filas = $sentencia->rowCount();
// var_dump($resultado['Contraseña']);
    if($filas> 0){
    $id=$resultado['ID'];
        if(password_verify( $contraseña, $resultado['Contraseña']) ){
            session_start();
        $_SESSION['id']=$id;
        header("location:bienvenido.php");
        }
        else{
            ?>
            <div class="alert alert-danger mt-4 position-absolute alerta">
                Contraseña  incorrecta
            </div>
            <?php
        }
    }
    else{
        ?>
        <div class="alert alert-danger mt-4 position-absolute alerta">
            Correo incorrecto
        </div>
        <?php
    }

$conexion=null;
$sentencia=null;
}
?>  