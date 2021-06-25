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
include_once "clases/Administrador.php";

$id = $_POST["id"];
$administrador = new Administrador();
$administrador->setId($id);
$resultado = $administrador->mostrarUsuariosPorId();

foreach ($resultado->fetchAll() as $item) {
    ?>
    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" class="formulario">
      <div class="form-group">
        <input type="text" name="usuario" class="usuario" placeholder="ingrese nombre" value="<?= $item["usuario"] ?>">
      </div>

        <div class="form-group">
             <input type="password" name="password" class="password" placeholder="Enter your Password" value="<?= $item["password"] ?>">
        </div>

        <div class="form-group">
              <input type="text" name="email" class="usuario" placeholder="ingrese correo" value="<?= $item["email"] ?>">
        </div>

        <div class="form-group">
              <input type="text" name="nombre" class="usuario" placeholder="ingrese nombre" value="<?= $item["nombre"] ?>">
        </div>

        <div class="form-group">
              <input type="text" name="apellidos" class="usuario" placeholder="ingrese apellidos" value="<?= $item["apellidos"] ?>">
        </div>

        <div class="form-group">
             <input type="number" name="DNI" class="number" placeholder="ingrese numero de DNI" value="<?= $item["DNI"] ?>">
        </div>

        <div class="form-group">
              <input type="number" name="telefono" class="number" placeholder="ingrese numero de telefono"  value="<?= $item["telefono"] ?>">
        </div>

        <div class="form-group">
          <select type="text" class="select" name="sexo" value="<?= $item["sexo"] ?>">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
        </div>
        <div class="form-group">
          <select type="text" class="select"  name="cargo" value="<?= $item["cargo"] ?>">
            <option value="Administrador">administrador</option>
            <option value="Repartidor">repartidor</option>
          </select>
        </div>
        <div class="form-group">
          <select type="text" class="select"  name="estado">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
          </select>
        </div>

        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" name="submit" value="actualizar" style="padding:15px; font-size: 15px;">
    </form>
    <?php
}

if (isset($_POST["submit"])) {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $DNI = $_POST["DNI"];
    $telefono = $_POST["telefono"];
    $sexo = $_POST["sexo"];
    $cargo = $_POST["cargo"];
    $estado = $_POST["estado"];
    $id = $_POST["id"];

    $resultado = $administrador->ActualizarUsuario($id, $usuario, $password, $email, $nombre, $apellidos, $DNI, $telefono, $sexo, $cargo, $estado);


    if ($resultado != 0) {
        header("location: Administrar_Usuario.php");
    } else {
        echo "Error: Informacion no actualizada";
    }

}
?>
</div>
</body>
</html>
