<?php
// Datos de prueba — BORRAR AL INTEGRAR con el Controlador
if (!isset($auto)) {
    $auto = [
        'placa'       => 'AB-1234',
        'marca'       => 'Toyota',
        'modelo'      => 'SEDAN',
        'kilometraje' => 45000,
        'id_cliente'  => 1
    ];
}

$modelosDisponibles = ['SEDAN', 'PICK-UP', 'SUB', 'BUSITO'];
$modeloActual = (string)($auto['modelo'] ?? '');

$tituloPagina = 'Editar Auto | Machine Line';
$accionActual = 'listar';
include __DIR__ . '/layouts/header.php';
?>

<section class="tarjeta seccion-pagina seccion-formulario">
    <div class="encabezado-pagina">
        <div>
            <h1>Editar Vehículo</h1>
            <p class="subtitulo">Actualiza la información del vehículo seleccionado.</p>
        </div>
        <a href="index.php?accion=listar" class="btn btn-borde">Volver al listado</a>
    </div>

    <form method="post" action="index.php?accion=actualizar" class="formulario-grid">
        <div class="campo">
            <label for="placa">Placa</label>
            <input type="text" id="placa" name="placa" value="<?= e($auto['placa'] ?? '') ?>" readonly required>
            <small class="ayuda-campo">La placa identifica el vehículo y no puede modificarse.</small>
        </div>

        <div class="campo">
            <label for="marca">Marca</label>
            <input type="text" id="marca" name="marca" value="<?= e($auto['marca'] ?? '') ?>" maxlength="50" required>
        </div>

        <div class="campo">
            <label for="modelo">Modelo</label>
            <select id="modelo" name="modelo" required>
                <?php foreach ($modelosDisponibles as $modeloOpt): ?>
                    <option value="<?= e($modeloOpt) ?>"<?= $modeloActual === $modeloOpt ? ' selected' : '' ?>><?= e($modeloOpt) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="campo">
            <label for="kilometraje">Kilometraje (km)</label>
            <input type="number" id="kilometraje" name="kilometraje" value="<?= e($auto['kilometraje'] ?? '') ?>" min="0" step="1" required>
        </div>

        <div class="campo campo-completo">
            <label for="id_cliente">ID del Cliente</label>
            <input type="number" id="id_cliente" name="id_cliente" value="<?= e($auto['id_cliente'] ?? '') ?>" min="1" step="1" required>
        </div>

        <div class="acciones-formulario">
            <button type="submit" class="btn btn-primario">Actualizar vehículo</button>
            <a href="index.php?accion=listar" class="btn btn-borde">Cancelar</a>
        </div>
    </form>
</section>

<?php include __DIR__ . '/layouts/footer.php'; ?>
