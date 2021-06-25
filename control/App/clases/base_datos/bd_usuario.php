<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'control2';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('coneccion fallida: ' . $e->getMessage());
}

?>
