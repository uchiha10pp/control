<?php

  session_start();

  require 'database.php';
  include_once 'includes/header.php';



  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, usuario, password, email, nombre, apellidos, DNI, telefono, sexo, cargo FROM usuarioss WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if ($results > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="imagen/icon3.png">
        <!--CDN CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" 
        crossorigin="anonymous" />
        <!--CDN CSS-->
        <link rel="preload" href="css/normalize.css" as="style">
        <link rel="stylesheet" href="css/normalize.css">
        <!--fonts letras-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&display=swap" rel="stylesheet">
        <title>Control</title>
  	<link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="includes/css/estilos2.css">

  	<script type="text/javascript" src="js/script.js"></script>
    <script src="includes/js/jquery-3.1.0.min.js"></script>
    <script src="includes/js/main.js"></script>
  </head>
  <body>


    <?php if(!empty($user)): ?>
      <a href="logout.php" style="float: right; padding: 10px; position: fixed;">
        Logout</p>
      </a>
      <br><p align="center"> Bienvenido, <?= $user['nombre']." ". $user['apellidos']." de cargo ". $user['cargo'] ; ?>


      <?php
      if($user['cargo']=="administrador")
        include_once 'App/vistas/administrador.php';


      if($user['cargo']=="repartidor")
        include_once 'App/vistas/repartidor.php';
    ?>


      <div class="slideshow">
    <ul class="slider">
      <li>
        <img src="includes/img/1.jpg" alt="">
        <section class="caption">
          <h1>Control</h1>
        </section>
      </li>
      <li>
        <img src="includes/img/2.jpg" alt="">
        <section class="caption">
          <h1>Registro</h1>
        </section>
      </li>
      <li>
        <img src="includes/img/3.jpg" alt="">
        <section class="caption">
          <h1>Servicios</h1>
        </section>
      </li>

    </ul>

    <ol class="pagination">

    </ol>

    <div class="left">
      <span class="fa fa-chevron-left"></span>
    </div>

    <div class="right">
      <span class="fa fa-chevron-right"></span>
    </div>

  </div>




    <?php else: ?>


    <?php if(!empty($message)): ?>
      <a href="logout.php">
        salir</p>
      </a>
      <p> <?= $message ?></p>
    <?php endif; ?>
<div class="contenedor">
        <h1 class="titulo">Iniciar sesion</h1>
        <hr class="border">
            <span><a href="signup.php"></a></span>

            <form action="login.php" method="POST" class="formulario">
              <div class="form-group">
              <input type="text" name="usuario" class="usuario" placeholder="ingrese usuario">
            </div>
             <div class="form-group">
              <input type="password" name="password" class="password" placeholder="ingrese contraseña">
            </div>
              <input type="submit" value="Submit" style="padding:15px;">
            </form>

            <h3 class="titulo"> ¿No tienes una cuenta? <br><a href="signup.php">Registrate</a></h3>
            <?php endif; ?>

</div>
  </body>

  <?php include_once 'includes/footer.php'; ?>
</html>
