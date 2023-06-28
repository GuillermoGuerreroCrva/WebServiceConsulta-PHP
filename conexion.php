<?php

	class Conexion extends PDO 
	{
		private $hostBd = '187.160.239.37';
		private $nombreBd = 'feria';
		private $usuarioBd = 'postgres';
		private $passwordBd = 'Eisa2022.'; 

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