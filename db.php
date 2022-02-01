<?php
    function conectar(){
    $user="root";
    $pass="";
    $server="localhost";
    $db="login";
    $mysqli = new mysqli($server, $user, $pass, $db);
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    return $mysqli;
    }
    
?>