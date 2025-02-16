<?php
/*Hostname:
192.168.0.100
Database:
veterin8_bd_entornos
Username:
veterin8_bd_entornos
Password:
988Y39kBFuYX7rCpMeub
Hostname:
192.168.0.100
Database:
veterin8_bd_entornos
Username:
veterin8_bd_entornos
Password:
b7t49XAmDWrTckZdkVNa*/

// Datos de conexion en servidor local

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_entornos";

// Datos de conexion en servidor remoto
/*
$servername = "192.168.0.100";
$username = "veterin8_bd_entornos";
$password = "b7t49XAmDWrTckZdkVNa";
$dbname = "veterin8_bd_entornos";


$servername = "sql305.byethost33.com";
$username = "b33_38324846";
$dbname = "b33_38324846_bd_entornos";
$password = "nh1j8q47";
*/
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>