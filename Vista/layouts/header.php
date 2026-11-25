<?php
/**
 * Layout de cabecera común para todas las vistas.
 * Muestra el <head>, la barra superior con logo y navegación, y abre <main>.
 * Recibe (opcional): $tituloPagina (string), $accionActual (string).
 * Enlaza a: index.php?accion=acerca|listar|agregar.
 */

// Escapa valores antes de imprimirlos en HTML para evitar XSS
if (!function_exists('e')) {
    function e($valor): string
    {
        return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
    }
}

$titulo = $tituloPagina ?? 'Machine Line | Arrendadora de Autos';
$accion = $accionActual ?? ($_GET['accion'] ?? 'acerca');
// Permite cargar CSS e imágenes desde index.php (raíz) o abriendo Vista/ directo
$rutaVista = basename(dirname($_SERVER['SCRIPT_NAME'] ?? '')) === 'Vista' ? '' : 'Vista/';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($titulo) ?></title>
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
                        <a href="index.php?accion=acerca" class="nav-enlace<?= $accion === 'acerca' ? ' activo' : '' ?>">
                            Acerca de
                        </a>
                    </li>
                    <li>
                        <a href="index.php?accion=listar" class="nav-enlace<?= ($accion === 'listar' || $accion === 'editar') ? ' activo' : '' ?>">
                            Mostrar autos
                        </a>
                    </li>
                    <li>
                        <a href="index.php?accion=agregar" class="nav-enlace<?= $accion === 'agregar' ? ' activo' : '' ?>">
                            Agregar autos
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="contenedor contenido-principal">
