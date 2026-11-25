    </main>

    <footer class="site-footer">
        <div class="contenedor footer-contenido">
            <p class="footer-marca"><strong>Machine Line</strong> &mdash; Arrendadora de Autos</p>
            <nav class="footer-redes" aria-label="Redes sociales">
                <strong>Síguenos</strong>
                <ul>
                <?php
                // shortcut: logos desde el CDN de Simple Icons (requiere internet); descargarlos a Vista/img/ si se necesita offline
                foreach ([
                    ['Facebook',  'https://www.facebook.com/',  'facebook'],
                    ['Instagram', 'https://www.instagram.com/', 'instagram'],
                    ['X',         'https://x.com/',             'x/white'],
                    ['YouTube',   'https://www.youtube.com/',   'youtube'],
                    ['TikTok',    'https://www.tiktok.com/',    'tiktok/white'],
                ] as [$red, $url, $icono]): ?>
                    <li>
                        <a href="<?= $url ?>" target="_blank" rel="noopener noreferrer">
                            <img src="https://cdn.simpleicons.org/<?= $icono ?>" alt="" width="20" height="20">
                            <?= $red ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </nav>
            <p class="footer-copy">&copy; <?= htmlspecialchars(date('Y'), ENT_QUOTES, 'UTF-8') ?> Machine Line. Movilidad confiable para cada camino.</p>
        </div>
    </footer>
    <?php $rutaVista = $rutaVista ?? (basename(dirname($_SERVER['SCRIPT_NAME'] ?? '')) === 'Vista' ? '' : 'Vista/'); ?>
    <script src="<?= $rutaVista ?>js/carrusel.js" defer></script>
</body>
</html>
