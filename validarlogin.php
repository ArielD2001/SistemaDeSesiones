<?php 
include("condb.php");


if(isset($_POST['enviar'])){

    if( strlen($_POST['correo']) > 0 &&
        strlen($_POST['telefono']) > 0 &&
        strlen($_POST['apellido']) > 0 &&
        strlen($_POST['nombre']) >0 ){
            
        $id= rand(1000,10000);
        $nombre       = trim($_POST['nombre']);
        $apellido       = trim($_POST['apellido']);
        $correo       = trim($_POST['correo']);
        $telefono       = trim($_POST['telefono']);
        $contraseña   = $_POST['contraseña'];
        $contraseña    =  password_hash($contraseña, PASSWORD_DEFAULT);
        $consulta     = "SELECT * FROM email WHERE Correo = ?";
        $sentencia= $conexion->prepare($consulta);
        $sentencia->bindParam(1, $correo);
        $sentencia->execute();
        $filas=$sentencia->rowCount();
        if($filas >0){

            ?>
            <div class="alert alert-danger mt-4 position-absolute alerta">
                El correo ya pertenece a un usuario
            </div>
            <?php

        }
        else{
            if(strlen($contraseña) < 4){
                ?>
                <div class="alert alert-warning mt-4 position-absolute alerta">
                    La contraseña debe ser mayor de 4 caracteres
                </div>
                <?php
            }     
            else{
                $consultainsert="INSERT INTO email(ID, Nombre, Apellido, Telefono, Correo, Contraseña) VALUES(?,?,?,?,?,?)";
                $sentenciainsert= $conexion->prepare($consultainsert);
                $sentenciainsert->execute(array($id,$nombre,$apellido, $telefono,$correo,$contraseña));
                session_start();
                $_SESSION['id']=$id;
                $sentencia=null;
                header("location:cargar.php");
        }
    }
    $conexion=null;
    $consulta=null;
}
}
?>
