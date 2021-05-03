<?php
try {
    $conexion = new PDO('mysql:host=localhost;dbname=email','root', '');
    
        // if($conexion){
        //     echo "conectado";
        // }
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>