<?php
// Datos de prueba — BORRAR AL INTEGRAR con el Controlador
if (!isset($autos)) {
    $autos = [
        ['placa' => 'AB-1234', 'marca' => 'Toyota', 'modelo' => 'SEDAN', 'kilometraje' => 45000, 'id_cliente' => 1, 'nombre_cliente' => 'Ana Pérez']
    ];
}

$modeloSeleccionado = $_GET['modelo'] ?? ($_POST['modelo'] ?? '');
$modelosDisponibles = ['SEDAN', 'PICK-UP', 'SUB', 'BUSITO'];

$tituloPagina = 'Mostrar Autos | Machine Line';
$accionActual = 'listar';
include __DIR__ . '/layouts/header.php';
?>

<section class="tarjeta seccion-pagina">
    <div class="encabezado-pagina">
        <div>
            <h1>Inventario de Autos</h1>
            <p class="subtitulo">Filtra los vehículos por modelo o gestiona los registros existentes.</p>
        </div>
        <a href="index.php?accion=agregar" class="btn btn-primario">+ Agregar auto</a>
    </div>

    <!-- Filtro por modelo -->
    <form method="get" action="index.php" class="barra-filtro">
        <input type="hidden" name="accion" value="listar">
        <div class="campo-filtro">
            <label for="modelo">Filtrar por modelo:</label>
            <select name="modelo" id="modelo">
                <option value=""<?= ($modeloSeleccionado === '' || $modeloSeleccionado === 'Todos') ? ' selected' : '' ?>>Todos</option>
                <?php foreach ($modelosDisponibles as $modeloOpt): ?>
                    <option value="<?= e($modeloOpt) ?>"<?= $modeloSeleccionado === $modeloOpt ? ' selected' : '' ?>><?= e($modeloOpt) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="acciones-filtro">
            <button type="submit" class="btn btn-primario">Filtrar</button>
            <?php if ($modeloSeleccionado !== '' && $modeloSeleccionado !== 'Todos'): ?>
                <a href="index.php?accion=listar" class="btn btn-borde">Limpiar</a>
            <?php endif; ?>
        </div>
    </form>

    <!-- Tabla de resultados o estado vacío -->
    <?php if (empty($autos)): ?>
        <div class="estado-vacio">
            <h2>No hay autos registrados</h2>
            <p>No se encontraron vehículos que coincidan con el filtro seleccionado.</p>
            <div class="acciones-inline">
                <a href="index.php?accion=listar" class="btn btn-borde">Ver todos</a>
                <a href="index.php?accion=agregar" class="btn btn-primario">Registrar nuevo auto</a>
            </div>
        </div>
    <?php else: ?>
        <div class="tabla-responsive">
            <table class="tabla-datos">
                <thead>
                    <tr>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Kilometraje</th>
                        <th>ID Cliente</th>
                        <th>Nombre Cliente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($autos as $auto): ?>
                        <?php $placa = (string)($auto['placa'] ?? ''); ?>
                        <tr>
                            <td class="celda-placa"><?= e($placa) ?></td>
                            <td><?= e($auto['marca'] ?? '') ?></td>
                            <td><span class="badge badge-modelo"><?= e($auto['modelo'] ?? '') ?></span></td>
                            <td><?= e(number_format((int)($auto['kilometraje'] ?? 0), 0, '.', ',') . ' km') ?></td>
                            <td><?= e($auto['id_cliente'] ?? '') ?></td>
                            <td><?= e($auto['nombre_cliente'] ?? '') ?></td>
                            <td class="celda-acciones">
                                <a href="index.php?accion=editar&amp;placa=<?= e(urlencode($placa)) ?>" class="btn btn-sm btn-editar">Editar</a>
                                <a href="index.php?accion=eliminar&amp;placa=<?= e(urlencode($placa)) ?>"
                                   class="btn btn-sm btn-eliminar"
                                   onclick="return confirm('¿Está seguro de eliminar el vehículo con placa <?= e($placa) ?>?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>

<?php include __DIR__ . '/layouts/footer.php'; ?>
