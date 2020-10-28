<?php
function connectDB() {
    $servername = 'localhost';
    $username = "id15254882_albertom";
    $password = ")Jr1{_e79h{o]x^a";
    $dbname = "id15254882_ep2";

    $con = mysqli_connect($servername, $username, $password, $dbname);
    $con->set_charset("utf8");
    //Checks connection
    if(!$con) {
        http_response_code(500);
        return false;
    }
    return $con;
}
?>