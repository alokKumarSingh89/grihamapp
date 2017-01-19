<?php  
	/**
	* 
	*/
	class Validation
	{
		
		public function textValidation($value='')
		{
			echo $value;
		}
		public function blankValidation($value='')
		{
			if (empty($value)) {
				return true;
			}

			return false;
		}
		public function lengthValidation($value='',$length=0)
		{
			if (empty($value)) {
				return true;
			}

			return false;
		}
	}
?>