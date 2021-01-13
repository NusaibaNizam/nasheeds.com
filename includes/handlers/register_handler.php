<?php
function cleanInput2($inputT){
	$inputT=strip_tags($inputT);
	$inputT=str_replace(" ", "", $inputT);
	return $inputT;
}

if (isset($_POST['SignUp'])) {
	//echo "Sign Up is pressed";
	$registerUserName=cleanInput2($_POST['registerUserName']);


	$firstName=cleanInput2($_POST['firstName']);
	$firstName=ucfirst(strtolower($firstName));

	$lastName=cleanInput2($_POST['lastName']);
	$lastName=ucfirst(strtolower($lastName));
	
	$emailAddress=cleanInput2($_POST['emailAddress']);
	
	$comfirmEmail=cleanInput2($_POST['comfirmEmail']);
	
	$registerPassword=strip_tags($_POST['registerPassword']);
	
	$confirmPassword=strip_tags($_POST['confirmPassword']);
	
	$registerSuccess=$account->register($registerUserName, $firstName, $lastName, $emailAddress, $comfirmEmail, $registerPassword, $confirmPassword);
	if($registerSuccess){
		header("Location: index.php");
	}

}

?>
