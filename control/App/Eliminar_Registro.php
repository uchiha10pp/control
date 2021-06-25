<?php
include_once "clases/clase_registro.php";

if (isset($_POST["submit"])) {
    $id_pe = $_POST["id_pe"];

    $pedido = new pedido();
    $pedido->setId_pe($id_pe);
    $resultado = $pedido->EliminarRegistro();

    if ($resultado != 0) {
        header("location: Administrar_Registro.php");
    } else {
        echo "Error: Informacion no Eliminada";
    }
}
