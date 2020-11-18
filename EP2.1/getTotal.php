<?php 
    require_once ('util.php');

    $name = $_POST["estado"];
  

    if(isset($_POST["estado"]) && !empty($_POST["estado"] ) ){
        
        $rs = getZombieNum($name);

        $result = mysqli_fetch_array($rs);

        echo "<p>Zombies con". $result[0] .": ".$result[1]."</p>";
       
        
    }
    

?>