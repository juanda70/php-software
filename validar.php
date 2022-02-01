<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

//encriptacion
$contraseña= hash('sha512',$contraseña);

$conexion=conectar();
$consulta="SELECT * FROM usuarios where usuario='$usuario' and contraseña = '$contraseña'";
$resultado=$conexion->query($consulta);

if($resultado->num_rows>0 ){
    header("location:home.html");
}else{
    ?>
    <?php include("index.html");
    ?>
    <h1 class="bad">Error en la autentificacion</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);