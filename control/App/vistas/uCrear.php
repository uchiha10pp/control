<?php
    declare(strict_types=1);
    use App\Controladores\ControladorUsuario;
    include_once "includes/autoload.php";
?>
<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
    <input type="text" name="nombre_user" placeholder="Ingrese nombre de usuario"><br>
    <input type="password" name="pass_user" placeholder="Ingrese Contraseña"><br>
    <input type="text" name="nombres" placeholder="Ingrese nombres"><br>
    <input type="text" name="apellidos" placeholder="Ingrese apellidos"><br>
    <input type="number" name="telefono" placeholder="Ingrese telefono"><br>
    <input type="number" name="DNI" placeholder="Ingrese DNI"><br>
    <select name="sexo">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select><br>
    <select name="cargo">
        <option value="Administrador">Administrador</option>
        <option value="Repartidor">Repartidor</option>
    </select><br>
    <input type="submit" name="submit" value="Guardar">
</form>
<?php
if(isset($_POST["submit"])){
    if(!empty($_POST["nombre_user"]) && !empty($_POST["pass_user"]) && !empty($_POST["nombres"]) &&
       !empty($_POST["apellidos"]) && !empty($_POST["telefono"]) && !empty($_POST["DNI"]) &&
       !empty($_POST["sexo"]) && !empty($_POST["cargo"])){
         $user_name = $_POST["nombre_user"];
         $user_pass = $_POST["pass_user"];
         $nombres = $_POST["nombres"];
         $apellidos = $_POST["apellidos"];
         $telefono = (int)$_POST["telefono"];
         $dni = (int)$_POST["DNI"];
         $sexo = $_POST["sexo"];
         $cargo = $_POST["cargo"];
         $estado = 1;

         $controladorUsuario = new ControladorUsuario();
         echo $controladorUsuario->crearUsuario($user_name, $user_pass, $nombres, $apellidos, $telefono, $dni, $sexo, $cargo, $estado);
    }
    else{
      echo "Rellene todos los campos.";
    }
}
