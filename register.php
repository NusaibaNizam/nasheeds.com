<?php
	

	include("includes/classes/Account.php");
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
				<?php echo $account->getError("Your User Name should be between 25 to 3 characters");?>
				<label for="registerUserName">User Name</label>
				<input type="text" name="registerUserName" id="registerUserName" placeholder="e.g. Mark Zukabarg" required>
			</p>
			<p>
				<?php echo $account->getError("Your First Name should be between 25 to 2 characters");?>
				<label for="firstName">First Name</label>
				<input type="text" name="firstName" id="firstName" placeholder="e.g. Mark" required>
			</p>
			<p>
				<?php echo $account->getError("Your Last Name should be between 25 to 2 characters");?>
				<label for="lastName">Last Name</label>
				<input type="text" name="lastName" id="lastName" placeholder="e.g. Zukabarg" required>
			</p>
			<p>
				<?php echo $account->getError("The Email is not valid");?>
				<label for="emailAddress">Email Address</label>
				<input type="email" name="emailAddress" id="emailAddress" placeholder="esomeone@example.com" required>
			</p>
			<p>
				<?php echo $account->getError("The Emails don't match");?>
				<label for="comfirmEmail">Confirm Email</label>
				<input type="email" name="comfirmEmail" id="comfirmEmail" required>
			</p>
			<p>
				<?php echo $account->getError("Password can only contain Numbers, Letters and Spaces");?>
				<?php echo $account->getError("Your Password should be between 8 to 35 characters");?>
				<label for="registerPassword">Password</label>
				<input type="password" name="registerPassword" id="registerPassword" required>
			</p>
			<p>
				<?php echo $account->getError("The Passwords don't match");?>
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