<?php
	/**
	 * 
	 */
	class Account
	{
		private $errorArray;
		private $con;
		
		public function __construct($con)
		{
			$this->con=$con;
			$this->errorArray= array();
		}
		public function logIn($logInUserName, $logInPassword){
			$logInPassword=md5($logInPassword);
			$query=mysqli_query($this->con, "SELECT * FROM users WHERE username='".$logInUserName."' AND password='".$logInPassword."'");
			if(mysqli_num_rows($query)==1){
				return true;
			}else{

				array_push($this->errorArray, Constants::$logInError);		
				return false;
			}

		}

		public function register($registerUserName, $firstName, $lastName, $emailAddress, $comfirmEmail, $registerPassword, $confirmPassword)
		{
			$this->validateUserName($registerUserName);
			$this->validateFirstName($firstName);
			$this->validateLastName($lastName);
			$this->validateEmail($emailAddress,$comfirmEmail);
			$this->validatePassword($registerPassword,$confirmPassword);
			if(empty($this->errorArray)){
				return $this->insertToDatabase($registerUserName, $firstName, $lastName, $emailAddress, $registerPassword);
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
		private function insertToDatabase($u, $f, $l, $e1, $p1){
			$encriptedPassword=md5($p1);
			$profilePic="assets/images/profile-pics/head_emerald.png";
			$date=date("Y-m-d");
			$result=mysqli_query($this->con, "INSERT INTO users VALUES ('', '".$u."' ,'".$f."' ,'".$l."' ,'".$e1."' ,'".$encriptedPassword."' ,'".$date."' ,'".$profilePic."' )");
			return $result;

		}

		private function validateUserName($u)
		{
			if(strlen($u)>25 || strlen($u)<3){
				array_push($this->errorArray, Constants::$userNameLengthError);
				return;
			}
			$checkIfUserExists=mysqli_query($this->con, "SELECT username FROM users WHERE username='".$u."'");
			if(mysqli_num_rows($checkIfUserExists)!=0){
				array_push($this->errorArray, Constants::$userNameExists);
				return;
			}

		}

		private function validateFirstName($f)
		{
			if(strlen($f)>25 || strlen($f)<2){
				array_push($this->errorArray, Constants::$firstNameLengthError);
				return;
			}
		}

		private function validateLastName($l)
		{

			if(strlen($l)>25 || strlen($l)<2){
				array_push($this->errorArray, Constants::$lastNameLengthError);
				return;
			}
		}

		private function validateEmail($e1,$e2)
		{
			if ($e1 != $e2) {
				array_push($this->errorArray, Constants::$emailDoNotMatchError);
				return;	
			}
			if (!(filter_var($e1,FILTER_VALIDATE_EMAIL))) {
				array_push($this->errorArray, Constants::$emailNotValidError);
				return;	
			}
			$checkIfEmailExists=mysqli_query($this->con, "SELECT email FROM users WHERE email='".$e1."'");
			if(mysqli_num_rows($checkIfEmailExists)!=0){
				array_push($this->errorArray, Constants::$emailExists);
				return;
			}
		}

		private function validatePassword($p1,$p2)
		{
			
			if ($p1 != $p2) {
				array_push($this->errorArray, Constants::$passwordDoNotMatchError);
				return;	
			}
			if(preg_match('/[^a-zA-Z0-9 ]/', $p1)){
				array_push($this->errorArray, Constants::$passwordContainableError);
				return;	
			}
			if(strlen($p1)>35 || strlen($p1)<8){
				array_push($this->errorArray, Constants::$passwordLengthError);
				return;
			}
		}
	}
?>