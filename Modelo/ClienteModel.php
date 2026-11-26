<?php
// Inserta el cliente en la BD (si el ID ya existe, actualiza su nombre)
function guardarCliente($conexion, $id_cliente, $nombre_cliente)
{
    $sql = "INSERT INTO clientes (id_cliente, nombre_cliente)
            VALUES ('$id_cliente', '$nombre_cliente')
            ON DUPLICATE KEY UPDATE nombre_cliente = '$nombre_cliente'";

    return mysqli_query($conexion, $sql);
}
