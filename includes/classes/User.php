<?php
class User
	{
		private $userName;
		private $con;
		
		public function __construct($con, $userName)
		{
			$this->con=$con;
			$this->userName=$userName;
		}
		 
	}
?>