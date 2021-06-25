<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      body{
        background: #181D35;
        font-family: sans-serif;
      }
      .tabla{
        background: #511058;
        color: #fff;
        margin: auto;
      }
      .tabla_cuadro{
        padding: 20px;
      }
      .tabla_celda{
        padding: 10px;
        background: #901169;
      }
      .volver{
        padding: 20px;
        width: 80px;
        background: #901169;
        margin: auto;
        margin-top: 10px;
        text-align: center;
      }
      a{
        color: #fff;
        font-family: sans-serif;
        text-decoration: none;
      }
      h2{
        color: #fff;
        font-family: sans-serif;
      }
    </style>
  </head>
  <body>
  </body>
</html>
<?php
include_once "clases/Administrador.php";

$administrador = new Administrador();
$resultado = $administrador->mostrar();

    echo "<h2>numero de resultados: ".$resultado->rowCount()."</h2>";
    echo "<table class='tabla'>
            <tr class='tabla_prin'>
                <th class='tabla_cuadro'>#</th>
                <th class='tabla_cuadro'>Usuario</th>
                <th class='tabla_cuadro'>Nombre</th>
                <th class='tabla_cuadro'>Apellidos</th>
                <th class='tabla_cuadro'>Email</th>
                <th class='tabla_cuadro'>DNI</th>
                <th class='tabla_cuadro'>telefono</th>
                <th class='tabla_cuadro'>Sexo</th>
                <th class='tabla_cuadro'>Cargo</th>
                <th class='tabla_cuadro'>Estado</th>
                <th class='tabla_cuadro'>&nbsp;</th>
                <th class='tabla_cuadro'>&nbsp;</th>
            </tr>";
    foreach ($resultado->fetchAll() as $k => $item) {
        echo "<tr>
                <td class='tabla_celda'>" . ($k + 1) . "</td>
                <td class='tabla_celda'>" . $item["usuario"] . "</td>
                <td class='tabla_celda'>" . $item["nombre"] . "</td>
                <td class='tabla_celda'>" . $item["apellidos"] . "</td>
                <td class='tabla_celda'>" . $item["email"] . "</td>
                <td class='tabla_celda'>" . $item["DNI"] . "</td>
                <td class='tabla_celda'>" . $item["telefono"] . "</td>
                <td class='tabla_celda'>" . $item["sexo"] . "</td>
                <td class='tabla_celda'>" . $item["cargo"] . "</td>
                <td class='tabla_celda'>" . $item["estado"] . "</td>
                <td class='tabla_celda'><form method='post' action='Eliminar_Usuario.php'>
                        <input type='hidden' name='id' value='".$item["id"]."'>
                        <input type='submit' name='submit' value='Eliminar'>
                    </form>
                </td>
                <td class='tabla_celda'><form method='post' action='Actualizar_usuario.php'>
                        <input type='hidden' name='id' value='".$item["id"]."'>
                        <input type='submit' name='submit2' value='Actualizar'>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
  ?>
  <div class="volver">
    <a href="/proyecto/index.php">VOLVER</a>
  </div>
