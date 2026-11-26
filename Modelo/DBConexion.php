<?php
// Conexión a la base de datos 'semestral' en MySQL
$conexion = mysqli_connect('localhost', 'root', '', 'semestral');

if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}

mysqli_set_charset($conexion, 'utf8mb4');
