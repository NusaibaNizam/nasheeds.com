$(document).ready(function(){
	$("#logInForm").show();
	$("#logInToggle").click(function(){
		$("#logInForm").hide();
		$("#registerForm").show();
	});
	$("#registerToggle").click(function(){
		$("#registerForm").hide();
		$("#logInForm").show();
	});
});