<?php
	class Personales
	{
		private $id;
		private $Nombre;
		private $Apellido;
		private $Sexo;
		private $FechaNacimiento;
		private $Prueba;
		private $FechaRegistro;

		public function __GET($k){ return $this->$k; }
		public function __SET($k, $v){ return $this->$k = $v; }
	}
?>