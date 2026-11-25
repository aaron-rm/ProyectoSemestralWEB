<?php
$titulo = $tituloPagina ?? 'Machine Line | Arrendadora de Autos';
$accion = $accionActual ?? ($_GET['accion'] ?? 'acerca');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars((string)$titulo, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="Vista/css/estilos.css">
</head>
<body>
    <header class="site-header">
        <div class="contenedor header-contenido">
            <a href="index.php?accion=acerca" class="marca-logo" aria-label="Inicio Machine Line">
                <span class="logo-icono" aria-hidden="true">ML</span>
                <span class="logo-texto">
                    <strong>Machine Line</strong>
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
