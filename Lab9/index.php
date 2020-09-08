<?php

include("_header.html"); ?>
<?php

    $max = rand(5,20);
    $arregloNumeros = array($max);
    for($i = 0; $i < $max; $i++)
    {
        $arregloNumeros[$i] = rand(0,10);
    }

    function promedio (array $numeros)
        {
            $sumatoria = 0;
            $total = count($numeros);
            for($i = 0; $i < $total; $i++)
            {
                $sumatoria += $numeros[$i];
            }
            $resultado = $sumatoria / $total;
            return(round($resultado, 3));
        }

    function mediana (array $numeros)
    {
        sort($numeros);
        $total = count($numeros);
        if($total % 2 == 0)
        {
            return(($numeros[$total/2] + $numeros[$total/2 - 1])/2);
        }
        else
        {
            return($numeros[floor($total/2)]);
        }
    }

    function lista(array $numeros)
    {
        $lista = "Arreglo: " . implode(" | ", $numeros);
        $lista .= "<ul>";
        $lista .= "<li>Promedio: " . promedio($numeros) . "</li>";
        $lista .= "<br>";
        $lista .= "<li>Mediana: " . mediana($numeros) . "</li>";
        $lista .= "<br>";
        sort($numeros);
        $lista .= "<li> Arreglo ordenado: " . implode(" | ", $numeros) . "</li>";
        $lista .= "<br>";
        rsort($numeros);
        $lista .= "Arreglo inverso: " . implode(" | ", $numeros) . "</li>";
        $lista .= "</ul>";
        return $lista;
    }

    function potencia($total)
    {
        $lista = "Potencias: ";
        $lista .= "<ul>";
        for($i = 0; $i < $total; $i++)
        {
            $lista .= "<li>". " | " . ($i + 1) ." | ". pow($i+1, 2) . " | " . pow($i+1, 3) . " | " . "</li>";
            $lista .= "<br>";
        }
        $lista .= "</ul>";
        return $lista;
    }


?>

<div class="card-panel teal lighten-2"><?php echo lista($arregloNumeros); ?></div>
<div class="card-panel red lighten-2"><?php echo potencia(10); ?></div>

<?php include("_footer.html"); ?>