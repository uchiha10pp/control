<?php

  require 'database.php';

  $message = '';

  if(!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['DNI']) && !empty($_POST['telefono']) && !empty($_POST['sexo']) && !empty($_POST['cargo'])){
    if($_POST['password']==$_POST['confirm_password']){
      if (!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['DNI']) && !empty($_POST['telefono']) && !empty($_POST['sexo']) && !empty($_POST['cargo'])) {
        $sql = "INSERT INTO usuarioss (usuario, password, email, nombre, apellidos, DNI, telefono, sexo, cargo) VALUES (:usuario, :password, :email, :nombre, :apellidos, :DNI, :telefono, :sexo, :cargo)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':usuario', $_POST['usuario']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':nombre', $_POST['nombre']);
        $stmt->bindParam(':apellidos', $_POST['apellidos']);
        $stmt->bindParam(':DNI', $_POST['DNI']);
        $stmt->bindParam(':telefono', $_POST['telefono']);
        $stmt->bindParam(':sexo', $_POST['sexo']);
        $stmt->bindParam(':cargo', $_POST['cargo']);


        if ($stmt->execute()) {
          $message = 'se ha registrado con exito';
        } else {
          $message = 'lo sentimos, hay un problema';
        }
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
  </head>
  <body>


    <?php if(!empty($message)): ?>
      <p align="center"> <?= $message ?></p>
    <?php endif; ?>


<div class="contenedor">
        <h1 class="titulo">Registrate</h1>
        <hr class="border">
    <form action="signup.php" method="POST" class="formulario" name="login" >
          <div class="form-group">
                   <input type="text" name="usuario" class="usuario" placeholder="ingrese nombre">
            </div>

            <div class="form-group">
                   <input type="password" name="password" class="password" placeholder="Enter your Password">
             </div>

             <div class="form-group">
                   <input type="password" name="confirm_password" class="password" placeholder="Confirm Password">
              </div>

              <div class="form-group">
                    <input type="text" name="email" class="usuario" placeholder="ingrese correo">
              </div>

              <div class="form-group">
                    <input type="text" name="nombre" class="usuario" placeholder="ingrese nombre">
              </div>

              <div class="form-group">
                    <input type="text" name="apellidos" class="usuario" placeholder="ingrese apellidos">
              </div>

              <div class="form-group">
                   <input type="number" name="DNI" class="number" placeholder="ingrese numero de DNI">
              </div>

              <div class="form-group">
                    <input type="number" name="telefono" class="number" placeholder="ingrese numero de telefono">
              </div>
              <div class="form-group">
                <select type="text" class="select" name="sexo">
                  <option>Masculino</option>
                  <option>Femenino</option>
                </select>
              </div>
              <div class="form-group">
                <select type="text" class="select"  name="cargo">
                  <option>administrador</option>
                  <option>repartidor</option>
                </select>
            </div>

      <input type="submit" value="Submit" style="padding:15px;">

    </form>
 <h2 class="titulo"> ¿ya te registraste? <br><a href="login.php">Login</a></h2>
  </body>
</html>
