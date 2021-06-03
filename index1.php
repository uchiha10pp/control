<?php

require_once 'Inspector.php';
require_once 'InspectorControlador.php';


// Logica


$poli = new Inspector();
$model = new InspectorControlador();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$poli->__SET('id', $_REQUEST['id']);
			$poli->__SET('Nombre', $_REQUEST['Nombre']);
			$poli->__SET('Apellido', $_REQUEST['Apellido']);
			$poli->__SET('Sexo', $_REQUEST['Sexo']);
            $poli->__SET('Prueba', $_REQUEST['Prueba']);
            $poli->__SET('FechaRegistro', $_REQUEST['FechaRegistro']);

			$model->Actualizar($poli);
			header('Location: index1.php');
			break;

		case 'registrar':
			$poli->__SET('Nombre', $_REQUEST['Nombre']);
			$poli->__SET('Apellido', $_REQUEST['Apellido']);
			$poli->__SET('Sexo', $_REQUEST['Sexo']);
            $poli->__SET('Prueba', $_REQUEST['Prueba']);
            $poli->__SET('FechaRegistro', $_REQUEST['FechaRegistro']);

			$model->Registrar($poli);
			header('Location: index1.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['id']);
			header('Location: index1.php');
			break;

		case 'editar':
			$poli = $model->Obtener($_REQUEST['id']);
			break;
	}
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>control</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <link rel="icon" href="imagen/icon3.png">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                <header style="width:500px; font-size: 50px; text-align: center; text-transform: uppercase;">Policia</header>

                <form action="?action=<?php echo $poli->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="id" value="<?php echo $poli->__GET('id'); ?>" />
                    
                    <table style="width:500px;">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" name="Nombre" value="<?php echo $poli->__GET('Nombre'); ?>" required ="" style="width:100%;" /></td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left;">Apellido</th>
                            <td><input type="text" name="Apellido" value="<?php echo $poli->__GET('Apellido'); ?>" required ="" style="width:100%;" /></td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left;">Sexo</th>
                            <td>
                                <select name="Sexo" style="width:100%;">
                                    <option value="1" <?php echo $poli->__GET('Sexo') == 1 ? 'selected' : ''; ?>>MASCULINO</option>
                                    <option value="2" <?php echo $poli->__GET('Sexo') == 2 ? 'selected' : ''; ?>>FEMENINO</option>
                                </select>
                            </td>
                        </tr>                       
                        
                        <tr>
                            <th style="text-align:left;">Prueba</th>
                            <td>
                                <select name="Prueba" style="width:100%;">
                                    <option value="1" <?php echo $poli->__GET('Prueba') == 1 ? 'selected' : ''; ?>>POSITIVO</option>
                                    <option value="2" <?php echo $poli->__GET('Prueba') == 2 ? 'selected' : ''; ?>>NEGATIVO</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th style="text-align:left;">Registro</th>
                            <td><input type="text" name="FechaRegistro" value="<?php echo $poli->__GET('FechaRegistro'); ?>" required ="" style="width:100%;" /></td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Apellido</th>
                            <th style="text-align:left;">Sexo</th>
                            <th style="text-align:left;">Prueba</th>
                            <th style="text-align:left;">Registro</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo strtoupper($r->__GET('Nombre')); ?></td>
                            <td><?php echo strtoupper($r->__GET('Apellido')); ?></td>
                            <td><?php echo strtoupper($r->__GET('Sexo')) == 1 ? 'H' : 'F'; ?></td>
                            <td><?php echo strtoupper($r->__GET('Prueba')) == 1 ? 'P' : 'N'; ?></td>
                            <td><?php echo $r->__GET('FechaRegistro'); ?></td>
                            <td>
                                <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>