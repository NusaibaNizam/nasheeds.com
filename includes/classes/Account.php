<?php
	/**
	 * 
	 */
	class Account
	{
		private $errorArray;
		
		public function __construct()
		{
			$this->errorArray= array();
		}

		public function register($registerUserName, $firstName, $lastName, $emailAddress, $comfirmEmail, $registerPassword, $confirmPassword)
		{
			$this->validateUserName($registerUserName);
			$this->validateFirstName($firstName);
			$this->validateLastName($lastName);
			$this->validateEmail($emailAddress,$comfirmEmail);
			$this->validatePassword($registerPassword,$confirmPassword);
			if(empty($this->errorArray)){
				//TODO:Insert to database
				return true;
			}
			else{
				return false;
			}
		}

		public function getError($error){
			if(!in_array($error, $this->errorArray)){
				$error="";
			}
			return "<span class='errorMsg'>".$error."</span>";
		}

		private function validateUserName($u)
		{
			if(strlen($u)>25 || strlen($u)<3){
				array_push($this->errorArray, Constants::$userNameLengthError);
				return;
			}
			//TODO: check if User Name already exists
		}

		private function validateFirstName($f)
		{
			if(strlen($f)>25 || strlen($f)<2){
				array_push($this->errorArray, "Your First Name should be between 25 to 2 characters");
				return;
			}
		}

		private function validateLastName($l)
		{

			if(strlen($l)>25 || strlen($l)<2){
				array_push($this->errorArray, "Your Last Name should be between 25 to 2 characters");
				return;
			}
		}

		private function validateEmail($e1,$e2)
		{
			if ($e1 != $e2) {
				array_push($this->errorArray, "The Emails don't match");
				return;	
			}
			if (!(filter_var($e1,FILTER_VALIDATE_EMAIL))) {
				array_push($this->errorArray, "The Email is not valid");
				return;	
			}
			//TODO: check if email already exists
		}

		private function validatePassword($p1,$p2)
		{
			
			if ($p1 != $p2) {
				array_push($this->errorArray, "The Passwords don't match");
				return;	
			}
			if(preg_match('/[^a-zA-Z0-9 ]/', $p1)){
				array_push($this->errorArray, "Password can only contain Numbers, Letters and Spaces");
				return;	
			}
			if(strlen($p1)>35 || strlen($p1)<8){
				array_push($this->errorArray, "Your Password should be between 8 to 35 characters");
				return;
			}
		}
	}
?>