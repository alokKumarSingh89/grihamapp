<?php  
	/**
	* 
	*/
	class App 
	{
		
		protected $controller = 'home';
		protected $method = 'index';
		protected $params = [];
		function __construct()
		{
			
			$url = $this->parseUrl();
			if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
			    // last request was more than 30 minutes ago
			    session_unset();     // unset $_SESSION variable for the run-time 
			    session_destroy();   // destroy session data in storage
			    $_SESSION["domain"] = "/fleSale";
			    $url = $_SESSION["domain"]."/?/pages/login";
			    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $url . '">';
				echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
			    //header("Location: ");
			}
			$_SESSION['LAST_ACTIVITY'] = time();
			if (isset($_SESSION['user'])) {
				if ($url[0] != "session") {
					if (isset($_SESSION['user']) && $_SESSION['user']["role"] == "1") {
						$this->controller = "admin";
					} else if(isset($_SESSION['user']) && $_SESSION['user']["role"] == "0"){
						$this->controller = "user";
					}
				}else{
					$this->controller = "session";
				}
			}else{
				if(isset($url[0]) && file_exists('app/controllers/'.$url[0].'.php')) {
					if ($url[0] != "session") {
						$this->controller = 'home';
					}else{
						$this->controller = "session";
					}
				}
			}
			if (isset($url[0])) {
				unset($url[0]);	
			}
			//echo $this->controller;
			//print_r($_SESSION);
			require_once 'app/controllers/'.$this->controller.'.php';
			$this->controller = new $this->controller;
			if (isset($url[1])) {
				$methods = str_replace("-","",$url[1]);
				if (method_exists($this->controller, $methods)) {
					$this->method = $methods;
					unset($url[1]);	
				}
			}
			
			$this->params = $url ? array_values($url):[];
			
			call_user_func_array([$this->controller,$this->method], $this->params);
		}

		public function parseUrl(){
			$uri = isset($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:'';
			//print_r($_SERVER);
			if (isset($uri)) {
				$url = explode('/',filter_var(ltrim(rtrim($uri,'/'),'/'),FILTER_SANITIZE_URL));
				return $url;
			}
		}
	}
?>