<?php
// Obtiene todos los autos o los filtra por modelo, junto con el nombre del cliente
function listarAutos($conexion, $modelo = '')
{
    $sql = "SELECT a.*, c.nombre_cliente
            FROM autos a
            INNER JOIN clientes c ON a.id_cliente = c.id_cliente";

    if ($modelo !== '' && $modelo !== 'Todos') {
        $sql .= " WHERE a.modelo = '$modelo'";
    }

    $resultado = mysqli_query($conexion, $sql);
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
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
