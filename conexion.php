<?php
/*Hostname:
192.168.0.100
Database:
veterin8_bd_entornos
Username:
veterin8_bd_entornos
Password:
988Y39kBFuYX7rCpMeub*/

// Datos de conexion en servidor local
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_entornos";

// Datos de conexion en servidor remoto
/*
$servername = "192.168.0.100";
$username = "veterin8_bd_entornos";
$password = "988Y39kBFuYX7rCpMeub";
$dbname = "veterin8_bd_entornos";
*/

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>