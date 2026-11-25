// Muestra un skeleton en <main> mientras el servidor consulta la BD (listar, editar o filtrar).
(function () {
    'use strict';

    var main = document.querySelector('main');
    if (!main) return;

    // Se guarda el contenido inicial para restaurarlo si el usuario vuelve con el historial en caché.
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

    // Intercepta clics normales en enlaces de consulta; ignora nueva pestaña, modificadores o eventos cancelados.
    document.addEventListener('click', function (e) {
        var a = e.target.closest('a[href]');
        if (!a || e.defaultPrevented || e.button !== 0 || e.ctrlKey || e.metaKey || e.shiftKey || e.altKey || a.target === '_blank') return;
        if (consultaBD.test(a.getAttribute('href'))) skeleton();
    });

    // Muestra el skeleton al enviar el formulario de filtro de listado.
    document.addEventListener('submit', function (e) {
        var accion = e.target.querySelector('[name="accion"]');
        if (!e.defaultPrevented && accion && accion.value === 'listar') skeleton();
    });

    // Restaura <main> cuando el navegador recupera la página desde bfcache al pulsar "atrás".
    window.addEventListener('pageshow', function (e) {
        if (e.persisted) main.innerHTML = original;
    });
})();
