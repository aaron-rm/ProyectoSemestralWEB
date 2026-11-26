<?php
if (isset($_GET['modelo'])) {
    $modeloSeleccionado = $_GET['modelo'];
} else {
    $modeloSeleccionado = '';
}

if (isset($_GET['placa'])) {
    $placaSeleccionada = $_GET['placa'];
} else {
    $placaSeleccionada = '';
}

if (isset($_GET['id_cliente'])) {
    $clienteSeleccionado = $_GET['id_cliente'];
} else {
    $clienteSeleccionado = '';
}

if (!isset($seBusco)) {
    $seBusco = false;
}

$modelosDisponibles = ['SEDAN', 'PICK-UP', 'SUB', 'BUSITO'];

$tituloPagina = 'Mostrar Autos | Machine Line';
$accionActual = 'listar';
include __DIR__ . '/layouts/header.php';
?>

<section class="tarjeta seccion-pagina">
    <div class="encabezado-pagina">
        <div>
            <h1>Inventario de Autos</h1>
            <p class="subtitulo">Consulta los vehículos por modelo, placa o cliente, o muestra todo el catálogo.</p>
        </div>
        <a href="index.php?accion=agregar" class="btn btn-primario">+ Agregar auto</a>
    </div>

    <!-- Formulario de consulta por modelo, placa o cliente -->
    <form method="get" action="index.php" class="barra-filtro">
        <input type="hidden" name="accion" value="listar">
        <div class="campo-filtro">
            <label for="modelo">Modelo:</label>
            <select name="modelo" id="modelo">
                <option value=""<?php if ($modeloSeleccionado === '' || $modeloSeleccionado === 'Todos') { echo ' selected'; } ?>>Todos</option>
                <?php foreach ($modelosDisponibles as $modeloOpt): ?>
                    <option value="<?= $modeloOpt ?>"<?php if ($modeloSeleccionado === $modeloOpt) { echo ' selected'; } ?>><?= $modeloOpt ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="campo-filtro">
            <label for="placa">Placa:</label>
            <select name="placa" id="placa">
                <option value="">Todas</option>
                <?php foreach ($placasDisponibles as $item): ?>
                    <option value="<?= $item['placa'] ?>"<?php if ($placaSeleccionada === $item['placa']) { echo ' selected'; } ?>><?= $item['placa'] ?> &mdash; <?= $item['marca'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="campo-filtro">
            <label for="id_cliente">Cliente:</label>
            <select name="id_cliente" id="id_cliente">
                <option value="">Todos</option>
                <?php foreach ($clientesDisponibles as $cli): ?>
                    <option value="<?= $cli['id_cliente'] ?>"<?php if ($clienteSeleccionado === (string)$cli['id_cliente']) { echo ' selected'; } ?>><?= $cli['nombre_cliente'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="acciones-filtro">
            <button type="submit" class="btn btn-primario">Buscar</button>
            <a href="index.php?accion=listar&amp;modelo=Todos" class="btn btn-borde">Mostrar todos</a>
            <?php if ($seBusco): ?>
                <a href="index.php?accion=listar" class="btn btn-borde">Limpiar</a>
            <?php endif; ?>
        </div>
    </form>

    <!-- Estado inicial, sin coincidencias o tabla de resultados -->
    <?php if (!$seBusco): ?>
        <div class="estado-vacio">
            <h2>Consulta el catálogo de autos</h2>
            <p>Selecciona un modelo, una placa o un cliente, o pulsa "Mostrar todos" para listar los vehículos.</p>
            <div class="acciones-inline">
                <a href="index.php?accion=listar&amp;modelo=Todos" class="btn btn-primario">Mostrar todos</a>
            </div>
        </div>
    <?php elseif (empty($autos)): ?>
        <div class="estado-vacio">
            <h2>No hay autos registrados</h2>
            <p>No se encontraron vehículos que coincidan con la búsqueda realizada.</p>
            <div class="acciones-inline">
                <a href="index.php?accion=listar&amp;modelo=Todos" class="btn btn-borde">Ver todos</a>
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
                        <?php $placa = (string)$auto['placa']; ?>
                        <tr>
                            <td class="celda-placa"><?= $placa ?></td>
                            <td><?= $auto['marca'] ?></td>
                            <td><span class="badge badge-modelo"><?= $auto['modelo'] ?></span></td>
                            <td><?= number_format((int)$auto['kilometraje'], 0, '.', ',') ?> km</td>
                            <td><?= $auto['id_cliente'] ?></td>
                            <td><?= $auto['nombre_cliente'] ?></td>
                            <td class="celda-acciones">
                                <a href="index.php?accion=editar&amp;placa=<?= urlencode($placa) ?>" class="btn btn-sm btn-editar">Editar</a>
                                <a href="index.php?accion=eliminar&amp;placa=<?= urlencode($placa) ?>"
                                   class="btn btn-sm btn-eliminar"
                                   onclick="return confirm('¿Está seguro de eliminar el vehículo con placa <?= $placa ?>?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>

<?php include __DIR__ . '/layouts/footer.php'; ?>
