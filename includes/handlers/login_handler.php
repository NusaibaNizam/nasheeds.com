<?php

if (isset($_POST['logIn'])) {
	//echo "Log In is pressed";
	$logInUserName=cleanInput2($_POST['logInUserName']);
	
	$logInPassword=strip_tags($_POST['logInPassword']);

}
?>