<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Login</title>
</head>
<body class="d-flex flex-column align-items-center">

    <!-- contenedor  -->
    <div class="container  p-5 pb-0 mb-5 align-items-center border rounded contenedor">
        <h1 class="text-center display-6 m-4" >Registrar</h1>

        <!-- formulario  -->
        <form  method="post" class="">

            <!-- input nombre  -->
            <div class="input-email">
                <div class="icon ">
                     <i class="fas fa-user p-2 pt-1"> </i>Nombre
                </div>
                <input type="text" name="nombre" placeholder="" required="" class="form-control">
            </div>

            <!-- input apellido  -->
            <div class="input-email mt-2">
                <div class="icon ">
                     <i class="fas fa-user p-2 pt-1"> </i>Apellido
                </div>
                <input type="text" name="apellido" placeholder="" required="" class="form-control">
            </div>
            
            <!-- input telefono  -->
            <div class="input-email mt-2">
                <div class="icon ">
                     <i class="fas fa-phone p-2 pt-1"> </i>Telefono
                </div>
                <input type="text" name="telefono" placeholder="" required="" autocomplete="off" class="form-control">
            </div>

            <!-- input correo  -->
            <div class="input-email mt-2">
                <div class="icon ">
                     <i class="fas fa-user p-2 pt-1"> </i>Correo
                </div>
                <input type="email" name="correo" placeholder="" required="" class="form-control">
            </div>


            <!-- input contraseña  -->
            <div class="input-contraseña mt-2">
                <div class="icon d-flex align-self-center text-left">
                     <i class="fas fa-unlock-alt p-2 pt-1"></i>Contraseña
                </div>
                <input type="password" class="form-control" name="contraseña" placeholder="" id="contraseña" required=""> 
            </div>

            <!-- ver contraseña escrita -->
            <div class="label mt-2 mb-3">
                <input type="checkbox" id="mostrar" onclick="togle()" >
                <label for="mostrar"> mostrar contraseña</label>
            </div>
            
            <!-- boton enviar  -->
            <div class="boton">
                <input type="submit" class="btn btn-success" name="enviar" value="Registrar" autocomplete="off">
            </div>

        <form>
        <div class="link mt-3 alert border-top">
           Ya tengo una cuenta, <a href="index.php" class="link-alert"> iniciar sesion</a>
        </div>

    </div>
<script src="main.js"></script>
<?php
include("validarlogin.php")
?>
</body>
</html>