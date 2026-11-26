<?php
if (isset($tituloPagina)) {
    $titulo = $tituloPagina;
} else {
    $titulo = 'Machine Line | Arrendadora de Autos';
}

if (isset($accionActual)) {
    $accion = $accionActual;
} elseif (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    $accion = 'acerca';
}

// Ruta base para CSS/imágenes: vacía si se carga desde Vista/, 'Vista/' si se carga desde la raíz (index.php)
if (!isset($rutaVista)) {
    $directorio = '';
    if (isset($_SERVER['SCRIPT_NAME'])) {
        $directorio = dirname($_SERVER['SCRIPT_NAME']);
    }
    if (basename($directorio) === 'Vista') {
        $rutaVista = '';
    } else {
        $rutaVista = 'Vista/';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link rel="icon" type="image/png" href="<?= $rutaVista ?>img/favicon.png">
    <link rel="stylesheet" href="<?= $rutaVista ?>css/estilos.css">
</head>
<body>
    <header class="site-header">
        <div class="contenedor header-contenido">
            <a href="index.php?accion=acerca" class="marca-logo" aria-label="Inicio Machine Line">
                <span class="logo-texto">
                    <img src="<?= $rutaVista ?>img/logo-blanco.png" alt="Machine Line" class="logo-img" height="34">
                    <small>Arrendadora de Autos</small>
                </span>
            </a>

            <nav class="nav-principal" aria-label="Navegación principal">
                <ul class="nav-lista">
                    <li>
                        <a href="index.php?accion=acerca" class="nav-enlace<?php if ($accion === 'acerca') { echo ' activo'; } ?>">Acerca de</a>
                    </li>
                    <li>
                        <a href="index.php?accion=listar" class="nav-enlace<?php if ($accion === 'listar' || $accion === 'editar') { echo ' activo'; } ?>">Mostrar autos</a>
                    </li>
                    <li>
                        <a href="index.php?accion=agregar" class="nav-enlace<?php if ($accion === 'agregar') { echo ' activo'; } ?>">Agregar autos</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="contenedor contenido-principal">
