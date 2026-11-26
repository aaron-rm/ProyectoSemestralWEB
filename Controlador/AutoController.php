<?php
require_once __DIR__ . '/../Modelo/DBConexion.php';
require_once __DIR__ . '/../Modelo/ClienteModel.php';
require_once __DIR__ . '/../Modelo/AutoModel.php';

if ($accion === 'listar') {
    $modelo = '';
    if (isset($_GET['modelo'])) {
        $modelo = trim($_GET['modelo']);
    }

    $autos = listarAutos($conexion, $modelo);
    include __DIR__ . '/../Vista/mostrar_autos.php';

} elseif ($accion === 'agregar') {
    include __DIR__ . '/../Vista/agregar_auto.php';

} elseif ($accion === 'guardar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extracción de los campos del formulario
    $id_cliente     = $_POST['id_cliente'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $placa          = $_POST['placa'];
    $marca          = $_POST['marca'];
    $modelo         = $_POST['modelo'];
    $kilometraje    = $_POST['kilometraje'];

    // Si la placa ya existe, volvemos al formulario con un mensaje de error
    if (placaExiste($conexion, $placa)) {
        $errorGuardar = "La placa \"$placa\" ya está registrada. Usa una placa diferente.";
        include __DIR__ . '/../Vista/agregar_auto.php';
        exit;
    }

    // Insertar primero en clientes y luego en autos (por la llave foránea)
    guardarCliente($conexion, $id_cliente, $nombre_cliente);
    guardarAuto($conexion, $placa, $marca, $modelo, $kilometraje, $id_cliente);

    header('Location: index.php?accion=listar&modelo=Todos');
    exit;

} elseif ($accion === 'editar' && isset($_GET['placa'])) {
    $placa = $_GET['placa'];
    $auto = buscarAutoPorPlaca($conexion, $placa);

    if (!$auto) {
        header('Location: index.php?accion=listar&modelo=Todos');
        exit;
    }

    include __DIR__ . '/../Vista/editar_auto.php';

} elseif ($accion === 'actualizar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $placa       = $_POST['placa'];
    $marca       = $_POST['marca'];
    $modelo      = $_POST['modelo'];
    $kilometraje = $_POST['kilometraje'];
    $id_cliente  = $_POST['id_cliente'];

    actualizarAuto($conexion, $placa, $marca, $modelo, $kilometraje, $id_cliente);

    header('Location: index.php?accion=listar&modelo=Todos');
    exit;

} elseif ($accion === 'eliminar' && isset($_GET['placa'])) {
    $placa = $_GET['placa'];
    eliminarAuto($conexion, $placa);

    header('Location: index.php?accion=listar&modelo=Todos');
    exit;

} else {
    include __DIR__ . '/../Vista/acerca.php';
}
