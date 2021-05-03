
<?Php
    //incluir conexion
    include("condb.php");
    session_start();

    // Comprobar si hay una sesion iniciada
    if(!$_SESSION){
        header('location: index.php');  
    }
    //consulta de datos del usuario
    $id = $_SESSION['id'];
    $consulta="SELECT * FROM email WHERE ID=?";
    $sentencia = $conexion->prepare($consulta);
    $sentencia->execute(array($id));
    $row = $sentencia->fetch();
    $nombre= $row['Nombre'];
    $apellido= $row['Apellido'];
    $telefono= $row['Telefono'];
            
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="main.css">
    <title>cargar perfil</title>
</head>
<body>

    <!-- barra de navegacion -->
    <header class='bienvenido bg-dark py-3 ps-3 m-0 row '>
        <div class="text-start col-6">
            <i class="text-white  p-1  fs-5 telefono">
            +57 <?php echo$telefono;?>
            </i>
        </div>    
        <div class="text-end col-5 header  ps-5 ">
            <a href="index.php" class="text-white border p-1 px-5 rounded-pill  fs-4 nombre">
              <?php echo$nombre;?>
            </a>
        </div>
        <div class="text-center col-1    pe-5 ">
            <i class="fas fa-bars text-white fs-3 p-1 menu">
            </i>
        </div>
    </header>


    <!-- menu desplegable -->
    <div class=" text-end p-2 pe-3 cerrar">
        <a href="cerrar.php" class="left text-dark py-2 px-3">
            <i class="fas fa-sign-out-alt me-2"></i>Cerrar sesion
        </a>
        <a href="#" class="left text-dark py-2 mt-2 px-3">
            <i class="fas fa-cog me-2"></i>Configuraciones
        </a>
        
    </div> 
    <div class="container text-center cf-contenedor">
      
        <form method="POST" enctype="multipart/form-data" class="border rounded p-4 mt-5 formulario-image">
        <?php if($row['Perfil']==NULL){?>
            <a href="bienvenido.php" class="alert alert-primary p-2">Omitir</a>
        <h2 class="display-5 mt-5 pt-4"> Subir foto perfil</h2>
             <div class="user-box  m-3 rounded-circle">
                     <img draggable="false" src="./img/user.jpg" class="user-null null-formulario">
                
            </div>
        <?php }else{?>
            <a href="bienvenido.php" class="alert alert-primary p-2 me-3">Cancelar</a>
            <h2 class="display-5 mt-4 pt-2"> cambiar foto perfil</h2>
            <div class="user-box  m-3 rounded-circle">
                     <img draggable="false" src="data:image/png;base64, <?php echo base64_encode($row['Perfil']); ?>" class="user true-formulario">
                
            </div>
            <?php }?>
            <input type="file" name="perfil" class="form-control">
            <input type="submit" name="subir" class="btn btn-success mt-3 boton-cargar" value="Subir">
        </form>
    </div>
<?php 
    include('cargarfoto.php');
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="main.js"></script>
</body>