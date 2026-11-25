<?php
/*
 * Cabecera compartida del sitio: define e(), abre el HTML y muestra barra de navegación.
 * Recibe (opcionales): $tituloPagina, $accionActual, $rutaVista.
 * Enlaza a: index.php?accion=acerca | listar | agregar.
 */
$titulo = $tituloPagina ?? 'Machine Line | Arrendadora de Autos';
$accion = $accionActual ?? ($_GET['accion'] ?? 'acerca');
// Permite cargar CSS/JS/imágenes tanto desde index.php (raíz) como abriendo Vista/ directo.
$rutaVista = $rutaVista ?? (basename(dirname($_SERVER['SCRIPT_NAME'] ?? '')) === 'Vista' ? '' : 'Vista/');

if (!function_exists('e')) {
    // Escapa texto para imprimirlo de forma segura en HTML.
    function e($valor): string
    {
        return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($titulo) ?></title>
    <link rel="icon" type="image/png" href="<?= e($rutaVista) ?>img/favicon.png">
    <link rel="stylesheet" href="<?= e($rutaVista) ?>css/estilos.css">
</head>
<body>
    <header class="site-header">
        <div class="contenedor header-contenido">
            <a href="index.php?accion=acerca" class="marca-logo" aria-label="Inicio Machine Line">
                <span class="logo-texto">
                    <img src="<?= e($rutaVista) ?>img/logo-blanco.png" alt="Machine Line" class="logo-img" height="34">
                    <small>Arrendadora de Autos</small>
                </span>
            </a>

            <nav class="nav-principal" aria-label="Navegación principal">
                <ul class="nav-lista">
                    <li><a href="index.php?accion=acerca" class="nav-enlace<?= $accion === 'acerca' ? ' activo' : '' ?>">Acerca de</a></li>
                    <li><a href="index.php?accion=listar" class="nav-enlace<?= ($accion === 'listar' || $accion === 'editar') ? ' activo' : '' ?>">Mostrar autos</a></li>
                    <li><a href="index.php?accion=agregar" class="nav-enlace<?= $accion === 'agregar' ? ' activo' : '' ?>">Agregar autos</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="contenedor contenido-principal">
