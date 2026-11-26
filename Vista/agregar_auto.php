<?php
$modelosDisponibles = ['SEDAN', 'PICK-UP', 'SUB', 'BUSITO'];

$tituloPagina = 'Agregar Auto y Cliente | Machine Line';
$accionActual = 'agregar';
include __DIR__ . '/layouts/header.php';
?>

<section class="tarjeta seccion-pagina seccion-formulario">
    <div class="encabezado-pagina">
        <div>
            <h1>Agregar Auto y Cliente</h1>
            <p class="subtitulo">Registra simultáneamente los datos del cliente y de su vehículo en un solo formulario.</p>
        </div>
        <a href="index.php?accion=listar" class="btn btn-borde">Ver listado</a>
    </div>

    <form method="post" action="index.php?accion=guardar" class="formulario-compuesto">
        <?php if (isset($errorGuardar)): ?>
            <p class="mensaje-error"><?= $errorGuardar ?></p>
        <?php endif; ?>
        <fieldset class="grupo-campos">
            <legend>Datos del Cliente</legend>
            <div class="formulario-grid">
                <div class="campo">
                    <label for="id_cliente">ID del Cliente</label>
                    <input type="number" id="id_cliente" name="id_cliente" min="1" max="999999999" step="1" placeholder="Ej. 1" required>
                </div>
                <div class="campo">
                    <label for="nombre_cliente">Nombre del Cliente</label>
                    <input type="text" id="nombre_cliente" name="nombre_cliente" minlength="2" maxlength="100" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñÜü]+( [A-Za-zÁÉÍÓÚáéíóúÑñÜü]+)*" title="Solo se permiten letras y espacios." placeholder="Ej. Ana Pérez" required>
                </div>
            </div>
        </fieldset>

        <fieldset class="grupo-campos">
            <legend>Datos del Auto</legend>
            <div class="formulario-grid">
                <div class="campo">
                    <label for="placa">Placa</label>
                    <input type="text" id="placa" name="placa" minlength="4" maxlength="10" pattern="[A-Za-z0-9]+(-[A-Za-z0-9]+)*" title="Solo letras, números y guiones (ej. AB1234 o AB-1234)." placeholder="Ej. AB-1234" required>
                </div>
                <div class="campo">
                    <label for="marca">Marca</label>
                    <input type="text" id="marca" name="marca" minlength="2" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+( [A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+)*" title="Solo se permiten letras, números y espacios." placeholder="Ej. Toyota" required>
                </div>
                <div class="campo">
                    <label for="modelo">Modelo</label>
                    <select id="modelo" name="modelo" required>
                        <option value="" disabled selected>Seleccione un modelo...</option>
                        <?php foreach ($modelosDisponibles as $modeloOpt): ?>
                            <option value="<?= $modeloOpt ?>"><?= $modeloOpt ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="campo">
                    <label for="kilometraje">Kilometraje (km)</label>
                    <input type="number" id="kilometraje" name="kilometraje" min="0" max="9999999" step="1" placeholder="Ej. 45000" required>
                </div>
            </div>
        </fieldset>

        <div class="acciones-formulario">
            <button type="submit" class="btn btn-primario">Guardar registro</button>
            <button type="reset" class="btn btn-borde">Limpiar</button>
        </div>
    </form>
</section>

<?php include __DIR__ . '/layouts/footer.php'; ?>
