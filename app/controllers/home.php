<?php  
	/**
	* 
	*/
	class Home extends Controller
	{
		
		public function index($name='')
		{
			$this->view('public/index');
		}
		public function howitwork($name='')
		{
			$document = new Document;
			$this->view('public/howitwork',$document->fetchAllDoc());
		}
		public function aboutus($name='')
		{
			$this->view('public/about-us');
		}
		public function login($name='')
		{
			$this->view('public/login');
		}
		public function registration($name='')
		{
			$this->view('public/registration');
		}
	}
?>