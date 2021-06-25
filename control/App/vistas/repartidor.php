
</br></br>

</br></br></br></br>

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
include_once "clase_pedido.php";

$pedido = new pedido();
$resultado = $pedido->MostrarPedido();

    echo "<h2 style='text-align:center; padding:10px;'>Pedidos: ".$resultado->rowCount()."</h2>";
    echo "<table class='tabla'>
            <tr class='tabla_prin'>
                <th class='tabla_cuadro'>#</th>
                <th class='tabla_cuadro'>Nombre Pedido</th>
                <th class='tabla_cuadro'>Estado Pedido</th>
                <th class='tabla_cuadro'>Precio Pedido</th>
                <th class='tabla_cuadro'>&nbsp;</th>
            </tr>";
    foreach ($resultado->fetchAll() as $k => $item) {
        echo "<tr>
                <td class='tabla_celda'>" . ($k + 1) . "</td>
                <td class='tabla_celda'>" . $item["nom_pe"] . "</td>
                <td class='tabla_celda'>" . $item["Estado_pe"] . "</td>
                <td class='tabla_celda'>" . $item["Precio_pe"] . "</td>
                <td class='tabla_celda'><form method='post' action='Actualizar_pedido.php'>
                        <input type='hidden' name='id_pe' value='".$item["id_pe"]."'>
                        <input type='submit' name='submit2' value='Cargar Destino'>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
  ?>


<center>
<iframe style="padding:10px;" src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d4673.662369470777!2d-76.23890690990766!3d-9.928467173053841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x91a7c2e210572bc5%3A0xfce73b27f4a8ef21!2sJr.%20Abtao%20903-799%2C%20Hu%C3%A1nuco%2010001!3m2!1d-9.9285886!2d-76.24107099999999!5e0!3m2!1ses-419!2spe!4v1611631863842!5m2!1ses-419!2spe" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</center>
</br></br></br></br>
