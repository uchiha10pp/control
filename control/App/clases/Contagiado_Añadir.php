<?php

  require 'base_datos/bd_clientes.php';

  $message = '';

  if(!empty($_POST['nom_user']) && !empty($_POST['ape_user']) && !empty($_POST['telf_user']) && !empty($_POST['dni_user']) && !empty($_POST['sex_user']) && !empty($_POST['direc_user'])) {

      if (!empty($_POST['nom_user']) && !empty($_POST['ape_user']) && !empty($_POST['telf_user']) && !empty($_POST['dni_user']) && !empty($_POST['sex_user']) && !empty($_POST['direc_user'])) {

        $sql = "INSERT INTO clientes (nom_user, ape_user, telf_user, dni_user, sex_user, direc_user) VALUES (:nom_user, :ape_user, :telf_user, :dni_user, :sex_user, :direc_user)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom_user', $_POST['nom_user']);
        $stmt->bindParam(':ape_user', $_POST['ape_user']);
        $stmt->bindParam(':telf_user', $_POST['telf_user']);
        $stmt->bindParam(':dni_user', $_POST['dni_user']);
        $stmt->bindParam(':sex_user', $_POST['sex_user']);
        $stmt->bindParam(':direc_user', $_POST['direc_user']);


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
    <title>Registro</title>
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
        <h1 class="titulo">Registrar Contagiados</h1>
        <hr class="border">
    <form action="Clientes_Añadir.php" method="POST" class="formulario" name="login" >
      <div class="form-group">
        <input type="text" name="nom_user" class="usuario" placeholder="Ingrese Nombre">
      </div>

        <div class="form-group">
             <input type="text" name="ape_user" class="password" placeholder="Ingrese Apellido">
        </div>

        <div class="form-group">
              <input type="number" name="telf_user" class="usuario" placeholder="Teléfono">
        </div>

        <div class="form-group">
              <input type="number" name="dni_user" class="usuario" placeholder="Ingrese DNI">
        </div>

        <div class="form-group">
          <select type="text" class="select" name="sex_user">
            <option value="Masculino">M</option>
            <option value="Femenino">F</option>
          </select>
        </div>

        <div class="form-group">
              <input type="text" name="direc_user" class="usuario" placeholder="ingrese correo">
        </div>



      <input type="submit" value="Submit" style="padding:15px;">

    </form>
    <div class="volver">
      <a href="/proyecto/App/Administrar_Clientes.php">VOLVER</a>
    </div>

  </body>
</html>
