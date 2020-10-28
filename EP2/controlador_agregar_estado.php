<?php
    include_once "util.php";
    $idZ = htmlspecialchars($_POST["nombre"]);
    $idE = htmlspecialchars($_POST["estado"]);

    if(sqlqry(" CALL agregarEstado($idZ, $idE)")){
        echo "Se registró el estado del zombi";
    }else{
        echo "Hubo un error";
    }