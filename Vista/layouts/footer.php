    </main>

    <footer class="site-footer">
        <div class="contenedor footer-contenido">
            <p class="footer-marca"><strong>Machine Line</strong> &mdash; Arrendadora de Autos</p>
            <nav class="footer-redes" aria-label="Redes sociales">
                <span>Síguenos:</span>
                <?php foreach ([
                    'Facebook'  => 'https://www.facebook.com/',
                    'Instagram' => 'https://www.instagram.com/',
                    'X'         => 'https://x.com/',
                    'YouTube'   => 'https://www.youtube.com/',
                    'TikTok'    => 'https://www.tiktok.com/',
                ] as $red => $url): ?>
                    <a href="<?= $url ?>" target="_blank" rel="noopener noreferrer"><?= $red ?></a>
                <?php endforeach; ?>
            </nav>
            <p class="footer-copy">&copy; <?= htmlspecialchars(date('Y'), ENT_QUOTES, 'UTF-8') ?> Machine Line. Movilidad confiable para cada camino.</p>
        </div>
    </footer>
    <?php $rutaVista = $rutaVista ?? (basename(dirname($_SERVER['SCRIPT_NAME'] ?? '')) === 'Vista' ? '' : 'Vista/'); ?>
    <script src="<?= $rutaVista ?>js/carrusel.js" defer></script>
</body>
</html>
