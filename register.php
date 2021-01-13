<?php
	

	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account=new Account();
	
	include("includes/handlers/register_handler.php");
	include("includes/handlers/login_handler.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>
</head>
<body>
	<div id="inputFormDiv">
		<form id="logInForm" action="register.php" method="POST">
			<h2>Log In!</h2>
			<p>
				<label for="logInUserName">User Name</label>
				<input type="text" name="logInUserName" id="logInUserName" placeholder="e.g. Mark Zukabarg" required>
			</p>
			<p>
				<label for="logInPassword">Password</label>
				<input type="password" name="logInPassword" id="logInPassword" required>
			</p>
			<p>
				<input type="submit" name="logIn" id="logIn" value="Log In">
			</p>
		</form>
		<form id="registerForm" action="register.php" method="POST">
			<h2>Sign Up!</h2>
			<p>
				<?php echo $account->getError(Constants::$userNameLengthError);?>
				<label for="registerUserName">User Name</label>
				<input type="text" name="registerUserName" id="registerUserName" placeholder="e.g. Mark Zukabarg" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$firstNameLengthError);?>
				<label for="firstName">First Name</label>
				<input type="text" name="firstName" id="firstName" placeholder="e.g. Mark" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$lastNameLengthError);?>
				<label for="lastName">Last Name</label>
				<input type="text" name="lastName" id="lastName" placeholder="e.g. Zukabarg" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$emailNotValidError);?>
				<label for="emailAddress">Email Address</label>
				<input type="email" name="emailAddress" id="emailAddress" placeholder="esomeone@example.com" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$emailDoNotMatchError);?>
				<label for="comfirmEmail">Confirm Email</label>
				<input type="email" name="comfirmEmail" id="comfirmEmail" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$passwordContainableError);?>
				<?php echo $account->getError(Constants::$passwordLengthError);?>
				<label for="registerPassword">Password</label>
				<input type="password" name="registerPassword" id="registerPassword" required>
			</p>
			<p>
				<?php echo $account->getError(Constants::$passwordDoNotMatchError);?>
				<label for="confirmPassword">Confirm Password</label>
				<input type="password" name="confirmPassword" id="confirmPassword" required>
			</p>
			<p>
				<input type="submit" name="SignUp" id="SignUp" value="Sign Up">
			</p>
		</form>
	</div>
</body>
</html>