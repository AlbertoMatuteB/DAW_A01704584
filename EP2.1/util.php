<?php
    //Haz una función llamada connectDb la cual validará que la conexión sea correcta.
    function connectDb()
    {
        $servername = "localhost";
        $username = "id15254882_albertomatute";
        $password = ">BD@5P8-lE&ce}rc";
        $dbname = "id15254882_ep2";

        $con = mysqli_connect($servername, $username, $password, $dbname);

        //check connection
        if(!$con)
        {
            die("Connection faled: " . mysqli_connect_error());
        }

        return $con;
    }
    //Haz una función llamada closeDB que recibirá como parámetro una conexión establecida previamente.
    //La variable $mysql es una conexión establecida anteriormente
    //tomando de ejemplo la maigen anterior, podría mandar a llamar la función
    //mandando como parámetro $con
    function closeDb($mysql)
    {
        mysqli_close($mysql);
    }

   
    function getEstados()
    {
        $conn = connectDb();
        $sql = "CALL `getEstados`();";
        $result = mysqli_query($conn, $sql);

        closeDb($conn);

        return $result;
    }

    function CreateZombie($name)
    {
        $conn = connectDb();
        $sql = "CALL `CreateZombie`('$name');";
        $result = mysqli_query($conn, $sql);

        closeDb($conn);
    }

    function getZombieNum($estado)
    {
        $conn = connectDb();
        $sql = "CALL `getZombienum`('$estado');";
        $result = mysqli_query($conn, $sql);
        
        closeDb($conn);
       
        return  $result;
    }

    function getNombre($name)
    {
        $conn = connectDb();
        $sql = "CALL `getZombieName` ('$name')";
        $result = mysqli_query($conn, $sql);
        closeDb($conn);

        return $result;
    }

    function getID($name)
    {
        $conn = connectDb();
        $sql = "CALL `getID` ('$name')";
        $result = mysqli_query($conn, $sql);
        closeDb($conn);

        return $result;
    }

    function addZombie($name, $id, $estado)
    {   
        
        createZombie($name,$id);
        $conn = connectDb();
        $sql = "CALL `addState`('$id','$estado');";
        $result = mysqli_query($conn, $sql);

        closeDb($conn);

        return  $result;
    }

    function getDateZ()
    {
        $conn = connectDb();
        $sql = "CALL `getDate`();";
        $result = mysqli_query($conn, $sql);
        closeDb($conn);

        return $result;
    }

    function updateState( $nombre, $estado)
    {   
        $conn = connectDb();
        $sql = "CALL `updateZombi`('$nombre','$estado')";
        $result = mysqli_query($conn, $sql);
        closeDb($conn);

        return $result;
    }

    function printZombies(){
        $result = getDateZ();

        if(mysqli_num_rows($result) > 0)
        {
        
            echo "<div class='row'>";
    
            //output data of each row
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th> Nombre </th>";
            echo "<th> Estado </th>";
            echo "<th> Fecha </th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while($row = mysqli_fetch_assoc($result))
            {
                $name = getNombre($row["id"]);
                $res = mysqli_fetch_array($name);
                echo "<tr>";
                echo "<td>" . $res[0] . "</td>";
        
                echo "<td>" . $row["Estado"] . "</td>";
        
                echo "<td>" . $row["Fecha"] . "</td>";
                echo "</tr>";

            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        
        
        }
    }

    function selectionZombie($nombre,$id)
{
    $resultado = '<select id="zombi" name="zombi"class=form-control>'; 
    $resultado .= '<option value="" disabled selected>Selecciona un zombi </option>'; 
    $conn = connectDb(); 

    $consulta = "CALL OpcionesZombie();";
    $resultados_consulta = $conn->query($consulta); 


    while($row = mysqli_fetch_array($resultados_consulta, MYSQLI_BOTH))
    {
        $resultado .= '<option value="'.$row[$id].'">'.$row[$nombre].'</option>'; 
    }

    mysqli_free_result($resultados_consulta);  //Liberar la memoria

    $resultado .= '</select>'; 

    closeDb($conn); 
    return $resultado; 
}
?>