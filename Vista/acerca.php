<?php
$tituloPagina = 'Acerca de | Machine Line';
$accionActual = 'acerca';
include __DIR__ . '/layouts/header.php';

$slidesHero = [
    ['imagen' => 'img/hero-1.jpg', 'alt' => 'Station wagon verde azulado circulando por carretera'],
    ['imagen' => 'img/hero-2.jpg', 'alt' => 'Minivan roja estacionada frente a un edificio moderno'],
    ['imagen' => 'img/hero-3.jpg', 'alt' => 'Minivan roja en un camino rodeado de árboles de otoño'],
    ['imagen' => 'img/hero-4.jpg', 'alt' => 'Familia sonriente viajando dentro de un auto'],
    ['imagen' => 'img/hero-5.jpg', 'alt' => 'Familia sentada en el maletero abierto de un auto blanco en el bosque'],
    ['imagen' => 'img/hero-6.jpg', 'alt' => 'Familia saludando desde las ventanas de un auto rojo al atardecer'],
];

$categorias = [
    ['SEDAN',   'Uso urbano y ejecutivo',  'Eficientes en combustible, cómodos y ágiles para traslados diarios y reuniones de negocio.'],
    ['PICK-UP', 'Trabajo y todo terreno',  'Potencia, tracción y área de carga resistente para proyectos, campo o transporte de equipo.'],
    ['SUB',     'Espacio y confort',       'Amplitud interior y estabilidad en carretera, ideales para viajes largos en familia.'],
    ['BUSITO',  'Grupos y turismo',        'Capacidad para múltiples pasajeros con gran comodidad en traslados grupales y corporativos.'],
];
?>

<!-- Carrusel hero con autoplay CSS puro (6 slides, ~7s cada uno = 42s ciclo) -->
<section class="hero-carrusel" aria-label="Galería principal de Machine Line">
    <div class="carrusel-pista">
        <?php foreach ($slidesHero as $indice => $slide): ?>
            <div class="carrusel-slide carrusel-slide-<?= $indice ?>">
                <img src="<?= e($rutaVista . $slide['imagen']) ?>" alt="<?= e($slide['alt']) ?>" <?= $indice > 0 ? 'loading="lazy" ' : '' ?>decoding="async">
            </div>
        <?php endforeach; ?>
    </div>

    <div class="hero-degradado" aria-hidden="true"></div>

    <div class="hero-capa-contenido">
        <div class="contenedor">
            <div class="hero-contenido">
                <span class="etiqueta-hero">Machine Line</span>
                <h1>Más espacio para tu familia, más kilómetros para tus historias.</h1>
                <p class="hero-descripcion">
                    Somos una arrendadora de autos enfocada en ofrecer vehículos confiables,
                    mantenimiento certificado y una atención ágil para viajes personales,
                    corporativos y de carga ligera.
                </p>
                <div class="hero-acciones">
                    <a href="index.php?accion=listar" class="btn btn-primario">Explorar flota</a>
                    <a href="index.php?accion=agregar" class="btn btn-secundario">Registrar auto y cliente</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="seccion-bloque">
    <div class="encabezado-seccion">
        <h2>Nuestra identidad</h2>
        <p>Compromiso con la seguridad, transparencia en el kilometraje y rapidez en cada entrega.</p>
    </div>

    <div class="grid-tarjetas grid-3">
        <article class="tarjeta">
            <h3>Nuestra historia</h3>
            <p>
                <strong>Machine Line</strong> nació con el objetivo de simplificar el alquiler de vehículos,
                eliminando trámites lentos y ofreciendo unidades modernas listas para rodar desde el primer minuto.
            </p>
        </article>
        <article class="tarjeta">
            <h3>Misión</h3>
            <p>
                Brindar soluciones de movilidad versátiles con autos inspeccionados, precios claros
                y un registro unificado de clientes y flota que agiliza cada contrato.
            </p>
        </article>
        <article class="tarjeta">
            <h3>Visión</h3>
            <p>
                Consolidarnos como la arrendadora de referencia en el país por la calidad de nuestra flota,
                control de kilometraje transparente y excelencia en el servicio.
            </p>
        </article>
    </div>
</section>

<section class="seccion-bloque">
    <div class="encabezado-seccion">
        <h2>Categorías disponibles</h2>
        <p>Selecciona un tipo de vehículo para consultar las unidades disponibles en nuestro catálogo.</p>
    </div>

    <div class="grid-tarjetas grid-4">
        <?php foreach ($categorias as [$modelo, $subtitulo, $detalle]): ?>
            <a href="index.php?accion=listar&amp;modelo=<?= e(urlencode($modelo)) ?>" class="tarjeta tarjeta-enlace">
                <span class="badge badge-modelo"><?= e($modelo) ?></span>
                <h3><?= e($subtitulo) ?></h3>
                <p><?= e($detalle) ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<section class="seccion-bloque panel-contacto">
    <div>
        <h2>¿Listo para gestionar la flota?</h2>
        <p>Consulta todos los vehículos registrados o da de alta un nuevo cliente junto con su auto en un solo paso.</p>
    </div>
    <div>
        <p><strong>Horario:</strong> Lunes a Sábado, 8:00 a.m. &ndash; 6:00 p.m.</p>
        <p><strong>Atención:</strong> contacto@machineline.com</p>
        <div class="acciones-inline">
            <a href="index.php?accion=listar" class="btn btn-primario">Ver inventario</a>
            <a href="index.php?accion=agregar" class="btn btn-borde">Nuevo registro</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/layouts/footer.php'; ?>
