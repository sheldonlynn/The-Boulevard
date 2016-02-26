function validate(){
	var pass = document.forms["signUpForm"]["password"].value;
	var rePass = document.forms["signUpForm"]["rePassword"].value;
	
	if(rePass.localeCompare(pass) != 0) {
		return alert("Passwords do not match");
	}
}