<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if(isset($_POST["guardar"])){
    require_once("config.php");

    $config = new Config();

    $config -> setidfactura($_POST ["idfactura"]);
    $config -> setidempleado($_POST["idempleado"]);
    $config -> setidcliente($_POST["idcliente"]);
    

    $config-> insertData(); 

    echo "<script> alert('Datos almacenados correct');document.location= 'estudiantes.php'</script>";
}

?>