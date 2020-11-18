<?php 
    require_once ('util.php');

    $name = $_POST["estado"];
  

    if(isset($_POST["estado"]) && !empty($_POST["estado"] ) ){
        
        $rs = getZombieNum($name);
        //here you can echo the result of query
        $result = mysqli_fetch_array($rs);
        //here you can echo the result of query
        echo "<p>Zombies con". $result[0] .": ".$result[1]."</p>";
       
        
    }
    

?>