<?php

  require 'base_datos/bd_contagiados.php';

  $message = '';

  if(!empty($_POST['nom_ti']) && !empty($_POST['nom_prop_ti']) && !empty($_POST['direc_ti']) && !empty($_POST['telf_ti']) && !empty($_POST['rubro_ti'])) {

      if (!empty($_POST['nom_ti']) && !empty($_POST['nom_prop_ti']) && !empty($_POST['direc_ti']) && !empty($_POST['telf_ti']) && !empty($_POST['rubro_ti'])) {

        $sql = "INSERT INTO tienda (nom_ti, nom_prop_ti, direc_ti, telf_ti, rubro_ti) VALUES (:nom_ti, :nom_prop_ti, :direc_ti, :telf_ti, :rubro_ti)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom_ti', $_POST['nom_ti']);
        $stmt->bindParam(':nom_prop_ti', $_POST['nom_prop_ti']);
        $stmt->bindParam(':direc_ti', $_POST['direc_ti']);
        $stmt->bindParam(':telf_ti', $_POST['telf_ti']);
        $stmt->bindParam(':rubro_ti', $_POST['rubro_ti']);


        if ($stmt->execute()) {
          $message = 'se ha registrado con exito';
        } else {
          $message = 'lo sentimos, hay un problema';
        }
      }

    else{
      $message = 'Las contraseñas no coinciden.';
    }
  }
  else{
    $message = 'Complete todos los Campos';
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar Tienda</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style media="screen">
    .volver{
      padding: 20px;
      background: #901169;
      margin: auto;
      margin-top: 10px;
      text-align: center;
    }
    .volver a{
      color: #fff;
      font-family: sans-serif;
      text-decoration: none;
    }
    </style>
  </head>
  <body>


    <?php if(!empty($message)): ?>
      <p align="center"> <?= $message ?></p>
    <?php endif; ?>


<div class="contenedor">
        <h1 class="titulo">Registrar Personal</h1>
        <hr class="border">
    <form action="Tiendas_Añadir.php" method="POST" class="formulario" name="login" >
      <div class="form-group">
        <input type="text" name="nom_ti" class="usuario" placeholder="Nombre Tienda">
      </div>

        <div class="form-group">
             <input type="text" name="nom_prop_ti" class="password" placeholder="Nombre Propietario">
        </div>

        <div class="form-group">
              <input type="text" name="direc_ti" class="usuario" placeholder="Dirección">
        </div>

        <div class="form-group">
              <input type="number" name="telf_ti" class="usuario" placeholder="Ingrese Teléfono">
        </div>

        <div class="form-group">
              <input type="text" name="rubro_ti" class="usuario" placeholder="Rubro">
        </div>


      <input type="submit" value="Submit" style="padding:15px;">

    </form>
    <div class="volver">
      <a href="/proyecto/App/Administrar_Tiendas.php">VOLVER</a>
    </div>

  </body>
</html>
