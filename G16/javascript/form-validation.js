function validate(){
	var pass = document.forms["signUpForm"]["password"].value;
	var rePass = document.forms["signUpForm"]["rePassword"].value;
	
	if(pass != rePass) {
		alert("Passwords do not match");
		return false;
	}
}