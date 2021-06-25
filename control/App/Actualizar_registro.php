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

$id_cli = $_POST["id_cli"];
$cliente = new cliente();
$cliente->setId_cli($id_cli);
$resultado = $cliente->mostrarContagiadosPorId();

foreach ($resultado->fetchAll() as $item) {
    ?>
    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" class="formulario">
      <div class="form-group">
        <input type="text" name="nom_user" class="usuario" placeholder="Ingrese Nombre" value="<?= $item["nom_user"] ?>">
      </div>

        <div class="form-group">
             <input type="text" name="ape_user" class="password" placeholder="Ingrese Apellido" value="<?= $item["ape_user"] ?>">
        </div>

        <div class="form-group">
              <input type="number" name="telf_user" class="usuario" placeholder="Teléfono" value="<?= $item["telf_user"] ?>">
        </div>

        <div class="form-group">
              <input type="number" name="dni_user" class="usuario" placeholder="Ingrese DNI" value="<?= $item["dni_user"] ?>">
        </div>

        <div class="form-group">
          <select type="text" class="select" name="sex_user" value="<?= $item["sex_user"] ?>">
            <option value="Masculino">M</option>
            <option value="Femenino">F</option>
          </select>
        </div>

        <div class="form-group">
              <input type="text" name="direc_user" class="usuario" placeholder="ingrese correo" value="<?= $item["direc_user"] ?>">
        </div>

        <input type="hidden" name="id_cli" value="<?= $id_cli ?>">
        <input type="submit" name="submit" value="actualizar" style="padding:15px; font-size: 15px;">
    </form>
    <?php
}

if (isset($_POST["submit"])) {
    $nom_user = $_POST["nom_user"];
    $ape_user = $_POST["ape_user"];
    $telf_user = $_POST["telf_user"];
    $dni_user = $_POST["dni_user"];
    $sex_user = $_POST["sex_user"];
    $direc_user = $_POST["direc_user"];
    $id_cli = $_POST["id_cli"];

    $resultado = $cliente->ActualizarContagiados($id_con, $nom_user, $ape_user, $telf_user, $dni_user, $sex_user, $direc_user);


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
