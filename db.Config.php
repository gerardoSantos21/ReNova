<?php
// Detalles de la base de datos
$dbHost     = 'localhost'; 
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'proyectocarrito';
$dbPort     = 3307; 

// Crear conexión agregando el puerto al final
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $dbPort);

// Verificar si hubo error
if ($db->connect_error) {
    die("No se pudo conectar a la base de datos: " . $db->connect_error);
}
?>