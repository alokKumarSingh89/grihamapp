<?php  
	/**
	* 
	*/
	class Users extends Database
	{
		
		protected $pdo;
		function __construct()
		{
			$pdo = $this->createConnection();
			$val = $pdo->query('select 1 from users');
			$this->pdo = $pdo;

			$sql = 'CREATE TABLE users (id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					firstName VARCHAR(30) NOT NULL,lastName VARCHAR(30) NOT NULL,
					email VARCHAR(30) NOT NULL,mobile VARCHAR(100) NOT NULL,gender VARCHAR(5) NOT NULL,
					password VARCHAR(100) NOT NULL,address VARCHAR(100) NOT NULL,status VARCHAR(10) NOT NULL DEFAULT "INACTIVE",pement_status VARCHAR(10) NOT NULL DEFAULT "INACTIVE",role INT(1) NOT NULL DEFAULT 0,pement_amount INT(100) NOT NULL DEFAULT 0,total_sales INT(100) NOT NULL DEFAULT 0,new_sale INT(100) NOT NULL DEFAULT 0,level_income INT(100) NOT NULL DEFAULT 0,joining_date date ,group_id VARCHAR(100) DEFAULT 0, profile_img VARCHAR(100) DEFAULT "public/images/default.png", award VARCHAR(100) DEFAULT 0)';

			if($val == FALSE){
				$pdo->exec($sql);
			}

		}
		public function getEncriptPassword($value='')
		{
			return crypt($value, '$1$alokSingh$');
		}

		public function createUser($value=[])
		{
			$stmt = $this->pdo->prepare("INSERT INTO users (firstName,lastName, email,mobile,gender, password, address,joining_date) VALUES (:firstName,:lastName,:email,:mobile,:gender,:password,:address,
				:joining_date)");

			$encypassword = $this->getEncriptPassword($value['password']);
			$value["password"]=$encypassword;
			$value["joining_date"]=date ("Y-m-d H:i:s");
			$result = $stmt->execute($value);
			//print_r(array("result"=>gettype($result)));
			if (!$result) {
				return array("status"=>"Fail");
			} else {
				return array("status"=>"Success","result"=>$this->getUserList(array("email"=>$value["email"])));
			}
			
			
		}
		public function getUser($value=[])
		{
			$encypassword = $this->getEncriptPassword($value['password']);
			//$value["password"]=$encypassword;
			//print_r($value);
			$stmt = $this->pdo->prepare("select * from users where email='".$value['email']."'");
			$stmt->execute();
			$result = $stmt->fetch();
			//print_r($result);
			
			if ($result["password"] == $encypassword) {
				return array("status"=>"Autherized","result"=>$result);
			} else {
				return array("status"=>"NotAutherized");  
			}
			
		}

		public function getUserList($data=[])
		{
			$condition = "";
			$index = 0;
			foreach ($data as $key => $value) {
				if (++$index === count($data)) {
					$condition .= $key."='".$value."'";
				} else {
					$condition .= $key."='".$value."' and ";
				}
				
				
			}
			$stmt = $this->pdo->prepare("select * from users where ".$condition);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
		}

		public function update($data=[],$id="")
		{
			$pdo = $this->createConnection();
			$query = "";
			$data_index = 0;
			foreach ($data as $key => $value) {
				if(++$data_index == count($data)){
					$query .=$key." = :".$key;
				}else{
					$query .=$key." = :".$key.",";
				}
			}
			$sql = "UPDATE users SET ".$query." WHERE id=".$id;
			$stmt = $pdo->prepare($sql);
			$stmt->execute($data);
			return $stmt->fetchAll();
		}

		public function checkUser($data=[])
		{
			$condition = "";
			$index = 0;
			foreach ($data as $key => $value) {
				if (++$index === count($data)) {
					$condition .= $key."='".$value."'";
				} else {
					$condition .= $key."='".$value."' or ";
				}
				
				
			}
			$stmt = $this->pdo->prepare("select * from users where ".$condition);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
		}
		public function getMe($value='')
		{
			$stmt = $this->pdo->prepare("select * from users where id=".$value);
			$stmt->execute();
			$result = $stmt->fetch();
			return $result;
		}
	}
?>