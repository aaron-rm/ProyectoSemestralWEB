    </main>

    <footer class="site-footer">
        <div class="contenedor footer-contenido">
            <p class="footer-marca"><strong>Machine Line</strong> &mdash; Arrendadora de Autos</p>
            <p class="footer-copy">&copy; <?= htmlspecialchars(date('Y'), ENT_QUOTES, 'UTF-8') ?> Machine Line. Movilidad confiable para cada camino.</p>
        </div>
    </footer>
    <?php $rutaVista = $rutaVista ?? (basename(dirname($_SERVER['SCRIPT_NAME'] ?? '')) === 'Vista' ? '' : 'Vista/'); ?>
    <script src="<?= $rutaVista ?>js/carrusel.js" defer></script>
</body>
</html>
