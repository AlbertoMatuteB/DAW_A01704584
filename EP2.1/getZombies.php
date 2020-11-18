<?php
    require_once ('util.php');

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
                $res = mysqli_fetch_array($result);
                echo "<tr>";
                echo "<td>" . $row['nombre'] . "</td>";
        
                echo "<td>" . $row["Estado"] . "</td>";
        
                echo "<td>" . $row["fecha"] . "</td>";
                echo "</tr>";

            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        
        
        }
   
?>