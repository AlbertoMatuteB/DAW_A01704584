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

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<div class="card-panel blue-gray lighten-5"><?php echo lista($arregloNumeros); ?></div>
<div class="card-panel blue-gray lighten-5"><?php echo potencia(10); ?></div>
<div class="card-panel blue-gray lighten-5">
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <br><br>
  <label>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">
  <span>
    Female
  </span>
  </label>
  <br><br>
  <label>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">
  <span>
    Male
  </span>
  </label>
  <br><br>
  <label>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Apache helicopter">
  <span>
    Apache helicopter
  </span>
  </label> 
  <br><br>
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h3>Your Input:</h3>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
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