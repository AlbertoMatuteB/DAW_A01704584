<?php 
    require_once ('util.php');


    $_POST["crear-zombie"]=htmlspecialchars($_POST["crear-zombie"]);
    $name = $_POST["crear-zombie"];

    if(isset($_POST["crear-zombie"]) && !empty($_POST["crear-zombie"]) && ctype_alpha($name)){
       
        crearZombie($name);

    }else{
        echo '<script>alert("Asegurate de ingresar todos los datos");</script>';
        printFruits();
    }

?>