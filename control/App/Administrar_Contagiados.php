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
include_once "clases/clase_contagiados.php";

$contagiados = new contagiados();
$resultado = $contagiados->MostrarContagiados();

    echo "<h2>numero de resultados: ".$resultado->rowCount()."</h2>";
    echo "<table class='tabla'>
            <tr class='tabla_prin'>
                <th class='tabla_cuadro'>#</th>
                <th class='tabla_cuadro'>Nombre Cliente</th>
                <th class='tabla_cuadro'>Apellido Cliente</th>
                <th class='tabla_cuadro'>Telefono</th>
                <th class='tabla_cuadro'>DNI</th>
                <th class='tabla_cuadro'>Sexo</th>
                <th class='tabla_cuadro'>Dirección</th>
                <th class='tabla_cuadro'>&nbsp;</th>
                <th class='tabla_cuadro'>&nbsp;</th>
                <th class='tabla_cuadro'>&nbsp;</th>
            </tr>";
    foreach ($resultado->fetchAll() as $k => $item) {
        echo "<tr>
                <td class='tabla_celda'>" . ($k + 1) . "</td>
                <td class='tabla_celda'>" . $item["nom_user"] . "</td>
                <td class='tabla_celda'>" . $item["ape_user"] . "</td>
                <td class='tabla_celda'>" . $item["telf_user"] . "</td>
                <td class='tabla_celda'>" . $item["dni_user"] . "</td>
                <td class='tabla_celda'>" . $item["sex_user"] . "</td>
                <td class='tabla_celda'>" . $item["direc_user"] . "</td>
                <td class='tabla_celda'><form method='post' action='clases/Contagiados_Añadir.php'>
                        <input type='submit' name='submit' value='Añadir'>
                    </form>
                </td>
                <td class='tabla_celda'><form method='post' action='Eliminar_Contagiados.php'>
                        <input type='hidden' name='id_cli' value='".$item["id_cli"]."'>
                        <input type='submit' name='submit' value='Eliminar'>
                    </form>
                </td>
                <td class='tabla_celda'><form method='post' action='Actualizar_Contagiados.php'>
                        <input type='hidden' name='id_cli' value='".$item["id_cli"]."'>
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
