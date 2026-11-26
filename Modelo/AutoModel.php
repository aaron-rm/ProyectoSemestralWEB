<?php
// Obtiene las placas registradas para llenar el selector de búsqueda
function listarPlacas($conexion)
{
    $resultado = mysqli_query($conexion, "SELECT placa, marca FROM autos ORDER BY placa");
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

// Obtiene todos los autos o los filtra por modelo, placa y/o cliente
function listarAutos($conexion, $modelo = '', $placa = '', $id_cliente = '')
{
    $sql = "SELECT a.*, c.nombre_cliente
            FROM autos a
            INNER JOIN clientes c ON a.id_cliente = c.id_cliente
            WHERE 1=1";

    if ($modelo !== '' && $modelo !== 'Todos') {
        $sql .= " AND a.modelo = '$modelo'";
    }

    if ($placa !== '') {
        $sql .= " AND a.placa = '$placa'";
    }

    if ($id_cliente !== '') {
        $sql .= " AND a.id_cliente = '$id_cliente'";
    }

    $resultado = mysqli_query($conexion, $sql);
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

// Verifica si ya existe un auto con esa placa (retorna true si existe)
function placaExiste($conexion, $placa)
{
    $resultado = mysqli_query($conexion, "SELECT placa FROM autos WHERE placa = '$placa'");
    return mysqli_num_rows($resultado) > 0;
}

// Busca un auto por su placa para cargarlo en el formulario de edición
function buscarAutoPorPlaca($conexion, $placa)
{
    $sql = "SELECT * FROM autos WHERE placa = '$placa'";
    $resultado = mysqli_query($conexion, $sql);
    return mysqli_fetch_assoc($resultado);
}

// Inserta un nuevo auto en la BD
function guardarAuto($conexion, $placa, $marca, $modelo, $kilometraje, $id_cliente)
{
    $sql = "INSERT INTO autos (placa, marca, modelo, kilometraje, id_cliente)
            VALUES ('$placa', '$marca', '$modelo', '$kilometraje', '$id_cliente')";
    return mysqli_query($conexion, $sql);
}

// Actualiza los datos de un auto existente según su placa
function actualizarAuto($conexion, $placa, $marca, $modelo, $kilometraje, $id_cliente)
{
    $sql = "UPDATE autos
            SET marca = '$marca', modelo = '$modelo', kilometraje = '$kilometraje', id_cliente = '$id_cliente'
            WHERE placa = '$placa'";
    return mysqli_query($conexion, $sql);
}

// Elimina un auto de la BD según su placa
function eliminarAuto($conexion, $placa)
{
    $sql = "DELETE FROM autos WHERE placa = '$placa'";
    return mysqli_query($conexion, $sql);
}
