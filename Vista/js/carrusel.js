// Carrusel del hero en "Acerca de": fundido, autoplay, flechas, puntos, teclado y pausa por ratón/foco.
(function () {
    'use strict';

    const carrusel = document.querySelector('[data-carrusel]');
    if (!carrusel) return;

    const slides = Array.from(carrusel.querySelectorAll('.carrusel-slide'));
    if (slides.length <= 1) return;

    const puntos = Array.from(carrusel.querySelectorAll('[data-carrusel-indice]'));
    const btnAnterior = carrusel.querySelector('[data-carrusel-anterior]');
    const btnSiguiente = carrusel.querySelector('[data-carrusel-siguiente]');
    const INTERVALO_MS = 7000;
    const preferenciaMovimiento = window.matchMedia('(prefers-reduced-motion: reduce)');

    let indiceActual = Math.max(0, slides.findIndex((s) => s.classList.contains('activo')));
    let temporizador = null;
    let pausadoPorRaton = false;
    let pausadoPorFoco = false;

    // Actualiza visibilidad (aria-hidden) e indicador activo (aria-current) para lectores de pantalla.
    function mostrarSlide(nuevoIndice) {
        const total = slides.length;
        indiceActual = ((nuevoIndice % total) + total) % total;

        slides.forEach((slide, idx) => {
            const activo = idx === indiceActual;
            slide.classList.toggle('activo', activo);
            slide.setAttribute('aria-hidden', String(!activo));
        });

        puntos.forEach((punto, idx) => {
            const activo = idx === indiceActual;
            punto.classList.toggle('activo', activo);
            if (activo) {
                punto.setAttribute('aria-current', 'true');
            } else {
                punto.removeAttribute('aria-current');
            }
        });
    }

    function detenerAutoplay() {
        clearInterval(temporizador);
        temporizador = null;
    }

    // No inicia autoplay si el usuario prefiere movimiento reducido o está interactuando.
    function iniciarAutoplay() {
        detenerAutoplay();
        if (preferenciaMovimiento.matches || pausadoPorRaton || pausadoPorFoco) return;
        temporizador = setInterval(() => mostrarSlide(indiceActual + 1), INTERVALO_MS);
    }

    // Reinicia el intervalo tras navegación manual para evitar saltos inmediatos.
    function irASlideManual(nuevoIndice) {
        mostrarSlide(nuevoIndice);
        iniciarAutoplay();
    }

    btnAnterior?.addEventListener('click', () => irASlideManual(indiceActual - 1));
    btnSiguiente?.addEventListener('click', () => irASlideManual(indiceActual + 1));

    puntos.forEach((punto) => {
        punto.addEventListener('click', () => {
            const indice = Number.parseInt(punto.dataset.carruselIndice, 10);
            if (!Number.isNaN(indice)) irASlideManual(indice);
        });
    });

    carrusel.addEventListener('mouseenter', () => { pausadoPorRaton = true; detenerAutoplay(); });
    carrusel.addEventListener('mouseleave', () => { pausadoPorRaton = false; iniciarAutoplay(); });

    carrusel.addEventListener('focusin', () => { pausadoPorFoco = true; detenerAutoplay(); });
    carrusel.addEventListener('focusout', (evento) => {
        // Solo reanuda cuando el foco sale completamente del carrusel.
        if (evento.relatedTarget && carrusel.contains(evento.relatedTarget)) return;
        pausadoPorFoco = false;
        iniciarAutoplay();
    });

    carrusel.addEventListener('keydown', (evento) => {
        if (evento.key === 'ArrowLeft') {
            evento.preventDefault();
            irASlideManual(indiceActual - 1);
        } else if (evento.key === 'ArrowRight') {
            evento.preventDefault();
            irASlideManual(indiceActual + 1);
        }
    });

    preferenciaMovimiento.addEventListener?.('change', () => {
        preferenciaMovimiento.matches ? detenerAutoplay() : iniciarAutoplay();
    });

    mostrarSlide(indiceActual);
    iniciarAutoplay();
})();
