/* FUNCTION TO GET ID FOR WRITING ERROR MESSAGES */
function $(id) {
	var element = document.getElementById(id);
	return element;
}

/* MAIN FUNCTION FOR SIGN UP VALIDATION */
function signUpValidate() {
	var errors = [];
	
	if(!testSignUpEmail()) {
		$("signup-email-error").innerHTML = "You must enter a valid email";
		errors[errors.length] = "error";
	}
	else {
		$("signup-email-error").innerHTML = "";
	}
	
	if(testFirstName() == 1) {
		$("fname-error").innerHTML = "You must enter your first name";
		errors[errors.length] = "error";
	}
	else if(testFirstName() == 2) {
		$("fname-error").innerHTML = "Your name can only contain alphabetic characters";
		errors[errors.length] = "error";
	}
	else {
		$("fname-error").innerHTML = "";
	}
	
	if(testLastName() == 1) {
		$("lname-error").innerHTML = "You must enter your last name";
		errors[errors.length] = "error";
	}
	else if(testLastName() == 2) {
		$("lname-error").innerHTML = "Your name can only contain alphabetic characters";
		errors[errors.length] = "error";
	}
	else {
		$("lname-error").innerHTML = "";
	}
	
	if(!testAddress()) {
		$("address-error").innerHTML = "You must enter a valid address";
		errors[errors.length] = "error";
	}
	else {
		$("address-error").innerHTML = "";
	}
	
	if(!testPostalCode()) {
		$("postalcode-error").innerHTML = "You must enter a valid Vancouver postal code";
		errors[errors.length] = "error";
	}
	else {
		$("postalcode-error").innerHTML = "";
	}
	
	if(!testPhone()) {
		$("phone-error").innerHTML = "You must enter a valid phone number";
		errors[errors.length] = "error";
	}
	else {
		$("phone-error").innerHTML = "";
	}

	if(testSignUpPass() == 1) {
		$("signup-pass-error").innerHTML = "You must enter a valid password (6-20 characters)";
		errors[errors.length] = "error";
	}
	else if(testSignUpPass() == 2) {
		$("signup-pass-error").innerHTML = "";
		$("signup-repass-error").innerHTML = "Passwords do not match";
		errors[errors.length] = "error";
	}
	else {
		$("signup-pass-error").innerHTML = "";
		$("signup-repass-error").innerHTML = "";
	}
	
	if(errors.length > 0) {
		return false;
	}
	
	return true;
}

/* MAIN FUNCTION FOR LOG IN VALIDATION */
function logInValidate() {
	var errors = [];
	
	if(!testLogInEmail()) {
		$("login-email-error").innerHTML = "You must enter a valid email";
		errors[errors.length] = "error";
	}
	else {
		$("login-email-error").innerHTML = "";
	}
	
	if(!testLogInPass()) {
		$("login-pass-error").innerHTML = "You must enter a valid password";
		errors[errors.length] = "error";
	}
	else {
		$("login-pass-error").innerHTML = "";
	}
	
	if(errors.length > 0) {
		return false;
	}
}

/* MAIN FUNCTION FOR ORDER VALIDATION */
function orderValidate() {
	var order = document.forms["order-form"]["order"].value;
	if(order.length == 0) {
		$("order-error").innerHTML = "You must enter an order";
		return false;
	}
	else {
		$("order-error").innerHTML = "";
		return true;
	}
}

/* TEST FUNCTIONS FOR SIGN UP VALIDATION */
function testSignUpEmail() {
	var email = document.forms["signup-form"]["email"].value;
	return ((email.substring(email.length - 4) == ".com" ||
			email.substring(email.length - 3) == ".ca" ||
			email.substring(email.length - 4) == ".org") &&
			email.length != 0);
}

function testFirstName() {
	var reg_fname = /^[A-Za-z\s]{1,40}$/;
	var fname = document.forms["signup-form"]["firstname"].value;
	if(fname.length == 0) {
		return 1;
	}
	else if(!reg_fname.test(fname)) {
		return 2;
	}
}

function testLastName() {
	var reg_lname = /^[A-Za-z\s]{1,40}$/;
	var lname = document.forms["signup-form"]["lastname"].value;
	if(lname.length == 0) {
		return 1;
	}
	else if(!reg_lname.test(lname)) {
		return 2;
	}
}

function testAddress() {
	var reg_address = /^[a-z0-9\s,'-]{1,50}$/i;
	var address = document.forms["signup-form"]["address"].value;
	return reg_address.test(address);
}

function testPostalCode() {
	var reg_pCode = /^V\d[A-Z]\s?\d[A-Z]\d$/i;
	var pCode = document.forms["signup-form"]["postalcode"].value;
	return reg_pCode.test(pCode);
}

function testPhone() {
	var reg_phone0 = /^[1-9][0-9]{2}$/;
	var reg_phone1 = /^[1-9][0-9]{2}$/;
	var reg_phone2 = /^[0-9]{4}$/;
	var phone0 = document.forms["signup-form"]["phone0"].value;
	var phone1 = document.forms["signup-form"]["phone1"].value;
	var phone2 = document.forms["signup-form"]["phone2"].value;
	return reg_phone0.test(phone0) && reg_phone1.test(phone1) && reg_phone2.test(phone2);
}

function testSignUpPass() {
	var reg_pass = /^[A-Za-z0-9!@#$%^&*_]{6,20}$/;
	var pass = document.forms["signup-form"]["password"].value;
	var rePass = document.forms["signup-form"]["repassword"].value;
	if(!reg_pass.test(pass)) {
		return 1;
	}
	else if(pass != rePass) {
		return 2;
	}
}

/* TEST FUNCTIONS FOR LOG IN VALIDATION */
function testLogInEmail() {
	var email = document.forms["login-form"]["email"].value;
	return ((email.substring(email.length - 4) == ".com" ||
			email.substring(email.length - 3) == ".ca" ||
			email.substring(email.length - 4) == ".org") &&
			email.length != 0);
}

function testLogInPass() {
	var reg_pass = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
	var pass = document.forms["login-form"]["password"].value;
	return reg_pass.test(pass);
}