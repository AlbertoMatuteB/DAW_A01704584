<?php
require_once 'util.php'; 
?>
<!DOCTYPE html>
<html>
<html lang="es-mx">

<head>
    <!--Import materialize.css-->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" media="screen,projection" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/png" href="petz.jpg">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title>PETZ</title>
</head>

<body>
    <header></header>



    <div class="navbar-fixed">
        <nav>
            <div class="blue darken-1 nav-wrapper">
                <ul id="nav-mobile" class="right">
                    <li><a href="#">Consultas</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container">

        <h3> Personas por la Ética en el Trato de los Zombis (PETZ) </h3>

        <div class="row ">
            <div class="col s6">
                <div class="row ">
                    <form id="estadoZombie">
                        <div class="row">
                            <h5>Zombies por estado</h5>
                            <div class="input-field col s6">
                                <select name="submit-estado" id="estado" type="text" class="validate">
                                    <option value="" disabled selected>seleccione una opcion</option>
                                    <option value="1">infeccion</option>
                                    <option value="2">desorientación</option>
                                    <option value="3">violencia</option>
                                    <option value="4">desmayo</option>
                                    <option value="5">transformacion</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <input class="btn waves-effect  blue-grey lighten-3" type="submit" name="cargar" value="Cargar estado">
                        </div>
                    </form>
                    <form id="zombieNuevo" action="CreateZombie.php">
                        <div class="row">
                            <h5>Ingresa un Zombie nuevo</h5>
                            <div class="input-field col s5">
                                <input placeholder="Nombre" id="nombre" type="text" class="validate" data-length="50" name="submit-name">
                            </div>
                        </div>

                        <div class="row">
                            <input class="btn waves-effect  blue-grey lighten-3" type="submit" name="cargar" value="Ingresar nuevo zombie">
                        </div>
                    </form>
                    <form id="ActualizaZombie">
                        <div class="row">
                            <h5>Actualiza el estado de un zombie</h5>
                            <div class="input-field col s6">
                                <div class=" form-group col-md-4">
                                    <br>
                                    
                                    <?= selectionZombie("nombre","id")?>
                                    
                                    
                                </div>
                            </div>
                            <br>
                            <div class="input-field col s6">
                                <select name="estado" id="estado" type="text" class="validate">
                                    <option value="" disabled selected>seleccione una opcion</option>
                                    <option value="1">infeccion</option>
                                    <option value="2">desorientación</option>
                                    <option value="3">violencia</option>
                                    <option value="4">desmayo</option>
                                    <option value="5">transformacion</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <input class="btn waves-effect  blue-grey lighten-3" type="submit" name="cargar" value="Actualizar">
                        </div>
                    </form>
                </div>

            </div>
            <div class="col s6">
                <div class="row" id="tabla">

                </div>
                <div class="row" id="total">

                </div>
                <div class="row" id="total estado">

                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
        <footer class="blue darken-1 page-footer">
            <div class="container">
                <p class="grey-text text-lighten-4">Powered by <a href="http://materializecss.com/" target="_blank" class="white-text text-lighten-4">Materialize</a>.</p>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2019 Escuela de Ingeniería y Ciencias - Tecnológico de Monterrey en Querétaro.
                </div>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            $(document).ready(function() {
                $('select').formSelect();
            });
        </script>
        <script src="ajax.js"></script>

</body>

</html>