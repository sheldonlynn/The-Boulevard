/* FUNCTION TO GET ID FOR WRITING ERROR MESSAGES */
function $(id) {
	var element = document.getElementById(id);
	return element;
}

/* MAIN FUNCTION FOR COMMENTS FORM VALIDATION */
function validate() {
	var errors = [];
	
	if(testName() == 1) {
		$("name-error").innerHTML = "You must enter your name";
		errors[errors.length] = "error";
	}
	else if(testName() == 2) {
		$("name-error").innerHTML = "Your name can only contain alphabetic characters";
		errors[errors.length] = "error";
	}
	else {
		$("name-error").innerHTML = "";
	}
	
	if(!testEmail()) {
		$("email-error").innerHTML = "You must enter a valid email";
		errors[errors.length] = "error";
	}
	else {
		$("email-error").innerHTML = "";
	}
	
	if(!testComments()) {
		$("comments-error").innerHTML = "You must enter comments or questions";
		errors[errors.length] = "error";
	}
	else {
		$("comments-error").innerHTML = "";
	}
	
	if(errors.length > 0) {
		return false;
	}
}

/* TEST FUNCTIONS FOR COMMENTS FORM VALIDATION */
function testName() {
	var reg_name = /^[A-Za-z\s]{1,40}$/;
	var name = document.forms["comments-form"]["name"].value;
	if(name.length == 0) {
		return 1;
	}
	else if(!reg_name.test(name)) {
		return 2;
	}
}

function testEmail() {
	var email = document.forms["comments-form"]["email"].value;
	return ((email.substring(email.length - 4) == ".com" ||
			email.substring(email.length - 3) == ".ca" ||
			email.substring(email.length - 4) == ".org") &&
			email.length != 0);
}

function testComments() {
	var reg_comments = /^.{1,2000}$/;
	var comments = document.forms["comments-form"]["questions-comments"].value;
	return reg_comments.test(comments);
}