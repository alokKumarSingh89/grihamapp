<?php  
	define('DB_SERVER', '127.0.0.1');
	define('DB_USERNAME', 'alok');
	define('DB_PASSWORD', 'password');
	define('DB_DATABASE', 'grihamFle');

	/**
	* 
	*/
	class Database
	{
		protected $pdo;
		public function createConnection()
		{
			if (!$this->pdo) {
				try {
					$this->pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE,DB_USERNAME,DB_PASSWORD);
					return $this->pdo;
				} catch (PDOException $e) {
					die("Couldn't not connect".$e);
				}
			}else{
				return $this->pdo;
			}
			
		}

		public function getConnection()
		{
			return $this->pdo;
		}

	}

	
?>