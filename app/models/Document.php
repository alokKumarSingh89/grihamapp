<?php  
	/**
	* 
	*/
	class Document extends Database
	{
		
		protected $bonus = "bonus";
		protected $reward = "reward";
		protected $service = "service";
		protected $incentive = "incentive";
		protected $service_type = "service_type";
		protected $gift_for_you = "gift_for_you";
		protected $mrp = "mrp";
		protected $document = "document";
		protected $document_type = "document_type";
		protected $joining_amount = "joining_amount";
		protected $doc_type = "doc_type";

		function __construct()
		{
			$pdo = $this->createConnection();
			$val = $pdo->query('select 1 from documents');
			$sql = 'CREATE TABLE documents(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,bonus VARCHAR(100),reward VARCHAR(100),service VARCHAR(100),incentive VARCHAR(100),service_type VARCHAR(100),gift_for_you VARCHAR(100),mrp VARCHAR(100),document VARCHAR(100),document_type VARCHAR(100),joining_amount VARCHAR(100),doc_type VARCHAR(50) NOT NULL)';

			if($val == FALSE){
   				$pdo->exec($sql);
			}
		}
		public function get_Document($type='',$list=[])
		{
			$pdo = $this->getConnection();
			$data = "";
			$index = 0;
			foreach ($list as $key => $value) {
				if (++$index == count($list)) {
					$data .=$value;
				} else {
					$data .=$value.",";
				}
				
			}
			//echo $data;
			$data = empty($data)?"*":$data;
			$sth = $pdo->prepare("SELECT ".$data." FROM documents where doc_type='".$type."'");
			$sth->execute();
			//print_r($sth);
			/* Fetch all of the remaining rows in the result set */
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);
			//print_r($result);
			return $result;
		}
		public function fetchAllDoc()
		{
			$pdo = $this->getConnection();
			$sth = $pdo->prepare("SELECT * FROM documents");
			$sth->execute();
			$result = $sth->fetchAll();
			return $result;
		}
		public function set_Document($data=[],$type='')
		{
			$pdo = $this->getConnection();
			$stmt = $pdo->prepare("INSERT INTO documents(bonus,reward,service,incentive,service_type,gift_for_you,mrp,document,document_type,joining_amount,doc_type) VALUES (:bonus,:reward,:service,:incentive,:service_type,:gift_for_you,:mrp,:document,:document_type,:joining_amount,:doc_type)");

				$document = array("doc_type" => $type);

				$document["bonus"] = isset($data["bonus"])?$data["bonus"]:"";
				$document["reward"] = isset($data["reward"])?$data["reward"]:"";
				$document["service"] = isset($data["service"])?$data["service"]:"";
				$document["incentive"] = isset($data["incentive"])?$data["incentive"]:"";
				$document["service_type"] = isset($data["service_type"])?$data["service_type"]:"";
				$document["gift_for_you"] = isset($data["gift_for_you"])?$data["gift_for_you"]:"";
				$document["mrp"] = isset($data["mrp"])?$data["mrp"]:"";
				$document["document"] = isset($data["document"])?$data["document"]:"";
				$document["document_type"] = isset($data["document_type"])?$data["document_type"]:"";
				$document["joining_amount"] = isset($data["joining_amount"])?$data["joining_amount"]:"";
				$stmt->execute($document);
				return $pdo->lastInsertId();

		}

		public function update_Document($data='',$type='')
		{
			$sql = "UPDATE documents SET bonus= :bonus,reward= :reward,service= :service,incentive= :incentive, service_type=:service_type,gift_for_you= :gift_for_you,mrp=:mrp,document=:document,document_type=:document_type,joining_amount=:joining_amount WHERE id=".$data['id'];
			
			$pdo = $this->getConnection();
			$stmt = $pdo->prepare($sql);
			$document = array();
			$document["bonus"] = isset($data["bonus"])?$data["bonus"]:"";
			$document["reward"] = isset($data["reward"])?$data["reward"]:"";
			$document["service"] = isset($data["service"])?$data["service"]:"";
			$document["incentive"] = isset($data["incentive"])?$data["incentive"]:"";
			$document["service_type"] = isset($data["service_type"])?$data["service_type"]:"";
			$document["gift_for_you"] = isset($data["gift_for_you"])?$data["gift_for_you"]:"";
			$document["mrp"] = isset($data["mrp"])?$data["mrp"]:"";
			$document["document"] = isset($data["document"])?$data["document"]:"";
			$document["document_type"] = isset($data["document_type"])?$data["document_type"]:"";
			$document["joining_amount"] = isset($data["joining_amount"])?$data["joining_amount"]:"";
			$stmt->execute($document);
			
			return $data;
		}
	}
?>