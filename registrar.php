<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

//encriptacion
$contraseña = hash('sha512',$contraseña);

$conexion=conectar();

$consulta="SELECT * FROM usuarios where usuario='$usuario'";
$resultado=$conexion->query($consulta);

if($resultado->num_rows>0 ){
    ?>
    <?php include("registrar.html");
    ?>
    <h1 class="bad">Usuario ya registrado</h1>
    <?php
}else{
    $consulta="INSERT INTO usuarios(usuario, contraseña) 
	VALUES ('$usuario', '$contraseña'); ";
    $resultado=$conexion->query($consulta);
    header("location:home.html");
}

mysqli_free_result($resultado);
mysqli_close($conexion);