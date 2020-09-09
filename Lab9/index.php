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

        $table = "<table>";
        for($i = 0; $i < $total; $i++)
        {
            $table .= "<tr>";
            $table .= "<td>" . ($i + 1) . "</td>";
            $table .= "<td>" . pow($i+1, 2) . "</td>";
            $table .= "<td>" . pow($i+1, 3) . "</td>";
            $table .= "</tr>";
        }
        $table .= "</table>";
        return $table;
    }

    function invertir($num)
    {
        $output = strrev($num);
        return ($output);
    }
?>


<?php
    if(isset($_GET["num"]))
    {
        $num=($_GET["num"]);
    }else
    {
        $num = 0;
    }

    invertir($num);
?>
<div class="card-panel teal lighten-2"><?php echo lista($arregloNumeros); ?></div>
<div class="card-panel red lighten-2"><?php echo potencia(10); ?></div>
<div class="card-panel blue-grey lighten-3">
    <form action="index.php" method="get"> 
        Numero: <input type="text" name="num" value="0">
        <input class="" type="submit">
    </form>
</div>

<div class="container">
<p>Preguntas</p> 

<p>¿Qué hace la función phpinfo()? Describe y discute 3 datos que llamen tu atención.</p>
<li><p>La función phpinfo() sirve para mostrar una cierta cantidad de información sobre el estado del PHP, también se puede conocer una representación visual en forma de tabla.</p></li>
<p>¿Qué cambios tendrías que hacer en la configuración del servidor para que pudiera ser apto en un ambiente de producción?</p>
<li><p>Los cambios que se realizarían sería instalar una aplicación de enterno con XAMPP ya que con este se puede usar y manejar el servidor.</p></li>
<p>¿Cómo es que si el código está en un archivo con código html que se despliega del lado del cliente, se ejecuta del lado del servidor? Explica.</p>
<li><p>Ambos tipos de archibvos se van ejecutando en el servidor, cuando se ejecutan de manera correcta se le envia una respuesta al cliente con lo que se trabajo con HTML y de esa forma se mostrará en la pantalla.</p></li>

</div>

<?php include("_footer.html"); ?>