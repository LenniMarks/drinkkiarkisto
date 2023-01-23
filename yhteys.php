<?php 
#Yhteys tietokantaan
$server = "localhost";
$user = "root";
$pass = "";
$database = "tietosisalto";

$conn = mysqli_connect($server, $user, $pass, $database);
    
if (!$conn) {
    die();
}

?>