<?php
	class InspectorControlador
	{
		private $pdo;

		public function __CONSTRUCT()
		{
			try
			{
				$this->pdo = new PDO('mysql:host=localhost;dbname=covid', 'root', '');
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}

		public function Listar()
		{
			try
			{
				$result = array();

				$stm = $this->pdo->prepare("SELECT * FROM inspectores");
				$stm->execute();

				foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
				{
					$poli = new Inspector();

					$poli->__SET('id', $r->id);
					$poli->__SET('Nombre', $r->Nombre);
					$poli->__SET('Apellido', $r->Apellido);
					$poli->__SET('Sexo', $r->Sexo);
					$poli->__SET('Prueba', $r->Prueba);
					$poli->__SET('FechaRegistro', $r->FechaRegistro);

					$result[] = $poli;
				}

				return $result;
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}

		public function Obtener($id)
		{
			try 
			{
				$stm = $this->pdo
				          ->prepare("SELECT * FROM inspectores WHERE id = ?");
				          

				$stm->execute(array($id));
				$r = $stm->fetch(PDO::FETCH_OBJ);

				$poli = new Inspector();

				$poli->__SET('id', $r->id);
				$poli->__SET('Nombre', $r->Nombre);
				$poli->__SET('Apellido', $r->Apellido);
				$poli->__SET('Sexo', $r->Sexo);
				$poli->__SET('Prueba', $r->Prueba);
				$poli->__SET('FechaRegistro', $r->FechaRegistro);

				return $poli;
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		public function Eliminar($id)
		{
			try 
			{
				$stm = $this->pdo
				          ->prepare("DELETE FROM inspectores WHERE id = ?");			          

				$stm->execute(array($id));
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		public function Actualizar(Inspector $data)
		{
			try 
			{
				$sql = "UPDATE inspectores SET Nombre = ?, Apellido = ?, Sexo = ?, Prueba = ?, FechaRegistro = ?
					    WHERE id = ?";

				$this->pdo->prepare($sql)
				     ->execute(
					array(
						$data->__GET('Nombre'), 
						$data->__GET('Apellido'), 
						$data->__GET('Sexo'),
						$data->__GET('Prueba'),
						$data->__GET('FechaRegistro'),
						$data->__GET('id')
						)
					);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		public function Registrar(Inspector $data)
		{
			try 
			{
			$sql = "INSERT INTO inspectores (Nombre,Apellido,Sexo,Prueba,FechaRegistro) 
			        VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Nombre'), 
					$data->__GET('Apellido'), 
					$data->__GET('Sexo'),
					$data->__GET('Prueba'),
					$data->__GET('FechaRegistro')
					)
				);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}
	}
?>