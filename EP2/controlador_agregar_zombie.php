<?php
    include_once "util.php";
    $zName = htmlspecialchars($_POST["nombre"]);

    if(sqlqry(" CALL agregarZombi($zName)")){
        echo "Se registró el zombi";
    }else{
        echo "Hubo un error";
    }