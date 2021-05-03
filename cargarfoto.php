<?php
include('condb.php');
$id=$_SESSION['id'];
if(isset($_POST['subir'])){
 
    if(strlen($_FILES['perfil']['tmp_name'])){
        $perfil = ($_FILES['perfil']['tmp_name']);
        $perfil= fopen($perfil,'rb');
        $consulta= "UPDATE email SET Perfil=? WHERE ID=?";
        $sentencia= $conexion->prepare($consulta);
        $sentencia->bindParam(1,$perfil, PDO::PARAM_LOB);
        $sentencia->bindParam(2,$id);
        $sentencia->execute();
        
        if($sentencia){
           print "<script>window.setTimeout(function() { window.location = '/index.php' }, 700);</script>";
        }
        
        
    }else {
        ?>
            <div class="alert alert-warning alerta alerta-image">
                No se ha seleccionado ningun archivo!
            </div>
        <?php
    }

}


?>