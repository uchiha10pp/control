<?php
include_once "clases/clase_contagia.php";

if (isset($_POST["submit"])) {
    $id_cli = $_POST["id_cli"];

    $cliente = new cliente();
    $cliente->setId_cli($id_cli);
    $resultado = $cliente->EliminarContagiados();

    if ($resultado != 0) {
        header("location: Administrar_Contagiados.php");
    } else {
        echo "Error: Informacion no Eliminada";
    }
}
