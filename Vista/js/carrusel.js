(function () {
    'use strict';

    const carrusel = document.querySelector('[data-carrusel]');
    if (!carrusel) {
        return;
    }

    const slides = Array.from(carrusel.querySelectorAll('.carrusel-slide'));
    const puntos = Array.from(carrusel.querySelectorAll('[data-carrusel-indice]'));
    const btnAnterior = carrusel.querySelector('[data-carrusel-anterior]');
    const btnSiguiente = carrusel.querySelector('[data-carrusel-siguiente]');

    if (slides.length <= 1) {
        return;
    }

    const INTERVALO_MS = 7000;
    const preferenciaMovimiento = window.matchMedia('(prefers-reduced-motion: reduce)');

    let indiceActual = slides.findIndex((slide) => slide.classList.contains('activo'));
    if (indiceActual < 0) {
        indiceActual = 0;
    }

    let temporizador = null;
    let pausadoPorRaton = false;
    let pausadoPorFoco = false;

    function mostrarSlide(nuevoIndice) {
        const total = slides.length;
        indiceActual = ((nuevoIndice % total) + total) % total;

        slides.forEach((slide, idx) => {
            const activo = idx === indiceActual;
            slide.classList.toggle('activo', activo);
            slide.setAttribute('aria-hidden', activo ? 'false' : 'true');
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
        if (temporizador !== null) {
            clearInterval(temporizador);
            temporizador = null;
        }
    }

    function iniciarAutoplay() {
        detenerAutoplay();
        if (preferenciaMovimiento.matches || pausadoPorRaton || pausadoPorFoco) {
            return;
        }
        temporizador = setInterval(() => {
            mostrarSlide(indiceActual + 1);
        }, INTERVALO_MS);
    }

    function irASlideManual(nuevoIndice) {
        mostrarSlide(nuevoIndice);
        iniciarAutoplay();
    }

    if (btnAnterior) {
        btnAnterior.addEventListener('click', () => {
            irASlideManual(indiceActual - 1);
        });
    }

    if (btnSiguiente) {
        btnSiguiente.addEventListener('click', () => {
            irASlideManual(indiceActual + 1);
        });
    }

    puntos.forEach((punto) => {
        punto.addEventListener('click', () => {
            const indice = Number.parseInt(punto.dataset.carruselIndice, 10);
            if (!Number.isNaN(indice)) {
                irASlideManual(indice);
            }
        });
    });

    carrusel.addEventListener('mouseenter', () => {
        pausadoPorRaton = true;
        detenerAutoplay();
    });

    carrusel.addEventListener('mouseleave', () => {
        pausadoPorRaton = false;
        iniciarAutoplay();
    });

    carrusel.addEventListener('focusin', () => {
        pausadoPorFoco = true;
        detenerAutoplay();
    });

    carrusel.addEventListener('focusout', (evento) => {
        const siguienteFoco = evento.relatedTarget;
        if (siguienteFoco && carrusel.contains(siguienteFoco)) {
            return;
        }
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

    if (typeof preferenciaMovimiento.addEventListener === 'function') {
        preferenciaMovimiento.addEventListener('change', () => {
            if (preferenciaMovimiento.matches) {
                detenerAutoplay();
            } else {
                iniciarAutoplay();
            }
        });
    }

    mostrarSlide(indiceActual);
    iniciarAutoplay();
})();
