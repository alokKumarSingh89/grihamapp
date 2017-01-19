<?php  

	/**
	* 
	*/
	class Controller
	{
		
		public function model($model){
			require_once '../app/models/'.$model.'.php';
			return new User();
		}

		public function view($view,$data=[]){
			require_once 'app/views/'.$view.'.php';
		}
		public function redirect($url='')
		{
			echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $url . '">';
			echo "<script type='text/javascript'>document.location.href='{$url}';</script>";

		}
	}
?>