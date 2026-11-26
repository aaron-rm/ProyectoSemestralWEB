<?php
// Enrutador principal: toma ?accion=... de la URL (por defecto 'acerca')
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    $accion = 'acerca';
}

require_once __DIR__ . '/Controlador/AutoController.php';
