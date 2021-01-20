<?php
	

	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account=new Account($con);
	
	include("includes/handlers/register_handler.php");
	include("includes/handlers/login_handler.php");
	function getValue($var){
		if(isset($_POST[$var])){
			echo $_POST[$var];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php
		if(isset($_POST['logIn'])){
			echo "<script>
				$(document).ready(function(){
					$('#registerForm').hide();
					$('#logInForm').show();
				});
				</script>";
		}if (isset($_POST['SignUp'])) {
				echo "<script>
				$(document).ready(function(){
					$('#logInForm').hide();
					$('#registerForm').show();
				});				
				</script>";
		}
	?>
	<div id="container">
		<div id="inputFormDiv">
			<form id="logInForm" action="register.php" method="POST">
				<h2>Log In!</h2>
				<p>
					<?php echo $account->getError(Constants::$logInError);?>
					<label for="logInUserName">User Name</label>
					<input type="text" name="logInUserName" id="logInUserName" placeholder="e.g. Mark Zukabarg" value="<?php getValue('logInUserName')?>" required>
				</p>
				<p>
					<label for="logInPassword">Password</label>
					<input type="password" name="logInPassword" id="logInPassword" required>
				</p>
				<p>
					<input type="submit" name="logIn" id="logIn" value="Log In">
				</p>
				<div class="toggleSignUpSignin"><span id="logInToggle">Don't have an accont? Create one.</span></div>
			</form>
			<form id="registerForm" action="register.php" method="POST">
				<h2>Sign Up!</h2>
				<p>
					<?php echo $account->getError(Constants::$userNameLengthError);?>
					<?php echo $account->getError(Constants::$userNameExists);?>
					<label for="registerUserName">User Name</label>
					<input type="text" name="registerUserName" id="registerUserName" value="<?php getValue('registerUserName')?>" placeholder="e.g. Mark Zukabarg" required>
				</p>
				<p>
					<?php echo $account->getError(Constants::$firstNameLengthError);?>
					<label for="firstName">First Name</label>
					<input type="text" name="firstName" value="<?php getValue('firstName')?>" id="firstName" placeholder="e.g. Mark" required>
				</p>
				<p>
					<?php echo $account->getError(Constants::$lastNameLengthError);?>
					<label for="lastName">Last Name</label>
					<input type="text" name="lastName"  id="lastName" value="<?php getValue('lastName')?>" placeholder="e.g. Zukabarg" required>
				</p>
				<p>
					<?php echo $account->getError(Constants::$emailNotValidError);?>
					<?php echo $account->getError(Constants::$emailExists);?>
					<label for="emailAddress">Email Address</label>
					<input type="email" name="emailAddress" id="emailAddress" value="<?php getValue('emailAddress')?>" placeholder="esomeone@example.com" required>
				</p>
				<p>
					<?php echo $account->getError(Constants::$emailDoNotMatchError);?>
					<label for="comfirmEmail">Confirm Email</label>
					<input type="email" name="comfirmEmail" id="comfirmEmail"  value="<?php getValue('comfirmEmail')?>"required >
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
				<div class="toggleSignUpSignin"><span id="registerToggle">Already have an accont? Log in.</span></div>
			</form>
		</div>
		<div class="logInText">
			<h1>None but ourselves can free our minds</h1>
			<h2>You're a song written by the hands of God</h2>
			<ul>
				<li>Discover nasheeds, you'll fall in love with</li>
				<li>Create you own playlist</li>
				<li>Follow artists to keep up to date</li>
			</ul>
		</div>
	</div>
</body>
</html>