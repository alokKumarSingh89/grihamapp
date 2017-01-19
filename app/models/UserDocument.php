<?php  
	/**
	* 
	*/
	class UserDocumet extends Database
	{
		
		function __construct()
		{
			$pdo = $this->createConnection();
			$val = $pdo->query('select 1 from user_documents');
			$sql = 'CREATE TABLE user_documents(id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,document_name VARCHAR(100),document_url VARCHAR(100),users_id INT(100))';

			if($val == FALSE){
   				$pdo->exec($sql);
   				
			}
		}

		public function insert($value=[],$id="")
		{
			$pdo = $this->createConnection();
			$stmt = $pdo->prepare("select * from user_documents where document_name='".$value["document_name"]."' and users_id =".$id);
			$stmt->execute();
			$data = $stmt->fetch();
			
			if($data == FALSE){
				$stmt1 = $pdo->prepare("INSERT INTO user_documents (document_name,document_url,users_id) VALUES (:document_name,:document_url,:users_id)");
				$value["users_id"] = $id;
				$result = $stmt1->execute($value);

			}else{
				$stmt1 = $pdo->prepare("UPDATE user_documents set  document_url=:document_url where document_name='".$value["document_name"]."' and users_id =".$id);
				//print_r($value);
				$stmt1->execute(array("document_url"=>$value["document_url"]));
			}
		}

		public function getDocument($id='')
		{
			$pdo = $this->createConnection();
			$stmt = $pdo->prepare("select * from user_documents where users_id =".$id);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
		}
	}
?>