<?php 
    require_once ('util.php');

    $name = $_POST["zombi"];

    $estado = $_POST["estado"];


    if(isset($_POST["estado"]) && !empty($_POST["estado"]) && isset($_POST["zombi"]) && !empty($_POST["zombi"]) ){
        
        updateState($name, $estado);
        sleep(1);
        return printZombies();

    }
?>