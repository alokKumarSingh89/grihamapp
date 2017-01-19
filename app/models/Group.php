<?php  
	
	/**
	* 
	*/
	class Group extends Database
	{
		
		function __construct()
		{
			$pdo = $this->createConnection();
			$val = $pdo->query('select 1 from groups');
			$this->pdo = $pdo;

			$sql = 'CREATE TABLE groups (id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					name VARCHAR(100),status VARCHAR(100),number_of_user int(30) NOT NULL DEFAULT 0,max_count int(30) NOT NULL DEFAULT 9)';

			if($val == FALSE){
				echo "string";
				$pdo->exec($sql);
			}
		}
		public function create($value=[])
		{
			$pdo = $this->createConnection();
			$stmt = $pdo->prepare('select * from groups');
			$stmt->execute();
			$result = $stmt->fetchAll();
			$result = ($result == FALSE)? 0:$result;
			$groups = [];
			$stmt2= $pdo->prepare("INSERT INTO groups (name,number_of_user) VALUES (:name,:number_of_user)");
			$groups["name"] = "GRIHAMFLE".count($result);
			$groups["number_of_user"] = 1;
			$stmt2->execute($groups);
			return $pdo->lastInsertId();
		}

		public function getAvailableGroup()
		{
			$pdo = $this->createConnection();
			$stmt = $pdo->prepare("select * from groups where number_of_user < 9");
			$stmt->execute();
			$result = $stmt->fetch();
			return $result;
			
		}
		public function update($data=[])
		{
			$pdo = $this->createConnection();
			$sql = "UPDATE groups SET number_of_user = :number_of_user WHERE id=".$data['id'];
			$groups = [];
			$stmt = $pdo->prepare($sql);
			$groups["number_of_user"] = $data["number_of_user"];
			//echo $groups["number_of_user"];
			$stmt->execute($groups);
		}

		public function findGroup($data='')
		{
			$pdo = $this->createConnection();
			$stmt = $pdo->prepare("select * from groups where id = ".$data);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
		}
		public function findOtherGroup($data='')
		{
			$pdo = $this->createConnection();
			$stmt = $pdo->prepare("select * from groups where id <> ".$data);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
		}

		public function findAll()
		{
			$pdo = $this->createConnection();
			$stmt = $pdo->prepare("select * from groups ");
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
		}

	}
?>