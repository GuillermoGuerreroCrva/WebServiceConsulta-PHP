<?php

	class Conexion extends PDO 
	{
		private $hostBd = '';
		private $nombreBd = '';
		private $usuarioBd = '';
		private $passwordBd = ''; 

		public function __construct () 
		{
			try {
				parent::__construct('pgsql:host=' . $this->hostBd . ';dbname=' . $this->nombreBd . ';', $this->usuarioBd, $this->passwordBd, array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			} catch (PDOException $e) {
				echo 'Error: ' . $e->getMessage();
				exit;
			}
		}
	}

?>