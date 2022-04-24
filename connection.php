<?php

session_start();

$hostname = "localhost";
$user = "root";
$password = "";
$dbname = "videoupload";


$connection = mysqli_connect($hostname, $user, $password, $dbname);

if(!$connection){
    echo "Il y a un error, vous n'est pas encore connecté.";
    die("Connection failed:".mysqli_connect_error());
}


?>