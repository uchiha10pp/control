<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/proyecto/css/style.css">
  </head>
  <body>
    <div class="contenedor">

<?php
include_once "clases/clase_contagia.php";

$id_pe = $_POST["id_pe"];
$pedido = new pedido();
$pedido->setId_pe($id_pe);
$resultado = $pedido->mostrarRegistroPorId();

foreach ($resultado->fetchAll() as $item) {
    ?>
    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" class="formulario">
      <div class="form-group">
        <input type="text" name="nom_pe" class="usuario" placeholder="ingrese nombre" value="<?= $item["nom_pe"] ?>">
      </div>

        <div class="form-group">
             <input type="number" name="estado_pe" class="password" placeholder="Enter your Password" value="<?= $item["Estado_pe"] ?>">
        </div>

        <div class="form-group">
              <input type="text" name="registro_pe" class="usuario" placeholder="ingrese correo" value="<?= $item["Precio_pe"] ?>">
        </div>

        <input type="hidden" name="id_pe" value="<?= $id_pe ?>">
        <input type="submit" name="submit" value="actualizar" style="padding:15px; font-size: 15px;">
    </form>
    <?php
}

if (isset($_POST["submit"])) {
    $nom_pe = $_POST["nom_pe"];
    $Estado_pe = $_POST["estado_pe"];
    $Precio_pe = $_POST["registro_pe"];
    $id_pe = $_POST["id_pe"];

    $resultado = $pedido->ActualizarRegistro($id_pe, $nom_pe, $Estado_pe, $Precio_pe);


    if ($resultado != 0) {
        header("location: Administrar_Registro.php");
    } else {
        echo "Error: Informacion no actualizada";
    }

}
?>
</div>
</body>
</html>
