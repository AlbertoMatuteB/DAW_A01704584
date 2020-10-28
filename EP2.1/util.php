<?php
    //Haz una función llamada connectDb la cual validará que la conexión sea correcta.
    function connectDb()
    {

        $servername = 'localhost';
        $username = "id15254882_albertom";
        $password = "SQUP7V324zh9Y4l{";
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

    function createZombie($name)
    {
        $conn = connectDb();
        $sql = "CALL `createZombie`($name);";
        $result = mysqli_query($conn, $sql);

        closeDb($conn);

        return $result;
    }

    function getZombieNum($estado)
    {
        $conn = connectDb();
        $sql = "CALL `getZombienum`($estado);";
        $result = mysqli_query($conn, $sql);
        closeDb($conn);

        return $result;
    }

    function getEstadoNum($estado)
    {
        $conn = connectDb();
        $sql = "CALL `getZombienum`($estado);";
        $result = mysqli_query($conn, $sql);
        closeDb($conn);

        return $result;
    }

    function getZombie($estado)
    {
        $conn = connectDb();
        $sql = "CALL `getZombienum`($estado);";
        $result = mysqli_query($conn, $sql);
        closeDb($conn);

        return $result;
    }

    function crearZombie($name)
    {
        $conn = connectDb();
        $sql = "CALL `crearZombie`($name);";
        $result = mysqli_query($conn, $sql);
        closeDb($conn);
    }

    function getDateZ()
    {
        $conn = connectDb();
        $sql = "CALL `getDate`();";
        $result = mysqli_query($conn, $sql);
        closeDb($conn);

        return $result;
    }


    function printZombies(){
        $sql = "SELECT Z.nombre, E.nombreEstado as 'estado', EZ.fecha FROM zombis Z, estado E, estado_zombi EZ 
        WHERE Z.id_zombi = EZ.id_zombi and E.id_estado = EZ.id_estado
        ORDER BY EZ.id_zombi DESC";

        $resp = sqlqry($sql);
        $totalIn = "SELECT count(id_zombie)
                    FROM estado_zombie
                    GROUP BY id_estado";
        if(!$resp){
            http_response_code(500);
            return -1;
        }
        $tabla = "
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>";

        while ($row = mysqli_fetch_array($resp, MYSQLI_BOTH)){
            $tabla .= "<tr>";
            $tabla .= "<td>".ucfirst($row['nombre'])."</td>";
            $tabla .= "<td>".ucfirst($row['estado'])."</td>";
            $tabla .= "<td>".$row['fecha']."</td>";
            $tabla .= "</tr>";
        }    $tabla .= "
        </tbody>
        <tfoot>
            <tr>
                <th>Incidentes Totales:</th>
                <th>$totalIn</th>
            </tr>
        </tfoot>";
        return $tabla;
    }
?>