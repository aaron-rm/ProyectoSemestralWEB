// Muestra un skeleton en <main> mientras el servidor consulta la BD
// (al ir al listado, editar un auto o aplicar el filtro).
(function () {
    var main = document.querySelector('main');
    if (!main) return;
    var original = main.innerHTML;
    var consultaBD = /accion=(listar|editar)\b/;

    function skeleton() {
        var filas = '';
        for (var i = 0; i < 6; i++) {
            filas += '<div class="sk-fila"><span class="sk sk-corto"></span><span class="sk"></span>' +
                '<span class="sk"></span><span class="sk sk-corto"></span><span class="sk sk-btn"></span></div>';
        }
        main.innerHTML =
            '<div class="skeleton" role="status" aria-live="polite">' +
            '<span class="sr-only">Cargando datos…</span>' +
            '<span class="sk sk-titulo"></span><span class="sk sk-subtitulo"></span>' +
            '<div class="sk-tabla">' + filas + '</div></div>';
        window.scrollTo(0, 0);
    }

    document.addEventListener('click', function (e) {
        var a = e.target.closest('a[href]');
        if (!a || e.defaultPrevented || e.button !== 0 || e.ctrlKey || e.metaKey || e.shiftKey || a.target === '_blank') return;
        if (consultaBD.test(a.getAttribute('href'))) skeleton();
    });

    document.addEventListener('submit', function (e) {
        var accion = e.target.querySelector('[name="accion"]');
        if (!e.defaultPrevented && accion && accion.value === 'listar') skeleton();
    });

    // Al volver con el botón "atrás" el navegador restaura la página desde caché: quitar el skeleton.
    window.addEventListener('pageshow', function (e) {
        if (e.persisted) main.innerHTML = original;
    });
})();
