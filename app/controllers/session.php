<?php 
	/**
	* 
	*/
	
	class Session extends Controller
	{
		
		protected $domain = "/fleSale";
		public function create()
		{
			$user = new Users;
			$result = $user->checkUser(array("email"=>$_POST["email"],"mobile"=>$_POST["mobile"]));
			$url = "";
			//print_r(count($result));
			if (count($result) == 0) {
				$result2 = $user->createUser($_POST);
				if ($result2["status"] == "Fail") {
					$_SESSION["Error"] = "Something wrong";
					$url = $this->domain."/?/pages/registration";
				} else {
					unset($_SESSION["Error"]);
					$_SESSION["user"] = $result2["result"][0];
					//print_r($result2["result"]);
					$_SESSION["Success"] = "You successfully register.Thank you";
					$url = $this->domain.'/?/user';
				}
				
			} else {
				$_SESSION["Error"] = "Email id or mobile already exit.Please provide different";
				$url =$this->domain."/?/pages/registration";
			}
			$this->redirect($url);
		}
		public function login()
		{
			$user = new Users;
			$result = $user->getUser($_POST);
			$url = "";
			if ($result["status"] == "Autherized") {
				$_SESSION["user"] = $result["result"];
				if ($_SESSION["user"]["role"] == "1") {
					$url = $this->domain."/?/admin";
				} else {
					$url = $this->domain."/?/user";
				}
			}else {
				$_SESSION["Error"] = "Please Provide correct username and password";
				$url = $this->domain."/?/pages/login";
			}

			$this->redirect($url);
		}
		public function log_out($value='')
		{
			unset($_SESSION["user"]);
			$url = "";
			$url = $this->domain."/?";
			$this->redirect($url);
		}

	}
?>