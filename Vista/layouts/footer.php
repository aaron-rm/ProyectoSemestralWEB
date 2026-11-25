<?php
/*
 * Pie de página compartido: cierra <main>, muestra marca, enlaces, redes sociales y carga los scripts JS.
 * Usa: $rutaVista (definida en header.php o calculada como respaldo).
 * Enlaza a: index.php y index.php?accion=acerca | listar | agregar.
 */
$rutaVista = $rutaVista ?? (basename(dirname($_SERVER['SCRIPT_NAME'] ?? '')) === 'Vista' ? '' : 'Vista/');
$redes = [
    ['Facebook',  'https://www.facebook.com/',  'facebook'],
    ['Instagram', 'https://www.instagram.com/', 'instagram'],
    ['X',         'https://x.com/',             'x'],
    ['YouTube',   'https://www.youtube.com/',   'youtube'],
    ['TikTok',    'https://www.tiktok.com/',    'tiktok'],
];
?>
    </main>

    <footer class="site-footer">
        <div class="contenedor footer-contenido">
            <p class="footer-marca">
                <a href="index.php"><img src="<?= $rutaVista ?>img/logo-blanco.png" alt="Machine Line - Inicio" height="26"></a><br>
                Arrendadora de Autos
            </p>
            <nav class="footer-redes" aria-label="Páginas del sitio">
                <strong>Páginas</strong>
                <ul>
                    <li><a href="index.php?accion=acerca">Acerca de</a></li>
                    <li><a href="index.php?accion=listar">Mostrar autos</a></li>
                    <li><a href="index.php?accion=agregar">Agregar autos</a></li>
                </ul>
            </nav>
            <nav class="footer-redes" aria-label="Redes sociales">
                <strong>Síguenos</strong>
                <ul>
                    <?php foreach ($redes as [$red, $url, $icono]): ?>
                        <li>
                            <a href="<?= $url ?>" target="_blank" rel="noopener noreferrer">
                                <img src="<?= $rutaVista ?>img/redes/<?= $icono ?>.svg" alt="" width="20" height="20">
                                <?= $red ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <p class="footer-copy">&copy; <?= function_exists('e') ? e(date('Y')) : date('Y') ?> Machine Line. Movilidad confiable para cada camino.</p>
        </div>
    </footer>
    <script src="<?= $rutaVista ?>js/carrusel.js" defer></script>
    <script src="<?= $rutaVista ?>js/skeleton.js" defer></script>
</body>
</html>
