<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'usuarios';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('coneccion fallida: ' . $e->getMessage());
}

?>
