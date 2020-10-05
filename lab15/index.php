<?php
    //Despliega las funciones hechas anteriormente en algunas vistas.
    require_once ('util.php');
    include("index.html");
    $result = getFruits();

    if(mysqli_num_rows($result) > 0)
    {
        echo "<div class='container'>";
        echo "<div class='row'>";
        echo "<div class='col s12 m4 l8 offset-l2'>";
        //output data of each row
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th> Nombre </th>";
        echo "<th> Cantidad </th>";
        echo "<th> Cantidad </th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while($row = mysqli_fetch_assoc($result))
        {
           
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
     
            echo "<td>" . $row["quantity"] . "</td>";
     
            echo "<td>$" . $row["price"] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    $name = "mango";
    $quantity = 200;
    $price = 10;
    //insertFruit($name, $quantity, $price);
?>