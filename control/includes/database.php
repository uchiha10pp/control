<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'usuarios';

try {
  $conn = new PDO("mysql:host=$server;dbname=$control2;", $username, $password);
} catch (PDOException $e) {
  die('coneccion fallida: ' . $e->getMessage());
}

?>
