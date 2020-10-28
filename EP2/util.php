<?php
include_once "dbConnect.php";

function closeDb($mysqli) {
    mysqli_close($mysqli);
}

//Función que conecta a la bd, realiza un query y vuelve a cerrar la bd. Recibe el SQL del query y regresa un objeto mysqli result
function sqlqry($qry) {
    $con = connectDb();
    if(!$con){
        return false;
    }

    $result = mysqli_query($con, $qry);
    closeDb($con);
    return $result;
}

function returnZombies(){
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
        $tabla .= "<td>".ucfirst($row['nombreEstado'])."</td>";
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
function getOpciones($id, $campo, $tabla) {
    $sql = "SELECT $id, $campo FROM $tabla";
    $result = sqlqry($sql);
    $option = "";

    while($row = mysqli_fetch_array($result)){
        $option = $option."<option value=".$row[0].">".ucfirst($row[1])."</option>";
    }
    return $option;
}