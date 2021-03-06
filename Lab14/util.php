<?php
    //Haz una función llamada connectDb la cual validará que la conexión sea correcta.
    function connectDb()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbname";

        $con = mysqli_connect($servername, $username, $password, $dbname);

        //check connection
        if(!$con)
        {
            die("Connection faled: " . mysqli_connect_error());
        }

        return $con;

    //Haz una función llamada closeDB que recibirá como parámetro una conexión establecida previamente.
    //La variable $mysql es una conexión establecida anteriormente
    //tomando de ejemplo la maigen anterior, podría mandar a llamar la función
    //mandando como parámetro $con
    function closeDb($mysql)
    {
        mysqli_close($mysql);
    }

    /*
    Haz una función que te permita obtener todos los objetos de una base de datos.
    En esta ocasión, siguiendo con mi tabla "fruit", regresaré todo lo que se encuentra ahí.
    */
    function getFruits()
    {
        $conn = connectDb();
        $sql = "SELECT name, units, quantity, price, country FROM Fruit";
        $result = mysqli_query($conn, $sql);

        closeDb($conn);

        return $result;
    }

    //Haz por lo menos dos funciones que hagan una consulta a la base de datos con algunos parametros.
    //funcion que regresará los datos de una fruta que tenga en su nombre el parámetros
    //Ejemplo, si pongo manzana, me puede regresar manzana roja, manzana whashington, etc.accent-1
    function getFruitsByName($fruit_name)
    {
        $conn = connectDb();
        $sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE name LIKE '%".$fruit_name."%'";
        $result = mysqli_query($conn, $sql);
        closeDb($conn);
        return $result;
    }
}
?>
