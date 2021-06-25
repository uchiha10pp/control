<?php
include_once "clases/Administrador.php";

if (isset($_POST["submit"])) {
    $id = $_POST["id"];

    $administrador = new Administrador();
    $administrador->setId($id);
    $resultado = $administrador->EliminarUsuario();

    if ($resultado != 0) {
        header("location: Administrar_Usuario.php");
    } else {
        echo "Error: Informacion no Eliminada";
    }
}
