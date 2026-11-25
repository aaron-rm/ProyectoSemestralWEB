<?php
$tituloPagina = 'Acerca de | Machine Line';
$accionActual = 'acerca';
include __DIR__ . '/layouts/header.php';
?>

<section class="hero">
    <div class="hero-texto">
        <span class="etiqueta-hero">Tu camino, nuestra flota</span>
        <h1>Bienvenido a <span>Machine Line</span></h1>
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
    <div class="hero-visual" aria-hidden="true">
        <div class="tarjeta-resumen-flota">
            <svg viewBox="0 0 240 120" class="ilustracion-auto" role="img" aria-label="Silueta de vehículo Machine Line">
                <path d="M25 82 L38 52 C43 42 54 36 68 36 L142 36 C158 36 170 42 180 54 L208 60 C216 62 222 69 222 78 L222 86 L20 86 Z" fill="currentColor" opacity="0.16"/>
                <path d="M32 82 L44 54 C48 46 57 41 69 41 L140 41 C154 41 164 46 173 56 L204 62 C211 64 216 70 216 77 L216 82" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M72 41 L64 60 L158 60 L146 41" fill="none" stroke="currentColor" stroke-width="3" stroke-linejoin="round"/>
                <line x1="108" y1="41" x2="108" y2="60" stroke="currentColor" stroke-width="3"/>
                <circle cx="68" cy="86" r="16" fill="var(--color-superficie)" stroke="currentColor" stroke-width="5"/>
                <circle cx="68" cy="86" r="6" fill="currentColor"/>
                <circle cx="176" cy="86" r="16" fill="var(--color-superficie)" stroke="currentColor" stroke-width="5"/>
                <circle cx="176" cy="86" r="6" fill="currentColor"/>
            </svg>
            <div class="metricas-hero">
                <div>
                    <strong>4</strong>
                    <span>Categorías</span>
                </div>
                <div>
                    <strong>100%</strong>
                    <span>Revisados</span>
                </div>
                <div>
                    <strong>24/7</strong>
                    <span>Asistencia</span>
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
        <a href="index.php?accion=listar&amp;modelo=SEDAN" class="tarjeta tarjeta-enlace">
            <span class="badge badge-modelo">SEDAN</span>
            <h3>Uso urbano y ejecutivo</h3>
            <p>Eficientes en combustible, cómodos y ágiles para traslados diarios y reuniones de negocio.</p>
        </a>

        <a href="index.php?accion=listar&amp;modelo=PICK-UP" class="tarjeta tarjeta-enlace">
            <span class="badge badge-modelo">PICK-UP</span>
            <h3>Trabajo y todo terreno</h3>
            <p>Potencia, tracción y área de carga resistente para proyectos, campo o transporte de equipo.</p>
        </a>

        <a href="index.php?accion=listar&amp;modelo=SUB" class="tarjeta tarjeta-enlace">
            <span class="badge badge-modelo">SUB</span>
            <h3>Espacio y confort</h3>
            <p>Amplitud interior y estabilidad en carretera, ideales para viajes largos en familia.</p>
        </a>

        <a href="index.php?accion=listar&amp;modelo=BUSITO" class="tarjeta tarjeta-enlace">
            <span class="badge badge-modelo">BUSITO</span>
            <h3>Grupos y turismo</h3>
            <p>Capacidad para múltiples pasajeros con gran comodidad en traslados grupales y corporativos.</p>
        </a>
    </div>
</section>

<section class="seccion-bloque panel-contacto">
    <div class="panel-contacto-info">
        <h2>¿Listo para gestionar la flota?</h2>
        <p>Consulta todos los vehículos registrados o da de alta un nuevo cliente junto con su auto en un solo paso.</p>
    </div>
    <div class="panel-contacto-datos">
        <p><strong>Horario:</strong> Lunes a Sábado, 8:00 a.m. &ndash; 6:00 p.m.</p>
        <p><strong>Atención:</strong> contacto@machineline.com</p>
        <div class="acciones-inline">
            <a href="index.php?accion=listar" class="btn btn-primario">Ver inventario</a>
            <a href="index.php?accion=agregar" class="btn btn-borde">Nuevo registro</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/layouts/footer.php'; ?>
