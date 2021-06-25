<?php
	class PersonalesControlador
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

				$stm = $this->pdo->prepare("SELECT * FROM personales");
				$stm->execute();

				foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
				{
					$per = new Personales();

					$per->__SET('id', $r->id);
					$per->__SET('Nombre', $r->Nombre);
					$per->__SET('Apellido', $r->Apellido);
					$per->__SET('Sexo', $r->Sexo);
					$per->__SET('FechaNacimiento', $r->FechaNacimiento);
					$per->__SET('Prueba', $r->Prueba);
					$per->__SET('FechaRegistro', $r->FechaRegistro);
					$per->__SET('dni', $r->dni);

					$result[] = $per;
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
				          ->prepare("SELECT * FROM personales WHERE id = ?");
				          

				$stm->execute(array($id));
				$r = $stm->fetch(PDO::FETCH_OBJ);

				$per = new Personales();

				$per->__SET('id', $r->id);
				$per->__SET('Nombre', $r->Nombre);
				$per->__SET('Apellido', $r->Apellido);
				$per->__SET('Sexo', $r->Sexo);
				$per->__SET('FechaNacimiento', $r->FechaNacimiento);
				$per->__SET('Prueba', $r->Prueba);
				$per->__SET('FechaRegistro', $r->FechaRegistro);
				$per->__SET('dni', $r->dni);


				return $per;
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
				          ->prepare("DELETE FROM personales WHERE id = ?");			          

				$stm->execute(array($id));
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		public function Actualizar(Personales $data)
		{
			try 
			{
				$sql = "UPDATE personales SET Nombre = ?, Apellido = ?, Sexo = ?, FechaNacimiento = ?, Prueba = ?, FechaRegistro = ?, dni = ?
					    WHERE id = ?";

				$this->pdo->prepare($sql)
				     ->execute(
					array(
						$data->__GET('Nombre'), 
						$data->__GET('Apellido'), 
						$data->__GET('Sexo'),
						$data->__GET('FechaNacimiento'),
						$data->__GET('Prueba'),
						$data->__GET('FechaRegistro'),
						$data->__GET('dni'),
						$data->__GET('id')
						)
					);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		public function Registrar(Personales $data)
		{
			try 
			{
			$sql = "INSERT INTO personales (Nombre,Apellido,Sexo,FechaNacimiento,Prueba,FechaRegistro, dni) 
			        VALUES (?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Nombre'), 
					$data->__GET('Apellido'), 
					$data->__GET('Sexo'),
					$data->__GET('FechaNacimiento'),
					$data->__GET('Prueba'),
					$data->__GET('FechaRegistro'),
					$data->__GET('dni')

					)
				);
			} catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}
	}
?>