function validate(){
/*
	var email = document.forms["signUpForm"]["email"].value;
	var fname = document.forms["signUpForm"]["firstname"].value;
	var lname = document.forms["signUpForm"]["lastname"].value;
	var address = document.forms["signUpForm"]["address"].value;
	var postcode = document.forms["signUpForm"]["postalcode"].value;
	*/
	var phone0 = document.forms["signUpForm"]["phone0"].value;
	var phone1 = document.forms["signUpForm"]["phone1"].value;
	var phone2 = document.forms["signUpForm"]["phone2"].value;

	var pass = document.forms["signUpForm"]["password"].value;
	var rePass = document.forms["signUpForm"]["rePassword"].value;

	if (testEmail() == false || testName() == false)
		alert("Help");

	if(pass != rePass) {
		alert("Passwords do not match");
		return false;
	}
}



function testEmail() {
	var email = document.forms["signUpForm"]["email"].value;
	if (email.length != 0) {
		return (email.substring(email.length - 3) == "com" || email.substring(email.length - 2) == "ca" || email.substring(email.length - 3) == "org");
	} else {
		return false;
	}
}

function testName() {
	var fname = document.forms["signUpForm"]["firstname"].value;
	var lname = document.forms["signUpForm"]["lastname"].value;
	return ( (fname.length != 0) && (lname.length != 0) );
}


function testAddress() {
	var address = document.forms["signUpForm"]["address"].value;

	// Regexp : /^V\d[A-Z\s?\d[A-Z]\d$/i
}


function testPostCode() {
	var postcode = document.forms["signUpForm"]["postalcode"].value;

	
}

function testPhone(num0,num1,num2) {

	if (num0.length != 0 && num1.length != 0 && num2.length != 0) {
		if ((100 <= num0 && num0 <= 999) && (100 <= num1 && num1 <= 999) &&
			(0000 <= num2 && num2 <= 9999)) {
			return false;
		} else
			return true;
	} else
		return false;
}


//Makes the input capitalized
function makeUpperCase() {
    var pcode = document.forms["signUpForm"]["postalcode"].value;
    pcode.value = pcode.value.toUpperCase();
}

