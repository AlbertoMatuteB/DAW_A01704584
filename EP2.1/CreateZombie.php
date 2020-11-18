<?php 
    require_once ('util.php');

    $_POST["submit-name"]=htmlspecialchars($_POST["submit-name"]);
    $name = $_POST["submit-name"];

    if(isset($_POST["submit-name"]) && !empty($_POST["submit-name"])){
        
        CreateZombie($name);
        return printZombies();
        
    }

?>