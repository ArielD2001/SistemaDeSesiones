
<?Php
    //incluir conexion
    include("condb.php");
    session_start();

    //Comprobar si hay una sesion iniciada
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
    <title>Bienvenido</title>
</head>
<body>

    <!-- barra de navegacion -->
    <header class='bienvenido bg-dark py-3 ps-3 m-0 row'>
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
        <a href="cargar.php" class="left text-dark py-2 mt-2 px-3">
            <i class="fas fa-camera me-2"></i>Cambiar perfil
        </a>
    </div> 
    
    <!-- secciones  -->
   <div class="row mt-2">

        <!-- seccion 1  -->
        <div class="col-3 seccion1 border-end p-2">

            <!-- imagen de perfil  -->
            <div class="user-box  m-3 rounded-circle">
                <?php if($row['Perfil']==NULL){?>
                    <img src="./img/user.jpg" draggable="false" class="user-null">
               <?php }else{?>
                <img src="data:image/png;base64, <?php echo base64_encode($row['Perfil']); ?>" draggable="false" class="user">
               <?php }?>
            </div>
            <div class=" text-center">
                <a class="user-name "><?php echo $nombre." ".$apellido;  ?></a>
            </div>

            <!-- menu de multimedia  -->
            <div class="p-2 servicios">
                    <a href="" class="border p-3 rounded ">
                        <i class="far fa-user pe-2"></i>Perfil
                    </a>
                    <a href="" class="border  p-3 mt-2 rounded ">
                        <i class="far fa-users pe-2"></i>Contactos
                    </a>
                    <a href="" class="border p-3 mt-2 rounded">
                        <i class="far fa-layer-group pe-2"></i>Grupos
                    </a>
            </div>
        </div>
        <!-- seccion 2  -->
        <div class="col-7 p-5">
            <h1 class="display-5">Hola <?php echo$row['Nombre'];?>, Esta es tu pagina</h1>
            <h2 class="display-6">Que esperas para comenzar</h2>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="main.js"></script>
</body>
</html>
