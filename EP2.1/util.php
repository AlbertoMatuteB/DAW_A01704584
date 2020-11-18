<?php
    //Haz una función llamada connectDb la cual validará que la conexión sea correcta.
    function connectDb()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ep2";

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

    function updateState( $id, $estado)
    {   
        $name = getID($id);
        $res = mysqli_fetch_array($name);
        $conn = connectDb();
        $sql = "CALL `updateState`('$estado','$res[0]')";
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
                echo "<td>" . $res['nombre'] . "</td>";
        
                echo "<td>" . $row["estado"] . "</td>";
        
                echo "<td>" . $row["fecha"] . "</td>";
                echo "</tr>";

            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        
        
        }
    }
?>