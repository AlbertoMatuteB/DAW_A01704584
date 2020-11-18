<?php 
    require_once ('util.php');

    $estado = $_POST["submit-estado"];
    
    if(isset($_POST["submit-estado"]) && !empty($_POST["submit-estado"] ) ){
        
        $rs = getZombieNum($estado);

        $result = mysqli_fetch_array($rs);

        echo "<p>Zombies con ". $result['id'] .": ".$result['count']."</p>";
    }
?>