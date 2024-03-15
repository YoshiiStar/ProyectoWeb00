<?php
//Conexion
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bdkickstar';

$db = mysqli_connect($hostname, $username, $password, $database );

if(!isset($_SESSION)){
    session_start();
}
